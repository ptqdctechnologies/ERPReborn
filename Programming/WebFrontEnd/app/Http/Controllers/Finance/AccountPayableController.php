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

    public function DataPickLists(Request $request) 
    {
        try {
            $response = $this->accountPayableService->dataPickList();

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch DataPickLists Account Payable');
            }

            return response()->json($response['data']['data']);
        } catch (\Throwable $th) {
            Log::error("DataPickLists Account Payable Function Error: " . $th->getMessage());

            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function AccountPayableDetail(Request $request)
    {
        try {
            $varAPIWebToken     = Session::get('SessionLogin');
            $accountPayableID   = $request->input('account_payable_id');

            $response = $this->accountPayableService->getDetail($accountPayableID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Account Payable Detail');
            }

            $compact = [
                "status"    => $response['metadata']['HTTPStatusCode'],
                "data"      => $response['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Account Payable Detail Function Error " . $th->getMessage());

            $compact = [
                "status"    => 500,
                "data"      => []
            ];

            return response()->json($compact);
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
                    'combinedBudgetRefID'           => $dataAccountPayableDetail[0]['combinedBudget_RefID'] ?? '',
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
                    'otherSupplier'                 => $dataAccountPayableDetail[0]['otherSupplier'] ?? '',
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
        return view('Finance.AccountPayable.Reports.ReportAccountPayableSummary');
    }

    public function ReportAccountPayableSummaryStore(Request $request)
    {
        try {
            $date           = $request->apDate;
            $supplier       = $request->supplier_id;
            $budget = [
                'id'        => $request->budget_id,
                'code'      => $request->budget_code,
            ];
            $subBudget = [
                'id'        => $request->site_id,
                'code'      => $request->site_code,
            ];

            $response = $this->accountPayableService->summaryReport(
                $budget['code'], 
                $subBudget['code'], 
                $supplier,
                $date
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Report Account Payable Summary Store');
            }

            $compact = [
                'status'    => $response['metadata']['HTTPStatusCode'],
                'data'      => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Account Payable Summary Store Function Error:" . $th->getMessage());

            $compact = [
                'status'    => 500,
                'message'   => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportAccountPayableSummary(Request $request) 
    {
        try {
            $type                       = $request->printType;
            $budgetName                 = $request->budgetName;
            $subBudgetName              = $request->subBudgetName;
            $supplierName               = $request->supplierName;
            $apDate                     = $request->apDate;
            $dataAccountPayableSummary  = json_decode($request->dataReport, true);

            if ($dataAccountPayableSummary) {
                if ($type === "PDF") {
                    $pdf = PDF::loadView('Finance.AccountPayable.Reports.ReportAccountPayableSummary_pdf', [
                        'dataReport'    => $dataAccountPayableSummary, 
                        'budgetName'    => $budgetName,
                        'subBudgetName' => $subBudgetName,
                        'supplierName'  => $supplierName,
                        'apDate'        => $apDate
                        ])->setPaper('a4', 'landscape');

                    $pdf->output();
                    $dom_pdf    = $pdf->getDomPDF();
                    $canvas     = $dom_pdf ->get_canvas();
                    $width      = $canvas->get_width();
                    $height     = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Report Account Payable Summary.pdf');
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportReportAccountPayableSummary($dataAccountPayableSummary, $budgetName, $subBudgetName, $supplierName, $apDate), 'Report Account Payable Summary.xlsx');
                } else {
                    throw new \Exception('Failed to Export Account Payable Summary Report');
                }
            } else {
                throw new \Exception('Account Payable Summary Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report Account Payable Summary Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }
}