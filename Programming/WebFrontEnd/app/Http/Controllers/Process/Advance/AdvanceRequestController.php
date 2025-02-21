<?php

namespace App\Http\Controllers\Process\Advance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExportExcel\AdvanceRequest\ExportReportAdvanceSummaryDetail;
use App\Http\Controllers\ExportExcel\AdvanceRequest\ExportReportAdvanceSummary;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;

class AdvanceRequestController extends Controller
{

    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        TRANSACTIONS                                                                      |
    // +--------------------------------------------------------------------------------------------------------------------------+

    // INDEX FUNCTION
    public function index(Request $request)
    {
        try {

            $varAPIWebToken = Session::get('SessionLogin');

            if (Redis::get("DocumentType") == null) {

                $varAPIWebToken = Session::get('SessionLogin');
                Helper_APICall::setCallAPIGateway(
                    Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.read.dataList.master.getBusinessDocumentType',
                    'latest',
                    [
                        'parameter' => [],
                        'SQLStatement' => [
                            'pick' => null,
                            'sort' => null,
                            'filter' => null,
                            'paging' => null
                        ]
                    ],
                    false
                );
            }

            $DocumentType = json_decode(
                Helper_Redis::getValue(
                    Helper_Environment::getUserSessionID_System(),
                    "DocumentType"
                ),
                true
            );
            $collection = collect($DocumentType);
            $collection = $collection->where('Name', "Advance Form");
            foreach ($collection->all() as $collections) {
                $DocumentTypeID = $collections['Sys_ID'];
            }

            $var = 0;
            if (!empty($_GET['var'])) {
                $var =  $_GET['var'];
            }

            $compact = [
                'var' => $var,
                'varAPIWebToken' => $varAPIWebToken,
                'DocumentTypeID' => $DocumentTypeID,
                'statusRevisi' => 0,
            ];

            return view('Process.Advance.AdvanceRequest.Transactions.CreateAdvanceRequest', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    // STORE FUNCTION FOR INSERT DATA (NEW FUNCTION)
    public function store(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $documentTypeID = $request->documentTypeID;
            $input = Session::get('dataInputStore' . $documentTypeID);
            $input['dataInput_Log_FileUpload_Pointer_RefID'] = $request->fileAttachment;

            $product_id = json_decode($input['var_product_id'], true);
            $quantity = json_decode($input['var_quantity'], true);
            $qty_id = json_decode($input['var_qty_id'], true);
            $currency_id = json_decode($input['var_currency_id'], true);
            $price = json_decode($input['var_price'], true);

            $advanceDetail = array_map(function ($index) use ($product_id, $quantity, $qty_id, $currency_id, $price) {
                return [
                    'entities' => [
                        "combinedBudgetSectionDetail_RefID"     => 169000000000001, // DISINI $combinedBudgetSectionDetail_RefID_convert[$n]
                        "product_RefID"                         => (int) $product_id[$index],
                        "quantity"                              => (float) $quantity[$index],
                        "quantityUnit_RefID"                    => (int) $qty_id[$index], 
                        "productUnitPriceCurrency_RefID"        => (int) $currency_id[$index],
                        "productUnitPriceCurrencyValue"         => (float) $price[$index],
                        "productUnitPriceCurrencyExchangeRate"  => 1,
                        "remarks"                               => 'Catatan Detail'
                    ]
                ];
            }, array_keys($product_id));

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.create.finance.setAdvance',
                'latest',
                [
                    'entities' => [
                        "documentDateTimeTZ"                    => $input['var_date'],
                        "log_FileUpload_Pointer_RefID"          => (int) $input['dataInput_Log_FileUpload_Pointer_RefID'],
                        "requesterWorkerJobsPosition_RefID"     => (int) $input['requester_id'],
                        "beneficiaryWorkerJobsPosition_RefID"   => (int) $input['beneficiary_id'],
                        "beneficiaryBankAccount_RefID"          => (int) $input['bank_account_id'],
                        "internalNotes"                         => 'Testing Advance',
                        "remarks"                               => $input['var_remark'],
                        "additionalData"    => [
                            "itemList"      => [
                                "items"     => $advanceDetail
                            ]
                        ]
                    ]
                ]
            );

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Error Status Code: ' . $varData['metadata']['HTTPStatusCode']);
            }

            return $this->SubmitWorkflow(
                $varData['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity_RefID,
                $request->nextApprover_RefID,
                $varData['data']['businessDocument']['documentNumber']
            );
        } catch (\Throwable $th) {
            Log::error("Store Advance Request Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    // STORE FUNCTION FOR INSERT DATA (OLD FUNCTION)
    // public function store(Request $request)
    // {
    //     try {
    //         // dd($request->all());
    //         $varAPIWebToken = Session::get('SessionLogin');

    //         $documentTypeID = $request->documentTypeID;
    //         $input = Session::get('dataInputStore' . $documentTypeID);
    //         $input['dataInput_Log_FileUpload_Pointer_RefID'] = $request->fileAttachment;

    //         $product_id_convert = json_decode($input['var_product_id'], true);
    //         $quantity_convert = json_decode($input['var_quantity'], true);
    //         $qty_id_convert = json_decode($input['var_qty_id'], true);
    //         $currency_id_convert = json_decode($input['var_currency_id'], true);
    //         $price_convert = json_decode($input['var_price'], true);
    //         $combinedBudgetSectionDetail_RefID_convert = json_decode($input['var_combinedBudgetSectionDetail_RefID'], true);

    //         $count_product = count($product_id_convert);
    //         $advanceDetail = [];
    //         for ($n = 0; $n < $count_product; $n++) {
    //             $advanceDetail[$n] = [
    //                 'entities' => [
    //                     "combinedBudgetSectionDetail_RefID" => (int) 169000000000001, // DISINI $combinedBudgetSectionDetail_RefID_convert[$n]
    //                     "product_RefID" => (int) $product_id_convert[$n],
    //                     "quantity" => (float) $quantity_convert[$n],
    //                     "quantityUnit_RefID" => (int) $qty_id_convert[$n], // DISINI
    //                     "productUnitPriceCurrency_RefID" => (int) $currency_id_convert[$n],
    //                     "productUnitPriceCurrencyValue" => (float) $price_convert[$n],
    //                     "productUnitPriceCurrencyExchangeRate" => 1,
    //                     "remarks" => 'Catatan Detail'
    //                 ]
    //             ];
    //         }

    //         $varData = Helper_APICall::setCallAPIGateway(
    //             Helper_Environment::getUserSessionID_System(),
    //             $varAPIWebToken,
    //             'transaction.create.finance.setAdvance',
    //             'latest',
    //             [
    //                 'entities' => [
    //                     "documentDateTimeTZ" => $input['var_date'],
    //                     "log_FileUpload_Pointer_RefID" => (int) $input['dataInput_Log_FileUpload_Pointer_RefID'],
    //                     "requesterWorkerJobsPosition_RefID" => (int) $input['requester_id'],
    //                     "beneficiaryWorkerJobsPosition_RefID" => (int)$input['beneficiary_id'],
    //                     "beneficiaryBankAccount_RefID" => (int)$input['bank_account_id'],
    //                     "internalNotes" => 'Testing Advance',
    //                     "remarks" => $input['var_remark'],
    //                     "additionalData" => [
    //                         "itemList" => [
    //                             "items" => $advanceDetail
    //                         ]
    //                     ]
    //                 ]
    //             ]
    //         );

    //         if ($varData['metadata']['HTTPStatusCode'] !== 200) {
    //             return redirect()->back()->with('NotFound', 'Error Status Code: ' . $varData['metadata']['HTTPStatusCode']);
    //         }

    //         $businessDocument_RefID = $varData['data']['businessDocument']['businessDocument_RefID'];
    //         $workFlowPath_RefID = $request->workFlowPath_RefID;
    //         $comment = $request->comment;
    //         $approverEntity_RefID = $request->approverEntity_RefID;
    //         $nextApprover_RefID = $request->nextApprover_RefID;
    //         $documentNumber = $varData['data']['businessDocument']['documentNumber'];

    //         return $this->SubmitWorkflow($businessDocument_RefID, $workFlowPath_RefID, $comment, $approverEntity_RefID, $nextApprover_RefID, $documentNumber);
    //     } catch (\Throwable $th) {
    //         Log::error("Store Advance Request Function Error at " . $th->getMessage());
    //         return redirect()->back()->with('NotFound', 'Process Error');
    //     }
    // }

    // REVISION FUNCTION FOR SHOW LIST DATA FILTER BY ID 
    public function RevisionAdvanceIndex(Request $request)
    {
        try {

            $advance_RefID = $request->input('advance_RefID');
            $varAPIWebToken = Session::get('SessionLogin');

            // DATA REVISION ADVANCE
            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceReport',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $advance_RefID,
                    ],
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ],
                false
            );
            
            $compact = [
                'dataHeader' => $filteredArray['data'][0]['document']['header'],
                'dataContent' => $filteredArray['data'][0]['document']['content']['general'],
                'dataDetail' => $filteredArray['data'][0]['document']['content']['details']['itemList'],
                'varAPIWebToken' => $varAPIWebToken,
                'statusRevisi' => 1,
                'statusFinalApprove' => "No",
            ];
            return view('Process.Advance.AdvanceRequest.Transactions.RevisionAdvanceRequest', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    // UPDATE FUNCTION
    public function updates(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $documentTypeID = $request->documentTypeID;
            $Sys_ID_Advance = $request->Sys_ID_Advance;
            $input = Session::get('dataInputUpdate' . $documentTypeID . $Sys_ID_Advance);
            if (isset($request->fileAttachment)) {
                $input['dataInput_Log_FileUpload_Pointer_RefID'] = $request->fileAttachment;
            }
            $count_product = count($input['var_product_id']);

            $advanceDetail = [];
            if ($count_product > 0 && isset($count_product)) {
                for ($n = 0; $n < $count_product; $n++) {
                    $advanceDetail[$n] = [
                        'recordID' => ((!$input['var_recordIDDetail'][$n]) ? null : (int) $input['var_recordIDDetail'][$n]),
                        'entities' => [
                            "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudgetSectionDetail_RefID'][$n],
                            "product_RefID" => (int) $input['var_product_id'][$n],
                            "quantity" => (float) $input['var_quantity'][$n],
                            "quantityUnit_RefID" => (int) $input['var_qty_id'][$n],
                            "productUnitPriceCurrency_RefID" => (int) $input['var_currency_id'][$n],
                            "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
                            "productUnitPriceCurrencyExchangeRate" => 1,
                            "remarks" => 'Catatan Detail'
                        ]
                    ];
                }
            }

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.update.finance.setAdvance',
                'latest',
                [
                    'recordID' => (int)$input['var_recordID'],
                    'entities' => [
                        "documentDateTimeTZ" => date('Y-m-d'),
                        "log_FileUpload_Pointer_RefID" => (int)$input['dataInput_Log_FileUpload_Pointer_RefID'],
                        "requesterWorkerJobsPosition_RefID" => (int)$input['requester_id'],
                        "beneficiaryWorkerJobsPosition_RefID" => (int)$input['beneficiary_id'],
                        "beneficiaryBankAccount_RefID" => (int)$input['bank_account_id'],
                        "internalNotes" => 'My Internal Notes',
                        "remarks" => $input['var_remark'],
                        "additionalData" => [
                            "itemList" => [
                                "items" => $advanceDetail
                            ]
                        ]
                    ]
                ]
            );

            $businessDocument_RefID = $varData['data']['businessDocument']['businessDocument_RefID'];
            $workFlowPath_RefID = $request->workFlowPath_RefID;
            $comment = $request->comment;
            $approverEntity_RefID = $request->approverEntity_RefID;
            $nextApprover_RefID = $request->nextApprover_RefID;
            $documentNumber = $varData['data']['businessDocument']['documentNumber'];

            return $this->ResubmitWorkflow($businessDocument_RefID, $comment, $approverEntity_RefID, $nextApprover_RefID, $documentNumber);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());

            $compact = [
                "status" => 500
            ];

            return response()->json($compact);
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
                $varDataExcel[$i]['total'] = number_format($collections['TotalAdvance'], 2);
                $varDataExcel[$i]['currency'] = $collections['CurrencyName'];
                $varDataExcel[$i]['requester'] = $collections['RequesterWorkerName'];
                $varDataExcel[$i]['beneficiary'] = $collections['BeneficiaryWorkerName'];
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

                    $data = [
                        'title' => 'ADVANCE REQUEST SUMMARY',
                        'date' => date('d/m/Y H:m:s'),
                        'projectCode' => $dataAdvance['varDataProject'][0]['projectCode'],
                        'projectName' => $dataAdvance['varDataProject'][0]['projectName'],
                        'printedBy' => Session::get('SessionLoginName'),
                        'data' => $dataAdvance
                    ];

                    $pdf = PDF::loadView('Process.Advance.AdvanceRequest.Reports.PrintReportAdvanceSummary', $data);
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
            'varAPIWebToken'    => [],
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

            $varDataExcel = [];
            $i = 0;
            $totalAdvance = 0;
            foreach ($filteredArray['data'][0]['document']['content']['details']['itemList'] as $collections) {

                $totalAdvance += $collections['entities']['priceBaseCurrencyValue'];

                $varDataExcel[$i]['no'] = $i + 1;
                $varDataExcel[$i]['product_RefID'] = $collections['entities']['product_RefID'];
                $varDataExcel[$i]['productName'] = $collections['entities']['productName'];
                $varDataExcel[$i]['quantity'] = number_format($collections['entities']['quantity'], 2);
                $varDataExcel[$i]['productUnitPriceBaseCurrencyValue'] = number_format($collections['entities']['productUnitPriceBaseCurrencyValue'], 2);
                $varDataExcel[$i]['priceBaseCurrencyValue'] = number_format($collections['entities']['priceBaseCurrencyValue'], 2);

                $i++;
            }
            
            $compact = [
                'dataHeader'        => $filteredArray['data'][0]['document']['header'],
                'dataContent'       => $filteredArray['data'][0]['document']['content']['general'],
                'dataDetail'        => $filteredArray['data'][0]['document']['content']['details']['itemList'],
                'dataExcel'         => $varDataExcel,
                'statusDetail'      => 1,
                'advance_RefID'     => $filteredArray['data'][0]['document']['header']['recordID'],
                'advance_number'    => $filteredArray['data'][0]['document']['header']['number'],
                'statusHeader'      => $statusHeader
            ];

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
