<?php

namespace App\Http\Controllers\Process\Reimbursement;

use Illuminate\Http\Request;
use App\Http\Controllers\ExportExcel\Process\ExportReportReimbursementDetail;
use App\Http\Controllers\ExportExcel\Process\ExportReportReimbursementSummary;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\Process\Reimbursement\ReimbursementService;
use App\Services\WorkflowService;

class ReimbursementController extends Controller
{
    protected $reimbursementService, $workflowService;

    public function __construct(ReimbursementService $reimbursementService, WorkflowService $workflowService)
    {
        $this->reimbursementService = $reimbursementService;
        $this->workflowService      = $workflowService;
    }

    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var            = 0;
        if (!empty($_GET['var'])) {
            $var = $_GET['var'];
        }

        $documentTypeRefID  = $this->GetBusinessDocumentsTypeFromRedis('Reimbursement Form');

        $compact = [
            'var'               => $var,
            'varAPIWebToken'    => $varAPIWebToken,
            'documentTypeRefID' => $documentTypeRefID
        ];

        return view('Process.Reimbursement.Transactions.CreateReimbursement', $compact);
    }

    public function store(Request $request) 
    {
        try {
            $response = $this->reimbursementService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($responseWorkflow);
            }

            $compact = [
                "documentNumber"    => $response['data']['businessDocument']['documentNumber'],
                "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Reimbursement Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function GetReimbursementDetail(Request $request) 
    {
        try {
            $varAPIWebToken = $request->session()->get('SessionLogin');
            $response       = $this->reimbursementService->getDetail($request->reimbursement_id);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response['data']);
            }

            return response()->json($response['data']['data']);
        } catch (\Throwable $th) {
            Log::error("GetReimbursementDetail Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function RevisionReimbursement(Request $request)
    {
        try {
            $varAPIWebToken = $request->session()->get('SessionLogin');
            $response       = $this->reimbursementService->getDetail($request->modal_reimbursement_id);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Reimbursement');
            }

            $data = $response['data']['data'];

            $compact = [
                'varAPIWebToken'    => $varAPIWebToken,
                'header'            => [
                    'sys_RefID'                     => $data[0]['Sys_ID_Header'] ?? '',
                    'combinedBudget_RefID'          => $data[0]['CombinedBudget_RefID'] ?? '',
                    'combinedBudgetCode'            => $data[0]['CombinedBudgetCode'] ?? '',
                    'combinedBudgetName'            => $data[0]['CombinedBudgetName'] ?? '',
                    'combinedBudgetSection_RefID'   => $data[0]['CombinedBudgetSection_RefID'] ?? '',
                    'combinedBudgetSectionCode'     => $data[0]['CombinedBudgetSectionCode'] ?? '',
                    'combinedBudgetSectionName'     => $data[0]['CombinedBudgetSectionName'] ?? '',
                    'customer_RefID'                => $data[0]['Requester_RefID'] ?? '',
                    'customerCode'                  => $data[0]['RequesterCode'] ?? '',
                    'customerName'                  => $data[0]['RequesterName'] ?? '',
                    'beneficiary_RefID'             => $data[0]['Beneficiary_RefID'] ?? '',
                    'beneficiaryName'               => $data[0]['BeneficiaryName'] ?? '',
                    'beneficiaryPosition'           => $data[0]['BeneficiaryCode'] ?? '',
                    'beneficiaryBank_RefID'         => $data[0]['BeneficiaryBank_RefID'] ?? '',
                    'beneficiaryBankName'           => $data[0]['BeneficiaryBankName'] ?? '',
                    'beneficiaryBankAcronym'        => $data[0]['BeneficiaryBankAcronym'] ?? '',
                    'beneficiaryBankAccount_RefID'  => $data[0]['BeneficiaryBankAccount_RefID'] ?? '',
                    'beneficiaryBankAccountNumber'  => $data[0]['BeneficiaryBankAccountNumber'] ?? '',
                    'beneficiaryBankAccountName'    => $data[0]['BeneficiaryBankAccountName'] ?? '',
                    'fileID'                        => $data[0]['Log_FileUpload_Pointer_RefID'] ?? null,
                    'remark'                        => $data[0]['Remarks_Header'] ?? '',
                ],
                'detail'                            => $data
            ];
            
            return view('Process.Reimbursement.Transactions.RevisionReimbursement', $compact);
        } catch (\Throwable $th) {
            Log::error("RevisionReimbursement Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function UpdateReimbursement(Request $request)
    {
        try {
            $response = $this->reimbursementService->updates($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data'][0]['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($responseWorkflow);
            }

            $compact = [
                "documentNumber"    => $response['data'][0]['businessDocument']['documentNumber'],
                "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("UpdateReimbursement Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportReimbursementSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionReimbursementNumber");
        $dataRem = Session::get("ReimbursementReportSummaryDataPDF");

        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataHeader' => [],
            'dataRem' => $dataRem
        
        ];
        // dump($dataRem);

        return view('Process.Reimbursement.Reports.ReportReimbursementSummary', $compact);
    }

    public function ReportReimbursementSummaryData( $project_code)
    {        
        try {
            Log::error("Error at ",[$project_code]);

            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.finance.getReimbursementSummary', 
                'latest',
                [
                    'parameter' => [
                        'CombinedBudgetCode' => $project_code,
                        'Vendor_RefID' => NULL
                        // 'CombinedBudgetCode' =>  $project_code,
                        // 'CombinedBudgetSectionCode' =>  $site_code,
                        // 'Warehouse_RefID' => NULL
                    ],
                     'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                        ]
                ]
            );
            
            Log::error("Error at " ,$filteredArray);
            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');

            }
            Session::put("ReimbursementReportSummaryDataPDF", $filteredArray['data']['data']);
            Session::put("ReimbursementReportSummaryDataExcel", $filteredArray['data']['data']);
            return $filteredArray['data']['data'];
        }
        catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportReimbursementSummaryStore(Request $request)
    {
        // tes;
        try {
            $project_code = $request->project_code_second;
            // $site_code = $request->site_id_second;

            $statusHeader = "Yes";
            Log::error("Error at " ,[$request->all()]);
            if ($project_code == "") {
                Session::forget("ReimbursementReportSummaryDataPDF");
                Session::forget("ReimbursementReportSummaryDataExcel");
                
                return redirect()->route('Reimbursement.ReportReimbursementSummary')->with('NotFound', 'Cannot Empty');
            }

            $compact = $this->ReportReimbursementSummaryData($project_code);
            // dd($compact);
            // if ($compact['dataHeader'] == []) {
            //     Session::forget("PReimbursementSummaryReportDataPDF");
            //     Session::forget("PReimbursementSummaryReportDataExcel");

            //     return redirect()->back()->with('NotFound', 'Data Not Found');
            // }

            return redirect()->route('Reimbursement.ReportReimbursementSummary');
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportReimbursementSummary(Request $request)
    {
        try {
            $dataPDF = Session::get("ReimbursementReportSummaryDataPDF");
            $dataExcel = Session::get("ReimbursementReportSummaryDataExcel");

            
            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataRem = Session::get("ReimbursementReportSummaryDataPDF");
                    // dd($dataRem);

                    $pdf = PDF::loadView('Process.Reimbursement.Reports.ReportReimbursementSummary_pdf', ['dataRem' => $dataRem])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Reimbursement Summary.pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportReimbursementSummary, 'Export Report Reimbursement Summary.xlsx');
                }
            } else {
                return redirect()->route('Reimbursement.ReimbursementSummary')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}