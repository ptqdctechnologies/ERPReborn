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
    )
    {
        $this->businessDocumentTypeService  = $businessDocumentTypeService;
        $this->debitNoteService             = $debitNoteService;
        $this->workflowService              = $workflowService;
    }

    public function GetBusinessDocumentType($businessDocumentName)
    {
        try {
            $response = $this->businessDocumentTypeService->getDetail(
                [
                    'parameter'     => [],
                    'SQLStatement'  => [
                        'pick'      => null,
                        'sort'      => null,
                        'filter'    => "\"Name\" = '$businessDocumentName'",
                        'paging'    => null
                    ]
                ]
            );

            $documentTypes = $response['data']['data'] ?? [];

            if ($response['metadata']['HTTPStatusCode'] !== 200 || empty($documentTypes)) {
                return null;
            }

            return $documentTypes[0]['sys_ID'];
        } catch (\Throwable $th) {
            Log::error("GetBusinessDocumentType Debit Note Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
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
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');
        $documentTypeRefID  = $this->GetBusinessDocumentType('Debit Note Form');

        return view('Process.DebitNote.Transactions.CreateDebitNote', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken,
            'documentType_RefID'    => $documentTypeRefID
        ]);
    }

    public function store(Request $request)
    {
        try {
            $response = $this->debitNoteService->create($request);

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
            Log::error("Store Debit Note Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function update(Request $request, $id) 
    {
        try {
            $response = $this->debitNoteService->update($request);

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
            Log::error("Update Debit Note Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function RevisionDebitNote(Request $request) 
    {
        try {
            $varAPIWebToken = $request->session()->get('SessionLogin');
            $response       = $this->debitNoteService->getDetail($request->debit_note_id);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $data               = $response['data']['data'];
            $documentTypeRefID  = $this->GetBusinessDocumentType('Debit Note Revision Form');

            $compact = [
                'varAPIWebToken'        => $varAPIWebToken,
                'documentType_RefID'    => $documentTypeRefID,
                'header' => [
                    'debitNoteReference_RefID'  => $data[0]['Sys_ID_Header'] ?? '',
                    'debitNoteReferenceNumber'  => $data[0]['BusinessDocumentNumber'] ?? '',
                    'partner_RefID'             => $data[0]['Partner_RefID'] ?? '',
                    'partnerCode'               => $data[0]['PartnerCode'] ?? '',
                    'partnerName'               => $data[0]['PartnerName'] ?? '',
                    'fileID'                    => $data[0]['Log_FileUpload_Pointer_RefID'] ?? null,
                    'remarks'                   => $data[0]['Remarks'] ?? '',
                ],
                'detail'                => $data
            ];

            return view('Process.DebitNote.Transactions.RevisionDebitNote', $compact);
        } catch (\Throwable $th) {
            Log::error("Revision Debit Note Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportDebitNoteSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseRequisitionNumber");
        $dataDN = Session::get("DebitNoteReportSummaryDataPDF");

        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataHeader' => [],
            'dataDN' => $dataDN
        
        ];
        // dump($dataDN);

        return view('Process.DebitNote.Reports.ReportDebitNoteSummary', $compact);
    }

    public function ReportDebitNoteSummaryData($project_code, $site_code, $start_date = null, $end_date = null)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            // default date range kalau kosong
            if (empty($start_date) && empty($end_date)) {
                $start_date = now()->startOfMonth()->format('Y-m-d') . ' 00:00:00+07';
                $end_date   = now()->endOfMonth()->format('Y-m-d') . ' 23:59:59+07';
            }   

            $params = [
                'parameter' => [
                    'CombinedBudgetCode' => $project_code,
                    'CombinedBudgetSectionCode' => $site_code,
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => [],
                    'paging' => null
                ]
            ];

            // filter by date range
            if (!empty($start_date) && !empty($end_date)) {
                $params['SQLStatement']['filter'][] = [
                    'condition' => 'Between',
                    'field' => 'date',
                    'value' => [
                        'from' => \Carbon\Carbon::parse($start_date)->format('Y-m-d') . ' 00:00:00+07',
                        'to'   => \Carbon\Carbon::parse($end_date)->format('Y-m-d') . ' 23:59:59+07',
                    ],
                ];
            }
            // Log::info("Filter Date Payload", [
            //     'from' => $start_date,
            //     'to'   => $end_date
            // ]);
            // Log::info("Params send to API", $params);

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.finance.getDebitNoteSummary', 
                'latest',
                $params
            );

            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');
            }
            // Log::info("Keys:", array_keys($filteredArray['data']['data'][0]));

            Session::put("DebitNoteReportSummaryDataPDF", $filteredArray['data']['data']);
            Session::put("DebitNoteReportSummaryDataExcel", $filteredArray['data']['data']);
            return $filteredArray['data']['data'];

        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
        }
    }

    public function ReportDebitNoteSummaryStore(Request $request)
    {
        try {
            $project_code = $request->project_code_second;
            $site_code = $request->site_code_second;
            $start_date = $request->start_date;
            $end_date = $request->end_date;

            // convert ke format Y-m-d H:i:s+07
            if (!empty($start_date)) {
                $start_date = \Carbon\Carbon::parse($start_date)->format('Y-m-d 00:00:00+07');
            }
            if (!empty($end_date)) {
                $end_date = \Carbon\Carbon::parse($end_date)->format('Y-m-d 23:59:59+07');
            }


            Session::put('ReportDebitNoteSummaryFilter', [
                'project_code' => $project_code,
                'site_code' => $site_code,
                'start_date' => $start_date,
                'end_date' => $end_date,
            ]);

            // Log::info("Filter params: ", [
            //     'project_code' => $project_code,
            //     'site_code' => $site_code,
            //     'start_date' => $start_date,
            //     'end_date' => $end_date,
            // ]);

            if ($project_code == "" && $site_code == "" && $start_date == "" && $end_date == "") {
                Session::forget("DebitNoteReportSummaryDataPDF");
                Session::forget("DebitNoteReportSummaryDataExcel");
                
                return redirect()->route('DebitNote.ReportDebitNoteSummary')->with('NotFound', 'Cannot Empty');
            }

            $compact = $this->ReportDebitNoteSummaryData($project_code, $site_code, $start_date, $end_date);

            return redirect()->route('DebitNote.ReportDebitNoteSummary');
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
        }
    }

    public function PrintExportReportDebitNoteSummary(Request $request)
    {
        try {
            $dataPDF = Session::get("DebitNoteReportSummaryDataPDF");
            $dataExcel = Session::get("DebitNoteReportSummaryDataExcel");

            
            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataDN = Session::get("DebitNoteReportSummaryDataPDF");

                    $pdf = PDF::loadView('Process.DebitNote.Reports.ReportDebitNoteSummary_pdf', ['dataDN' => $dataDN])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Debit Note Summary.pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportDebitNoteSummary, 'Export Report Debit Note Summary.xlsx');
                }
            } else {
                return redirect()->route('DebitNote.ReportDebitNoteSummary')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}
