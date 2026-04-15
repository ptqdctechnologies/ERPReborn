<?php

namespace App\Http\Controllers\Process\Advance;

use App\Http\Controllers\ExportExcel\AdvanceSettlement\ExportReportAdvanceSettlementSummary;
use App\Http\Controllers\ExportExcel\AdvanceSettlement\ExportReportAdvanceSettlementDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\Process\Advance\AdvanceSettlementService;
use App\Services\WorkflowService;

class AdvanceSettlementController extends Controller
{
    protected $advanceSettlementService, $workflowService;

    public function __construct(AdvanceSettlementService $advanceSettlementService, WorkflowService $workflowService)
    {
        $this->advanceSettlementService = $advanceSettlementService;
        $this->workflowService = $workflowService;
    }

    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        TRANSACTIONS                                                                      |
    // +--------------------------------------------------------------------------------------------------------------------------+

    public function index(Request $request)
    {
        $var = $request->query('var', 0);
        $varAPIWebToken = Session::get('SessionLogin');
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Advance Settlement Form');

        return view('Process.Advance.AdvanceSettlement.Transactions.CreateAdvanceSettlement', [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'documentType_RefID' => $documentTypeRefID
        ]);
    }

    public function store(Request $request)
    {
        try {
            $response = $this->advanceSettlementService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Advance Settlement');
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Submit Workflow Create Advance Settlement');
            }

            $compact = [
                "documentNumber" => $response['data']['businessDocument']['documentNumber'],
                "status" => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Advance Settlement Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function updatesAdvanceSettlement(Request $request)
    {
        try {
            $response = $this->advanceSettlementService->updates($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Update Advance Settlement');
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data'][0]['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Submit Workflow Revision Advance Settlement');
            }

            $compact = [
                "documentNumber" => $response['data'][0]['businessDocument']['documentNumber'],
                "status" => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Update Advance Settlement Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function AdvanceSettlementDetail(Request $request)
    {
        try {
            $advanceSettlementID = $request->input('advance_settlement_id');

            $response = $this->advanceSettlementService->getDetail($advanceSettlementID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Advance Settlement Detail');
            }

            $compact = [
                "status" => $response['metadata']['HTTPStatusCode'],
                "data" => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Advance Settlement Detail Function Error " . $th->getMessage());

            $compact = [
                "status" => 500,
                "data" => []
            ];

            return response()->json($compact);
        }
    }

    public function RevisionAdvanceSettlementIndex(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $advanceSettlementID = $request->input('advance_settlement_id');
            $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Advance Settlement Revision Form');

            $response = $this->advanceSettlementService->getDetail($advanceSettlementID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $details = $response['data']['data'] ?? [];
            $header = $details[0] ?? [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'documentType_RefID' => $documentTypeRefID,
                'budget_RefID' => $header['combinedBudget_RefID'] ?? '-',
                'advanceNumber' => $header['documentNumber'] ?? '-',
                'budget' => $header['combinedBudgetCode'] . ' - ' . $header['combinedBudgetName'],
                'subBudget' => $header['combinedBudgetSectionCode'] . ' - ' . $header['combinedBudgetSectionName'],
                'beneficiaryName' => $header['beneficiaryName'] ?? '-',
                'bankName' => $header['bankName'] ?? '-',
                'bankAccount' => $header['bankAccount'] ?? '-',
                'fileID' => $header['log_FileUpload_Pointer_RefID'] ?? null,
                'remark' => $header['remarks'] ?? '-',
                'dataDetail' => $details
            ];

            return view('Process.Advance.AdvanceSettlement.Transactions.RevisionAdvanceSettlement', $compact);
        } catch (\Throwable $th) {
            Log::error('Revision Advance Settlement Index Error', [
                'message' => $th->getMessage(),
                'advanceSettlementRefId' => $request->input('advance_settlement_id')
            ]);

            return redirect()
                ->route('AdvanceSettlement.index', ['var' => 1])
                ->with('NotFound', 'Data cannot be displayed at this time. Please try again.');
        }
    }

    public function AdvanceSettlementPickList(Request $request)
    {
        $response = $this->advanceSettlementService->dataPickList();

        $status = $response['metadata']['HTTPStatusCode'];
        $data = [];

        if ($status == 200) {
            $data = $response['data']['data'] ?? [];
        }

        return response()->json([
            'data' => $data,
            'status' => $status
        ]);
    }

    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        REPORTS                                                                           |
    // +--------------------------------------------------------------------------------------------------------------------------+

    public function ReportAdvanceSettlementDetail(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportAdvanceSettlementDetailSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportAdvanceSettlementDetail', []) : [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'dataReport' => $dataReport
            ];

            return view('Process.Advance.AdvanceSettlement.Reports.ReportAdvanceSettlementDetail', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportAdvanceSettlementDetail Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceSettlementDetailData($advance_id, $project_code, $site_code, $advance_document, $project_name_second, $site_name_second)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $getReportAdvanceDetail = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'report.form.documentForm.finance.getAdvance',
                'latest',
                [
                    'parameter' => [
                        'recordID' => (int) $advance_id
                    ]
                ]
            );

            $splitResponse = $getReportAdvanceDetail['data'][0]['document'];

            $totalAdvance = array_reduce($splitResponse['content']['details']['itemList'], function ($carry, $item) {
                return $carry + ($item['entities']['priceBaseCurrencyValue'] * $item['entities']['quantity'] ?? 0);
            }, 0);

            $compact = [
                'dataHeader' => $splitResponse['header'],
                'dataDetails' => $splitResponse['content'],
                'budgetCode' => $project_code,
                'budgetName' => $project_name_second,
                'siteCode' => $site_code,
                'siteName' => $site_name_second,
                'advanceNumber' => $advance_document,
                'total' => $totalAdvance
            ];

            Session::put("isButtonReportAdvanceSettlementDetailSubmit", true);
            Session::put("dataReportAdvanceSettlementDetail", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportAdvanceSettlementDetailData Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceSettlementDetailStore(Request $request)
    {
        try {
            $project_code = $request->project_code_second;
            $project_id = $request->project_id_second;
            $project_name_second = $request->project_name_second;

            $site_code = $request->site_code_second;
            $site_id = $request->site_id_second;
            $site_name_second = $request->site_name_second;

            $advance_document = $request->modal_advance_document_number;
            $advance_id = $request->modal_advance_id;

            $errors = [];

            if (!$project_id) {
                $errors[] = 'Budget';
            }
            if (!$site_id) {
                $errors[] = 'Sub Budget';
            }
            if (!$advance_id) {
                $errors[] = 'ASF Number';
            }

            if (!empty($errors)) {
                $message = implode(', ', $errors) . ' Cannot Be Empty';
            }

            if (isset($message)) {
                Session::forget("isButtonReportAdvanceSettlementDetailSubmit");
                Session::forget("dataReportAdvanceSettlementDetail");

                return redirect()->route('AdvanceSettlement.ReportAdvanceSettlementDetail')->with('NotFound', $message);
            }

            $compact = $this->ReportAdvanceSettlementDetailData($advance_id, $project_code, $site_code, $advance_document, $project_name_second, $site_name_second);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('AdvanceSettlement.ReportAdvanceSettlementDetail');
        } catch (\Throwable $th) {
            Log::error("ReportAdvanceSettlementDetailStore Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportAdvanceSettlementDetail(Request $request)
    {
        try {
            $dataReport = Session::get("dataReportAdvanceSettlementDetail");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            if ($project_code_second_trigger == null) {
                Session::forget("isButtonReportAdvanceSettlementDetailSubmit");
                Session::forget("dataReportAdvanceSettlementDetail");

                return redirect()->route('AdvanceSettlement.ReportAdvanceSettlementDetail')->with('NotFound', 'Budget, & Sub Budget Cannot Be Empty');
            }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Process.Advance.AdvanceSettlement.Reports.ReportAdvanceSettlementDetail_pdf', ['dataReport' => $dataReport]);
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Advance Settlement Detail.pdf');
                } else {
                    return Excel::download(new ExportReportAdvanceSettlementDetail, 'Export Report Advance Settlement Detail.xlsx');
                }
            } else {
                return redirect()->route('AdvanceSettlement.ReportAdvanceSettlementDetail')->with('NotFound', 'Budget, Sub Budget, & ASF Number Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportAdvanceSettlementDetail Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceSettlementSummary(Request $request)
    {
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Advance Settlement Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Process.Advance.AdvanceSettlement.Reports.ReportAdvanceSettlementSummary', $compact);
    }

    public function ReportAdvanceSettlementSummaryStore(Request $request)
    {
        try {
            $date = $request->asfDate;
            $budget = [
                "id" => $request->budget_id,
                "name" => $request->budget_name,
                "code" => $request->budget_code,
            ];
            $subBudget = [
                "id" => $request->site_id,
                "name" => $request->site_name,
                "code" => $request->site_code,
            ];

            $response = $this->advanceSettlementService->getAdvanceSettlementSummary($budget['code'], $subBudget['code'], $date);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Advance Settlement Summary Report');
            }

            $compact = [
                'status' => $response['metadata']['HTTPStatusCode'],
                'data' => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Advance Settlement Summary Store Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportAdvanceSettlementSummary(Request $request)
    {
        try {
            $dataAdvanceSettlementSummary = json_decode($request->dataReport, true);
            $type = $request->printType;

            if ($dataAdvanceSettlementSummary) {
                if ($type === "PDF") {
                    $pdf = PDF::loadView('Process.Advance.AdvanceSettlement.Reports.ReportAdvanceSettlementSummary_pdf', ['dataASF' => $dataAdvanceSettlementSummary])
                        ->setPaper('a4', 'landscape');

                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();
                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Advance Settlement Summary.pdf');
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportReportAdvanceSettlementSummary($dataAdvanceSettlementSummary), 'Export Report Advance Settlement Summary.xlsx');
                } else {
                    throw new \Exception('Failed to Export Advance Settlement Summary Report');
                }
            } else {
                throw new \Exception('Advance Settlement Summary Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report Advance Settlement Summary Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }
}
