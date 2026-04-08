<?php

namespace App\Http\Controllers\Process\DebitNote;

use App\Http\Controllers\ExportExcel\Process\ExportReportDebitNoteSummary;
use Illuminate\Http\Request;
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
use App\Services\Process\DebitNote\DebitNoteService;
use App\Services\Master\BusinessDocumentType\BusinessDocumentTypeService;
use App\Services\WorkflowService;

class DebitNoteController extends Controller
{
    public function __construct(
        BusinessDocumentTypeService $businessDocumentTypeService,
        DebitNoteService $debitNoteService,
        WorkflowService $workflowService
    ) {
        $this->businessDocumentTypeService = $businessDocumentTypeService;
        $this->debitNoteService = $debitNoteService;
        $this->workflowService = $workflowService;
    }

    public function DataPickList(Request $request)
    {
        try {
            $response = $this->debitNoteService->dataPickList();

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            return response()->json($response['data']['data']);
        } catch (\Throwable $th) {
            Log::error("DataPickList Debit Note Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function index(Request $request)
    {
        $var = $request->query('var', 0);
        $varAPIWebToken = Session::get('SessionLogin');
        $documentTypeRefID = $this->GetBusinessDocumentsType('Debit Note Form');

        return view('Process.DebitNote.Transactions.CreateDebitNote', [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'documentType_RefID' => $documentTypeRefID
        ]);
    }

    public function store(Request $request)
    {
        try {
            $response = $this->debitNoteService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Debit Note');
            }

            // $responseWorkflow = $this->workflowService->submit(
            //     $response['data']['businessDocument']['businessDocument_RefID'],
            //     $request->workFlowPath_RefID,
            //     $request->comment,
            //     $request->approverEntity,
            // );

            // if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
            //     throw new \Exception('Failed to fetch Submit Workflow Create Debit Note');
            // }

            $compact = [
                "documentNumber" => $response['data']['businessDocument']['documentNumber'],
                "status" => $response['metadata']['HTTPStatusCode'],
                // "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Debit Note Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $response = $this->debitNoteService->update($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Update Debit Note');
            }

            // $responseWorkflow = $this->workflowService->submit(
            //     $response['data'][0]['businessDocument']['businessDocument_RefID'],
            //     $request->workFlowPath_RefID,
            //     $request->comment,
            //     $request->approverEntity,
            // );

            // if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
            //     throw new \Exception('Failed to fetch Submit Workflow Revision Debit Note');
            // }

            $compact = [
                "documentNumber" => $response['data'][0]['businessDocument']['documentNumber'],
                "status" => $response['metadata']['HTTPStatusCode'],
                // "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Update Debit Note Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function RevisionDebitNote(Request $request)
    {
        try {
            $varAPIWebToken = $request->session()->get('SessionLogin');
            $response = $this->debitNoteService->getDetail($request->debit_note_id);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $data = $response['data']['data'];
            $documentTypeRefID = $this->GetBusinessDocumentsType('Debit Note Revision Form');

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'documentType_RefID' => $documentTypeRefID,
                'header' => [
                    'debitNoteReference_RefID' => $data[0]['Sys_ID_Header'] ?? '',
                    'debitNoteReferenceNumber' => $data[0]['BusinessDocumentNumber'] ?? '',
                    'partner_RefID' => $data[0]['Partner_RefID'] ?? '',
                    'partnerCode' => $data[0]['PartnerCode'] ?? '',
                    'partnerName' => $data[0]['PartnerName'] ?? '',
                    'fileID' => $data[0]['Log_FileUpload_Pointer_RefID'] ?? null,
                    'remarks' => $data[0]['Remarks'] ?? '',
                ],
                'detail' => $data
            ];

            return view('Process.DebitNote.Transactions.RevisionDebitNote', $compact);
        } catch (\Throwable $th) {
            Log::error("Revision Debit Note Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportDebitNoteSummary(Request $request)
    {
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Purchase Order Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Process.DebitNote.Reports.ReportDebitNoteSummary', $compact);
    }

    public function ReportDebitNoteSummaryStore(Request $request)
    {
        try {
            $date = $request->dnDate;
            $budget = [
                "id" => $request->budget_id,
                "code" => $request->budget_code,
            ];
            $subBudget = [
                "id" => $request->sub_budget_id,
                "code" => $request->sub_budget_code,
            ];
            $customerID = $request->customer_id;

            $response = $this->debitNoteService->getDebitNoteSummary(
                $budget['code'],
                $subBudget['code'],
                $date,
                $customerID
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
            Log::error("Report Debit Note Summary Store Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportDebitNoteSummary(Request $request)
    {
        try {
            $type = $request->printType;
            $budgetName = $request->budgetName;
            $customerName = $request->customerName;
            $dnDate = $request->dnDate;
            $dataDebitNoteSummary = json_decode($request->dataReport, true);

            if ($dataDebitNoteSummary) {
                if ($type === "PDF") {
                    $pdf = PDF::loadView('Process.DebitNote.Reports.ReportDebitNoteSummary_pdf', [
                        'dataDN' => $dataDebitNoteSummary,
                        'budgetName' => $budgetName,
                        'subBudgetName' => '-',
                        'customerName' => $customerName,
                        'dnDate' => $dnDate
                    ])->setPaper('a4', 'landscape');

                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();
                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Debit Note Summary.pdf');
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportReportDebitNoteSummary($dataDebitNoteSummary), 'Export Report Debit Note Summary.xlsx');
                } else {
                    throw new \Exception('Failed to Export Debit Note Summary Report');
                }
            } else {
                throw new \Exception('Debit Note Summary Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report Debit Note Summary Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }
}
