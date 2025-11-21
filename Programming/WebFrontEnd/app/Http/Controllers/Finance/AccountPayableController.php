<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\ExportExcel\Finance\ExportReportAccountPayableSummary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use App\Services\Finance\AccountPayableService;
use App\Services\WorkflowService;

class AccountPayableController extends Controller
{
    protected $accountPayableService;

    public function __construct(AccountPayableService $accountPayableService, WorkflowService $workflowService)
    {
        $this->accountPayableService    = $accountPayableService;
        $this->workflowService          = $workflowService;
    }

    public function index(Request $request) 
    {
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');
        $documentTypeRefID  = $this->GetBusinessDocumentsType('Payment Instruction Form');

        return view('Finance.AccountPayable.Transactions.CreateAccountPayable', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken,
            'documentType_RefID'    => $documentTypeRefID
        ]);
    }

    public function store(Request $request) 
    {
        try {
            $response = $this->accountPayableService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Account Payable');
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Submit Workflow Create Account Payable');
            }

            $compact = [
                "documentNumber"    => $response['data']['businessDocument']['documentNumber'],
                "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Account Payable Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }

        return response()->json($request->all());
    }

    public function UpdatesRevisionAccountPayable(Request $request)
    {
        try {
            $response = $this->accountPayableService->updates($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Update Account Payable');
            }

            $compact = [
                "documentNumber"    => $response['data'][0]['businessDocument']['documentNumber'],
                "status"            => $response['metadata']['HTTPStatusCode'],
                // "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Update Account Payable Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function DataPickList(Request $request) 
    {
        try {
            $response = $this->accountPayableService->dataPickList();

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch DataPickList Account Payable');
            }

            return response()->json($response['data']['data']);
        } catch (\Throwable $th) {
            Log::error("DataPickList Account Payable Function Error: " . $th->getMessage());

            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function RadioFormatValue($value) 
    {
        $vatStatus = match ($value) {
            0       => 'no',
            1       => 'yes',
            default => null
        };

        return $vatStatus;
    }

    public function RevisionAccountPayable(Request $request) 
    {
        try {
            $varAPIWebToken         = Session::get('SessionLogin');
            $accountPayableRefID    = $request->input('modal_account_payable_id');
            $documentTypeRefID      = $this->GetBusinessDocumentsType('Payment Instruction Revision Form');

            $response = $this->accountPayableService->getDetail($accountPayableRefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Account Payable');
            }

            $dataAccountPayableDetail = $response['data'];

            // dump($dataAccountPayableDetail);

            $compact = [
                'varAPIWebToken'        => $varAPIWebToken,
                'documentTypeRefID'     => $documentTypeRefID,
                'header'                => [
                    'accountPayable_RefID'          => $dataAccountPayableDetail[0]['paymentInstruction_RefID'] ?? '',
                    'purchaseOrderNumber'           => $dataAccountPayableDetail[0]['po_Number'] ?? '',
                    'supplier_RefID'                => $dataAccountPayableDetail[0]['supplier_RefID'] ?? '',
                    'supplierCode'                  => $dataAccountPayableDetail[0]['supplierCode'] ?? '',
                    'supplierName'                  => $dataAccountPayableDetail[0]['supplierName'] ?? '',
                    'supplierAddress'               => $dataAccountPayableDetail[0]['supplierAddress'] ?? '',
                    'currency_RefID'                => $dataAccountPayableDetail[0]['currency_RefID'] ?? '',
                    'currencyISOCode'               => $dataAccountPayableDetail[0]['currencySymbol'] ?? '',
                    'paymentTerm'                   => $dataAccountPayableDetail[0]['paymentTerm'] ?? '',
                    'deliveryFrom'                  => $dataAccountPayableDetail[0]['supplierName'] ?? '',
                    'deliveryTo'                    => $dataAccountPayableDetail[0]['purchaseOrderDeliveryTo']['Address'] ?? '',
                    'supplierInvoiceNumber'         => $dataAccountPayableDetail[0]['supplierInvoiceNumber'] ?? '',
                    'paymentTransfer_RefID'         => $dataAccountPayableDetail[0]['supplier_RefID'] ?? '',
                    'paymentTransferName'           => $dataAccountPayableDetail[0]['supplierBank_AccountName'] ?? '',
                    'paymentTransferBankCode'       => $dataAccountPayableDetail[0]['supplierBank_Code'] ?? '',
                    'paymentTransferAccountNumber'  => $dataAccountPayableDetail[0]['supplierBank_AccountNumber'] ?? '',
                    'receiptInvoiceOrigin'          => $this->RadioFormatValue($dataAccountPayableDetail[0]['receiptStatus']) ?? '',
                    'contractPOSigned'              => $this->RadioFormatValue($dataAccountPayableDetail[0]['contractStatus']) ?? '',
                    'VATOrigin'                     => $this->RadioFormatValue($dataAccountPayableDetail[0]['vatStatus']) ?? '',
                    'VATPercentage'                 => (int) $dataAccountPayableDetail[0]['vatValue'] ?? '',
                    'VATNumber'                     => $dataAccountPayableDetail[0]['vatNumber'] ?? '',
                    'FatPatDoOrigin'                => $this->RadioFormatValue($dataAccountPayableDetail[0]['fatPatDoStatus']) ?? '',
                    'notes'                         => $dataAccountPayableDetail[0]['notes'] ?? '',
                    'asset'                         => $this->RadioFormatValue($dataAccountPayableDetail[0]['assetStatus']) ?? '',
                    'category_RefID'                => $dataAccountPayableDetail[0]['assetCategory_RefID'] ?? '',
                    'categoryCode'                  => $dataAccountPayableDetail[0]['assetCategoryCode'] ?? '',
                    'categoryName'                  => $dataAccountPayableDetail[0]['assetCategoryName'] ?? '',
                    'depreciationMethod_RefID'      => $dataAccountPayableDetail[0]['depreciationMethod_RefID'] ?? '',
                    'depreciationMethod'            => $dataAccountPayableDetail[0]['depreciationMethod'] ?? '',
                    'depreciationRate'              => $dataAccountPayableDetail[0]['depreciationRate'] ?? '',
                    'depreciationYears'             => $dataAccountPayableDetail[0]['depreciationYears'] ?? '',
                    'depreciationCOA_RefID'         => $dataAccountPayableDetail[0]['depreciationCOA_RefID'] ?? '',
                    'depreciationCOACode'           => $dataAccountPayableDetail[0]['depreciationCOA_Code'] ?? '',
                    'depreciationCOAName'           => $dataAccountPayableDetail[0]['depreciationCOA_Name'] ?? '',
                    'depreciationRateYears_RefID'   => $dataAccountPayableDetail[0]['depreciationAssetCategory_RefID'] ?? '',
                    'deduction'                     => $dataAccountPayableDetail[0]['deduction'] ?? ''
                ],
                'detail'                => $dataAccountPayableDetail
            ];

            // dump($compact);

            return view('Finance.AccountPayable.Transactions.RevisionAccountPayable', $compact);
        } catch (\Throwable $th) {
            Log::error("Revision Account Payable Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function ReportAccountPayableSummary() 
    {
        $isSubmitButton = Session::get('isButtonReportAccountPayableSummary');
        $dataReport     = $isSubmitButton ? Session::get('dataReportAccountPayableSummary') : [];

        $compact = [
            'dataReport' => $dataReport
        ];

        return view('Finance.AccountPayable.Reports.ReportAccountPayableSummary', $compact);
    }

    public function ReportAccountPayableSummaryStore(Request $request)
    {
        try {
            $project = [
                'id'        => $request->project_id_second,
                'code'      => $request->project_code_second,
                'name'      => $request->project_name_second,
            ];

            $site = [
                'id'        => $request->site_id_second,
                'code'      => $request->site_code_second,
                'name'      => $request->site_name_second,
            ];

            $supplier = [
                'id'        => $request->supplier_id,
                'code'      => $request->supplier_code,
                'address'   => $request->supplier_address,
            ];

            $date = $request->input('date');

            if (!$project['id']) {
                Session::forget("isButtonReportAccountPayableSummary");
                Session::forget("dataReportAccountPayableSummary");

                return redirect()->route('AccountPayable.ReportAccountPayableSummary')->with('NotFound', 'Budget Cannot Be Empty');
            }

            $response = $this->accountPayableService->summaryReport($project, $site, $supplier, $date);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Report Account Payable Summary');
            }

            $compact = [
                'project'   => $project,
                'site'      => $site,
                'supplier'  => $supplier,
                'date'      => $date,
                'data'      => $response['data']['data']
            ];

            Session::put("isButtonReportAccountPayableSummary", true);
            Session::put("dataReportAccountPayableSummary", $compact);

            return redirect()->route('AccountPayable.ReportAccountPayableSummary');
        } catch (\Throwable $th) {
            Log::error("Report Account Payable Summary Store Function Error: " . $th->getMessage());
            
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportAccountPayableSummary(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportAccountPayableSummary");
            $print_type = $request->print_type;

            if ($print_type == "PDF") {
                $pdf = PDF::loadView('Finance.AccountPayable.Reports.ReportAccountPayableSummary_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                $pdf->output();
                $dom_pdf = $pdf->getDomPDF();

                $canvas = $dom_pdf ->get_canvas();
                $width  = $canvas->get_width();
                $height = $canvas->get_height();
                $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                return $pdf->download('Account Payable Summary.pdf');
            } else {
                return Excel::download(new ExportReportAccountPayableSummary, 'Account Payable Summary.xlsx');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Account Payable Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}