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
        $this->workflowService = $workflowService;
    }

    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var = 0;
        if (!empty($_GET['var'])) {
            $var = $_GET['var'];
        }

        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Reimbursement Form');

        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
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
                "documentNumber" => $response['data']['businessDocument']['documentNumber'],
                "status" => $responseWorkflow['metadata']['HTTPStatusCode'],
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
            $response = $this->reimbursementService->getDetail($request->reimbursement_id);

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
            $response = $this->reimbursementService->getDetail($request->modal_reimbursement_id);
            $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Reimbursement Revision Form');

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Reimbursement');
            }

            $data = $response['data']['data'];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'documentTypeRefID' => $documentTypeRefID,
                'header' => [
                    'sys_RefID' => $data[0]['Sys_ID_Header'] ?? '',
                    'combinedBudget_RefID' => $data[0]['CombinedBudget_RefID'] ?? '',
                    'combinedBudgetCode' => $data[0]['CombinedBudgetCode'] ?? '',
                    'combinedBudgetName' => $data[0]['CombinedBudgetName'] ?? '',
                    'combinedBudgetSection_RefID' => $data[0]['CombinedBudgetSection_RefID'] ?? '',
                    'combinedBudgetSectionCode' => $data[0]['CombinedBudgetSectionCode'] ?? '',
                    'combinedBudgetSectionName' => $data[0]['CombinedBudgetSectionName'] ?? '',
                    'customer_RefID' => $data[0]['Requester_RefID'] ?? '',
                    'customerCode' => $data[0]['RequesterCode'] ?? '',
                    'customerName' => $data[0]['RequesterName'] ?? '',
                    'beneficiary_RefID' => $data[0]['Beneficiary_RefID'] ?? '',
                    'beneficiaryName' => $data[0]['BeneficiaryName'] ?? '',
                    'beneficiaryPosition' => $data[0]['BeneficiaryCode'] ?? '',
                    'beneficiaryBank_RefID' => $data[0]['BeneficiaryBank_RefID'] ?? '',
                    'beneficiaryBankName' => $data[0]['BeneficiaryBankName'] ?? '',
                    'beneficiaryBankAcronym' => $data[0]['BeneficiaryBankAcronym'] ?? '',
                    'beneficiaryBankAccount_RefID' => $data[0]['BeneficiaryBankAccount_RefID'] ?? '',
                    'beneficiaryBankAccountNumber' => $data[0]['BeneficiaryBankAccountNumber'] ?? '',
                    'beneficiaryBankAccountName' => $data[0]['BeneficiaryBankAccountName'] ?? '',
                    'fileID' => $data[0]['Log_FileUpload_Pointer_RefID'] ?? null,
                    'remark' => $data[0]['Remarks_Header'] ?? '',
                ],
                'detail' => $data
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
                "documentNumber" => $response['data'][0]['businessDocument']['documentNumber'],
                "status" => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("UpdateReimbursement Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportReimbursementSummary(Request $request)
    {
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Reimbursement Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Process.Reimbursement.Reports.ReportReimbursementSummary', $compact);
    }

    public function ReportReimbursementSummaryStore(Request $request)
    {
        try {
            $date = $request->remDate;
            $budget = [
                "id" => $request->budget_id,
                "code" => $request->budget_code,
            ];
            $customerID = $request->customer_id;

            $response = $this->reimbursementService->getReimbursementSummary(
                $budget['code'],
                $customerID,
                $date
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Reimbursement Summary Report');
            }

            $compact = [
                'status' => $response['metadata']['HTTPStatusCode'],
                'data' => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Reimbursement Summary Store Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportReimbursementSummary(Request $request)
    {
        try {
            $type = $request->printType;
            $budgetName = $request->budgetName;
            $customerName = $request->customerName;
            $remDate = $request->remDate;
            $dataReimbursementSummary = json_decode($request->dataReport, true);

            if ($dataReimbursementSummary) {
                if ($type === "PDF") {
                    $pdf = PDF::loadView('Process.Reimbursement.Reports.ReportReimbursementSummary_pdf', [
                        'dataRem' => $dataReimbursementSummary,
                        'budgetName' => $budgetName,
                        'customerName' => $customerName,
                        'remDate' => $remDate
                    ])->setPaper('a4', 'landscape');

                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();
                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Reimbursement Summary.pdf');
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportReportReimbursementSummary($dataReimbursementSummary), 'Export Report Reimbursement Summary.xlsx');
                } else {
                    throw new \Exception('Failed to Export Reimbursement Summary Report');
                }
            } else {
                throw new \Exception('Reimbursement Summary Data is Empty');
            }

        } catch (\Throwable $th) {
            Log::error("Print Export Report Reimbursement Summary Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }

    public function ReportRemToDN(Request $request)
    {
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Reimbursement Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Process.Reimbursement.Reports.ReportRemToDN', $compact);
    }

    public function ReportRemToDNStore(Request $request)
    {
        try {
            $budgetCode = $request->budget_code;
            $customerID = $request->customer_id;
            $date = $request->date;

            $response = $this->reimbursementService->getReimbursementToDebitNote(
                $budgetCode,
                $customerID,
                $date
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Report Reimbursement to Debit Note');
            }

            $compact = [
                'status' => $response['metadata']['HTTPStatusCode'],
                'data' => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Reimbursement to Debit Note Store Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportRemToDN(Request $request)
    {

    }
}