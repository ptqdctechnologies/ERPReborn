<?php

namespace App\Http\Controllers\Process\Advance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExportExcel\AdvanceRequest\ExportReportAdvanceSummaryDetail;
use App\Http\Controllers\ExportExcel\AdvanceRequest\ExportReportAdvanceSummary;
use App\Http\Controllers\ExportExcel\AdvanceToASF\ExportReportAdvanceToASF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;
use App\Services\Process\Advance\AdvanceRequestService;
use App\Services\WorkflowService;
use Carbon\Carbon;

class AdvanceRequestController extends Controller
{
    protected $advanceRequestService, $workflowService;

    public function __construct(AdvanceRequestService $advanceRequestService, WorkflowService $workflowService)
    {
        $this->advanceRequestService    = $advanceRequestService;
        $this->workflowService          = $workflowService;
    }

    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        TRANSACTIONS                                                                      |
    // +--------------------------------------------------------------------------------------------------------------------------+

    // INDEX FUNCTION
    public function index(Request $request)
    {
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');
        $documentTypeRefID  = $this->GetBusinessDocumentsTypeFromRedis('Advance Form');

        return view('Process.Advance.AdvanceRequest.Transactions.CreateAdvanceRequest', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken,
            'documentType_RefID'    => $documentTypeRefID
        ]);
    }

    // STORE FUNCTION FOR INSERT DATA (NEW FUNCTION)
    public function store(Request $request)
    {
        try {
            $response = $this->advanceRequestService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Advance Request');
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Submit Workflow Create Advance Request');
            }

            $compact = [
                "documentNumber"    => $response['data']['businessDocument']['documentNumber'],
                "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Advance Request Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    // CALCULATE TOTAL
    public function calculateTotal($filteredData, $key) {
        return array_reduce($filteredData, function ($carry, $item) use ($key) {
            return $carry + ($item[$key] ?? 0);
        }, 0);
    }

    // REVISION FUNCTION FOR SHOW LIST DATA FILTER BY ID 
    public function RevisionAdvanceIndex(Request $request)
    {
        try {
            $varAPIWebToken     = Session::get('SessionLogin');
            $advance_RefID      = $request->input('modal_advance_id');
            $documentTypeRefID  = $this->GetBusinessDocumentsTypeFromRedis('Advance Settlement Form');

            $response = $this->advanceRequestService->getDetail($advance_RefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Advance Request');
            }

            $dataAdvanceDetail = $response['data']['data'];

            $compact = [
                'varAPIWebToken'                => $varAPIWebToken,
                'documentTypeRefID'             => $documentTypeRefID,
                'advance_RefID'                 => $dataAdvanceDetail[0]['advance_RefID'] ?? '', 
                'headerAdvanceRevision'         => [
                    'budgetCode'                => $dataAdvanceDetail[0]['combinedBudgetCode'] ?? '',
                    'budgetCodeId'              => $dataAdvanceDetail[0]['combinedBudget_RefID'] ?? '', 
                    'budgetCodeName'            => $dataAdvanceDetail[0]['combinedBudgetName'] ?? '',
                    'subBudgetCode'             => $dataAdvanceDetail[0]['combinedBudgetSectionCode'] ?? '',
                    'subBudgetCodeId'           => $dataAdvanceDetail[0]['combinedBudgetSection_RefID'] ?? '', 
                    'subBudgetCodeName'         => $dataAdvanceDetail[0]['combinedBudgetSectionName'] ?? '',
                ],
                'headerAdvanceRequestDetail'    => [
                    'requesterPosition'         => $dataAdvanceDetail[0]['requesterWorkerJobPositionName'] ?? '', 
                    'requesterId'               => $dataAdvanceDetail[0]['requesterWorkerJobsPosition_RefID'] ?? '', 
                    'requesterName'             => $dataAdvanceDetail[0]['requesterWorkerName'] ?? '', 
                    'beneficiaryPosition'       => $dataAdvanceDetail[0]['beneficiaryWorkerJobsPositionName'] ?? '', 
                    'beneficiaryId'             => $dataAdvanceDetail[0]['beneficiaryWorkerJobsPosition_RefID'] ?? '', 
                    'beneficiaryName'           => $dataAdvanceDetail[0]['beneficiaryWorkerName'] ?? '', 
                    'person_RefId'              => $dataAdvanceDetail[0]['person_RefID'] ?? '',
                    'bankAcronym'               => $dataAdvanceDetail[0]['beneficiaryBankAcronym'] ?? '', 
                    'bankId'                    => $dataAdvanceDetail[0]['beneficiaryBank_RefID'] ?? '', 
                    'bankName'                  => $dataAdvanceDetail[0]['beneficiaryBankName'] ?? '', 
                    'bankAccountNumber'         => $dataAdvanceDetail[0]['beneficiaryBankAccountNumber'] ?? '', 
                    'bankAccountId'             => $dataAdvanceDetail[0]['beneficiaryBankAccount_RefID'] ?? '', 
                    'bankAccountName'           => $dataAdvanceDetail[0]['beneficiaryBankAccountName'] ?? '', 
                ],
                'dataAdvanceList'               => $dataAdvanceDetail,
                'fileAttachment'                => $dataAdvanceDetail[0]['log_FileUpload_Pointer_RefID'] ?? null, 
                'remark'                        => $dataAdvanceDetail[0]['remarks'] ?? '' 
            ];

            return view('Process.Advance.AdvanceRequest.Transactions.RevisionAdvanceRequest', $compact);
        } catch (\Throwable $th) {
            Log::error("Revision Advance Index Function Error: " . $th->getMessage());

            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    // UPDATE FUNCTION
    public function UpdatesAdvanceRequest(Request $request)
    {
        try {
            $response = $this->advanceRequestService->updates($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Update Advance Request');
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data'][0]['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Submit Workflow Update Advance Request');
            }

            $compact = [
                "documentNumber"    => $response['data'][0]['businessDocument']['documentNumber'],
                "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Updates Advance Request Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    // LIST DATA FUNCTION FOR SHOW DATA ADVANCE 
    public function AdvanceListData(Request $request)
    {
        try {

            // if (Redis::get("DataListAdvance") == null) {
                $varAPIWebToken = Session::get('SessionLogin');
                $DataListAdvance = Helper_APICall::setCallAPIGateway(
                    Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.read.dataList.finance.getAdvance',
                    'latest',
                    [
                        'parameter' => null,
                        'SQLStatement' => [
                            'pick' => null,
                            'sort' => null,
                            'filter' => null,
                            'paging' => null
                        ]
                    ],
                    false
                );
            // }

            // $DataListAdvance = json_decode(
            //     Helper_Redis::getValue(
            //         Helper_Environment::getUserSessionID_System(),
            //         "DataListAdvance"
            //     ),
            //     true
            // );

            $collection = collect($DataListAdvance["data"]);

            $project_id = $request->project_id;
            $site_id = $request->site_id;

            if ($project_id != "") {
                $collection = $collection->where('combinedBudget_RefID', $project_id);
            }
            if ($site_id != "") {
                $collection = $collection->where('combinedBudgetSection_RefID', $site_id);
            }

            Log::error("collection", $collection);

            $collection = $collection->all();

            return response()->json($collection);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        REPORTS                                                                           |
    // +--------------------------------------------------------------------------------------------------------------------------+

    public function ReportAdvanceSummary(Request $request)
    {
        try {
            Session::put("AdvanceSummaryReportIsSubmit", "No");

            $varAPIWebToken = Session::get('SessionLogin');

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'statusRevisi' => 0,
            ];

            return view('Process.Advance.AdvanceRequest.Reports.ReportAdvanceSummary', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceSummaryStore(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            // if (Redis::get("ReportAdvanceSummary") == null) {
                Helper_APICall::setCallAPIGateway(
                    Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'report.form.documentForm.finance.getReportAdvanceSummary',
                    'latest',
                    [
                        'parameter' => [
                            'dataFilter' => [
                                'budgetID' => 1,
                                'subBudgetID' => 1,
                                'workID' => 1,
                                'productID' => 1,
                                'beneficiaryID' => 1,
                            ]
                        ]
                    ],
                    false
                );
            // }

            $DataReportAdvanceSummary = json_decode(
                Helper_Redis::getValue(
                    Helper_Environment::getUserSessionID_System(),
                    "ReportAdvanceSummary"
                ),
                true
            );

            $collection = collect($DataReportAdvanceSummary);

            $project_id = $request->project_id;
            $site_id = $request->site_id;
            // $work_id = $request->work_id;
            $requester_id = $request->requester_id;
            $beneficiary_id = $request->beneficiary_id;

            if ($project_id != "") {
                $collection = $collection->where('CombinedBudget_RefID', $project_id);
            }
            if ($site_id != "") {
                $collection = $collection->where('CombinedBudgetSection_RefID', $site_id);
            }
            if ($requester_id != "") {
                $collection = $collection->where('RequesterWorkerJobsPosition_RefID', $requester_id);
            }
            if ($beneficiary_id != "") {
                $collection = $collection->where('BeneficiaryWorkerJobsPosition_RefID', $beneficiary_id);
            }
            // if ($work_id != "") {
            //     $work_id = null;
            // }

            $collection = $collection->all();

            $varDataExcel = [];
            $varDataProject = [];
            $i = 0;
            $total = 0;
            foreach ($collection as $collections) {

                $total +=  $collections['TotalAdvance'];

                $varDataProject[0]['projectCode'] = $collections['CombinedBudgetCode'];
                $varDataProject[0]['projectName'] = $collections['CombinedBudgetName'];

                $varDataExcel[$i]['no'] = $i + 1;
                $varDataExcel[$i]['documentNumber'] = $collections['DocumentNumber'];
                $varDataExcel[$i]['subBudget'] = $collections['CombinedBudgetSectionName'];
                $varDataExcel[$i]['date'] = date('d-m-Y', strtotime($collections['DocumentDateTimeTZ']));
                $varDataExcel[$i]['requester'] = $collections['RequesterWorkerName'];
                $varDataExcel[$i]['beneficiary'] = $collections['BeneficiaryWorkerName'];
                $varDataExcel[$i]['total_idr'] = number_format($collections['TotalAdvance'], 2);
                $varDataExcel[$i]['total_other'] = number_format($collections['TotalAdvance'], 2);
                $varDataExcel[$i]['total_equivalent'] = number_format($collections['TotalAdvance'], 2);
                // $varDataExcel[$i]['currency'] = $collections['CurrencyName'];
                $varDataExcel[$i]['remark'] = ucfirst(trans($collections['remark']));

                $i++;
            }

            $compact = [
                'data' => $collection,
                'varDataExcel' => $varDataExcel,
                'varDataProject' => $varDataProject
            ];

            Session::put("AdvanceSummaryReportDataPDF", $compact);
            Session::put("AdvanceSummaryReportDataExcel", $compact['varDataExcel']);
            Session::put("AdvanceSummaryReportTotal", number_format($total, 2));
            Session::put("AdvanceSummaryReportIsSubmit", "Yes");

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportAdvanceSummary(Request $request)
    {
        try {

            $isSubmit = Session::get("AdvanceSummaryReportIsSubmit");
            if ($isSubmit == "Yes") {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {

                    $dataAdvance = Session::get("AdvanceSummaryReportDataPDF");

                    // $data = [
                    //     'title' => 'ADVANCE REQUEST SUMMARY',
                    //     'date' => date('d/m/Y H:m:s'),
                    //     // 'projectCode' => $dataAdvance['varDataProject'][0]['projectCode'],
                    //     // 'projectName' => $dataAdvance['varDataProject'][0]['projectName'],
                    //     'printedBy' => Session::get('SessionLoginName'),
                    //     'data' => $dataAdvance
                    // ];

                    $pdf = PDF::loadView('Process.Advance.AdvanceRequest.Reports.PrintReportAdvanceSummary', $dataAdvance);
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Advance Summary.pdf');
                } else if ($print_type == "Excel") {

                    return Excel::download(new ExportReportAdvanceSummary, 'Export Report Advance Summary.xlsx');
                }
            } else {
                return redirect()->route('AdvanceRequest.ReportAdvanceSummary')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceSummaryDetail(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('AdvanceSummaryReportDetailIsSubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('AdvanceSummaryReportDetailDataPDF', []) : [];

        $compact = [
            'varAPIWebToken'    => $varAPIWebToken,
            'dataReport'        => $isSubmitButton ? true : false,
            "dataHeader"        => $dataReport["dataHeader"] ?? null,
            "dataContent"       => $dataReport["dataContent"] ?? null,
            "dataDetail"        => $dataReport["dataDetail"] ?? null,
            "dataExcel"         => $dataReport["dataExcel"] ?? null,
            "statusDetail"      => $dataReport["statusDetail"] ?? null,
            "advance_RefID"     => $dataReport["advance_RefID"] ?? null,
            "advance_number"    => $dataReport["advance_number"] ?? null,
            "statusHeader"      => $dataReport["statusHeader"] ?? null
        ];

        return view('Process.Advance.AdvanceRequest.Reports.ReportAdvanceSummaryDetail', $compact);
    }

    public function ReportAdvanceSummaryDetailData($id, $number, $statusHeader)
    {
        try {
            
            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.finance.getAdvance', 
                'latest',
                [
                    'parameter' => [
                        'recordID' => (int) $id
                    ]
                ]
            );

            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');
            }

            $document           = $filteredArray['data'][0]['document'];
            $content            = $document['content'];
            $general            = $content['general'];
            $budget             = $general['budget'];
            $bankAccount        = $general['bankAccount']['beneficiary'];
            $involvedPersons    = $general['involvedPersons'][0];
            $itemList           = $content['details']['itemList'][0];

            $varDataExcel   = [];
            $dataHeader     = [];
            $i              = 0;
            $totalAdvance   = 0;

            foreach ($content['details']['itemList'] as $collections) {
                $totalAdvance += $collections['entities']['priceBaseCurrencyValue'];

                $varDataExcel[$i]['no']                                 = $i + 1;
                $varDataExcel[$i]['product_RefID']                      = $collections['entities']['product_RefID'];
                $varDataExcel[$i]['productName']                        = $collections['entities']['productName'];
                $varDataExcel[$i]['quantity']                           = number_format($collections['entities']['quantity'], 2);
                $varDataExcel[$i]['productUnitPriceBaseCurrencyValue']  = number_format($collections['entities']['productUnitPriceBaseCurrencyValue'], 2);
                $varDataExcel[$i]['priceBaseCurrencyValue']             = number_format($collections['entities']['priceBaseCurrencyValue'], 2);

                $dataHeader[$i]['Product_RefID']                        = $collections['entities']['product_RefID'];
                $dataHeader[$i]['ProductName']                          = $collections['entities']['productName'];
                $dataHeader[$i]['Quantity']                             = $collections['entities']['quantity'];
                $dataHeader[$i]['QuantityUnitName']                     = $collections['entities']['quantityUnitName'];
                $dataHeader[$i]['ProductUnitPriceBaseCurrencyValue']    = $collections['entities']['productUnitPriceBaseCurrencyValue'];
                $dataHeader[$i]['PriceBaseCurrencyValue']               = $collections['entities']['priceBaseCurrencyValue'];

                if ($i === 0) {
                    $dataHeader[$i]['DocumentNumber']                       = $document['header']['number'];
                    $dataHeader[$i]['Date']                                 = $document['header']['date'];
                    $dataHeader[$i]['ProductUnitPriceCurrencyISOCode']      = $itemList['entities']['priceCurrencyISOCode'];
                    $dataHeader[$i]['CombinedBudgetCode']                   = $budget['combinedBudgetCodeList'][0];
                    $dataHeader[$i]['CombinedBudgetName']                   = $budget['combinedBudgetNameList'][0];
                    $dataHeader[$i]['CombinedBudgetSectionCode']            = $budget['combinedBudgetSectionCodeList'][0];
                    $dataHeader[$i]['CombinedBudgetSectionName']            = $budget['combinedBudgetSectionNameList'][0];
                    $dataHeader[$i]['Log_FileUpload_Pointer_RefID']         = $general['attachmentFiles']['main']['log_FileUpload_Pointer_RefID'];
                    $dataHeader[$i]['RequesterWorkerName']                  = $involvedPersons['requesterWorkerName'];
                    $dataHeader[$i]['BeneficiaryWorkerName']                = $involvedPersons['beneficiaryWorkerName'];
                    $dataHeader[$i]['BankAcronym']                          = $bankAccount['bankAcronym'];
                    $dataHeader[$i]['BankAccountName']                      = $bankAccount['bankAccountName'];
                    $dataHeader[$i]['BankAccountNumber']                    = $bankAccount['bankAccountNumber'];
                }

                $i++;
            }
            
            $compact = [
                'dataHeader'    => $dataHeader,
                'dataContent'   => $general,
                'dataExcel'     => $varDataExcel,
                'statusDetail'  => 1,
                'advance_RefID' => $document['header']['recordID'],
                'advance_number'=> $document['header']['number'],
                'statusHeader'  => $statusHeader,
            ];

            // dd($filteredArray['metadata']['HTTPStatusCode'], $compact);

            Session::put("AdvanceSummaryReportDetailIsSubmit", "Yes");
            Session::put("AdvanceSummaryReportDetailDataPDF", $compact);
            Session::put("AdvanceSummaryReportDetailDataExcel", $compact['dataExcel']);
            Session::put("AdvanceSummaryReportDetailTotalAdvance", number_format($totalAdvance, 2));

            return $compact;
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceSummaryDetailStore(Request $request)
    {
        try {
            $advance_RefID = $request->advance_RefID;
            $advance_number = $request->advance_number;

            $statusHeader = "Yes";

            if ($advance_RefID == "" && $advance_number == "") {
                Session::forget("AdvanceSummaryReportDetailDataPDF");
                Session::forget("AdvanceSummaryReportDetailDataExcel");
                
                return redirect()->route('AdvanceRequest.ReportAdvanceSummaryDetail')->with('NotFound', 'Advance Number Cannot Empty');
            }

            $compact = $this->ReportAdvanceSummaryDetailData($advance_RefID, $advance_number, $statusHeader);

            if ($compact['dataHeader'] == []) {
                Session::forget("AdvanceSummaryReportDetailDataPDF");
                Session::forget("AdvanceSummaryReportDetailDataExcel");

                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('AdvanceRequest.ReportAdvanceSummaryDetail');
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportAdvanceSummaryDetail(Request $request)
    {
        try {
            $dataPDF = Session::get("AdvanceSummaryReportDetailDataPDF");
            $dataExcel = Session::get("AdvanceSummaryReportDetailDataExcel");

            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataAdvance = Session::get("AdvanceSummaryReportDetailDataPDF");

                    $pdf = PDF::loadView('Process.Advance.AdvanceRequest.Reports.PrintReportAdvanceSummaryDetail', ['dataReport' => $dataAdvance]);
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Advance Summary Detail.pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportAdvanceSummaryDetail, 'Export Report Advance Summary Detail.xlsx');
                }
            } else {
                return redirect()->route('AdvanceRequest.ReportAdvanceSummaryDetail')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceToASF(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $dataArftoASF   = Session::get("AdvanceToASFReportDataPDF");

        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        
        $compact = [
            'varAPIWebToken'    => $varAPIWebToken,
            'dataHeader'        => [],
            'dataArftoASF'      => $dataArftoASF
        
        ];

        return view('Process.Advance.AdvanceToASF.Reports.ReportAdvanceToASF', $compact);
    }

    public function ReportAdvanceToASFData( $project_code){
        
            
        try {
            // Log::error("Error at ",[$project_code, $site_code]);

            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.finance.getAdvanceToAdvanceSettlementSummary', 
                'latest',
                [
                    'parameter' => [
                        'CombinedBudgetCode' =>  $project_code,
                        'CombinedBudgetSectionCode' =>  NULL,
                        'RequesterWorkerJobsPosition_RefID' => NULL 
                    ],
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ]
            );
            // dd($filteredArray);
            Log::error("Error at " ,$filteredArray);
            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');

            }
            Session::put("AdvanceToASFReportDataPDF", $filteredArray['data']['data']);
            Session::put("AdvanceToASFReportDataExcel", $filteredArray['data']['data']);
            return $filteredArray['data']['data'];
        }
        catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceToASFStore(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $projectCode    = $request->project_code;
            $siteCode       = $request->site_code;
            $requesterID    = $request->requester_id;
            $date           = $request->date;

            if ($date) {
                $dates      = explode(' - ', $date);
                $startDate  = Carbon::createFromFormat('m/d/Y', trim($dates[0]))->startOfDay()->format('Y-m-d');
                $endDate    = Carbon::createFromFormat('m/d/Y', trim($dates[1]))->endOfDay()->format('Y-m-d');
            }

            $response = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.finance.getAdvanceToAdvanceSettlementSummary', 
                'latest',
                [
                    'parameter'     => [
                        'CombinedBudgetCode'                => $projectCode ?? null,
                        'CombinedBudgetSectionCode'         => $siteCode ?? null,
                        'RequesterWorkerJobsPosition_RefID' => $requesterID ?? null,
                        'StartDate'                         => $date ? $startDate : NULL,
                        'EndDate'                           => $date ? $endDate : NULL,
                    ]
                ]
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Report Advance To Advance Settlement Store');
            }

            // $compact = [
            //     'statusCode'    => $response['metadata']['HTTPStatusCode'],
            //     'data'          => $response['data']['data']
            // ];

            // return response()->json($compact);

            Session::put("AdvanceToASFReportDataPDF", $response['data']['data']);
            Session::put("AdvanceToASFReportDataExcel", $response['data']['data']);
            
            $compact = [
                'varAPIWebToken'    => $varAPIWebToken,
                'dataHeader'        => [
                    'project'       => [
                        'id'        => $request->project_id,
                        'code'      => $request->project_code,
                        'name'      => $request->project_name
                    ],
                    'site'          => [
                        'id'        => $request->site_id,
                        'code'      => $request->site_code,
                        'name'      => $request->site_name
                    ],
                    'requester'     => [
                        'id'        => $request->requester_id,
                        'name'      => $request->requester_name
                    ],
                    'date'          => $request->date
                ],
                'dataArftoASF'      => $response['data']['data']
            ];

            return view('Process.Advance.AdvanceToASF.Reports.ReportAdvanceToASF', $compact);
        } catch (\Throwable $th) {
            Log::error("Report Advance To Advance Settlement Store Function Error: " . $th->getMessage());
            
            return response()->json(["status" => 500]);
        }
    }
    
    public function PrintExportReportAdvanceToASF(Request $request)
    {
        ini_set('memory_limit', '512M');
        set_time_limit(300);
        try {
            $dataPDF = Session::get("AdvanceToASFReportDataPDF");
            $dataExcel = Session::get("AdvanceToASFReportDataExcel");

            
            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataArftoASF = Session::get("AdvanceToASFReportDataPDF");
                    // dd($dataArftoASF);

                    $pdf = PDF::loadView('Process.Advance.AdvanceToASF.Reports.ReportAdvanceToASF_pdf', ['dataArftoASF' => $dataArftoASF])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Advance to ASF .pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportAdvanceToASF, 'Export Report Advance to ASF .xlsx');
                }
            } else {
                return redirect()->route('AdvanceRequest.ReportAdvanceToASF')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceSummaryDetailID(Request $request, $id)
    {
        try {

            Session::put("AdvanceSummaryReportDetailIsSubmit", "Yes");
            $advance_RefID = $id;
            $advance_number = "";
            $statusHeader = "No";

            $compact = $this->ReportAdvanceSummaryDetailData($advance_RefID, $advance_number, $statusHeader);

            return view('Process.Advance.AdvanceRequest.Reports.ReportAdvanceSummaryDetail', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}
