<?php
namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\ExportExcel\Purchase\ExportReportCFS;
use App\Http\Controllers\ExportExcel\Purchase\ExportReportPurchaseOrderSummary;
use App\Http\Controllers\ExportExcel\Purchase\ExportReportPOtoDO;
use App\Http\Controllers\ExportExcel\Purchase\ExportReportPOtoAP;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Services\Purchase\PurchaseOrderService;
use App\Services\WorkflowService;

class PurchaseOrderController extends Controller
{
    protected $purchaseOrderService, $workflowService;

    public function __construct(PurchaseOrderService $purchaseOrderService, WorkflowService $workflowService)
    {
        $this->purchaseOrderService = $purchaseOrderService;
        $this->workflowService = $workflowService;
    }

    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        TRANSACTIONS                                                                      |
    // +--------------------------------------------------------------------------------------------------------------------------+

    public function index(Request $request)
    {
        $var = $request->query('var', 0);
        $varAPIWebToken = Session::get('SessionLogin');
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Purchase Order Form');

        return view('Purchase.PurchaseOrder.Transactions.CreatePurchaseOrder', [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'documentType_RefID' => $documentTypeRefID
        ]);
    }

    public function store(Request $request)
    {
        try {
            $response = $this->purchaseOrderService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Purchase Order');
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Submit Workflow Create Purchase Order');
            }

            $compact = [
                "documentNumber" => $response['data']['businessDocument']['documentNumber'],
                "status" => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Purchase Order Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function update(Request $request, $id)
    {
        // 
    }

    public function RevisionPurchaseOrderIndex(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $purchaseOrderID = $request->purchaseOrder_RefID;
            $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Purchase Order Revision Form');

            $response = $this->purchaseOrderService->getDetail($purchaseOrderID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Purchase Order');
            }

            $dataPODetail = $response['data'];
            $dateOfDelivery = $dataPODetail[0]['deliveryDateTimeTZ'] ? Carbon::parse($dataPODetail[0]['deliveryDateTimeTZ'])->toDateString() : '';

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'documentTypeRefID' => $documentTypeRefID,
                'header' => [
                    'budgetID' => $dataPODetail[0]['combinedBudget_RefID'] ?? '',
                    'budgetValue' => $dataPODetail[0]['combinedBudgetCode'] . ' - ' . $dataPODetail[0]['combinedBudgetName'],
                    'subBudgetValue' => $dataPODetail[0]['combinedBudgetSectionCode'] . ' - ' . $dataPODetail[0]['combinedBudgetSectionName'],
                    'poNumberID' => $dataPODetail[0]['purchaseOrder_RefID'] ?? '',
                    'poNumber' => $dataPODetail[0]['documentNumber'] ?? '',
                    'deliveryDateTime' => $dateOfDelivery,
                    'deliveryTo' => $dataPODetail[0]['deliveryTo_NonRefID']['Address'] ?? '',
                    'deliveryToID' => $dataPODetail[0]['deliveryTo_RefID'] ?? '',
                    'supplierID' => $dataPODetail[0]['supplier_RefID'] ?? '-',
                    'supplierName' => $dataPODetail[0]['supplierName'] ?? '',
                    'supplierCode' => $dataPODetail[0]['supplierCode'] ?? '',
                    'supplierAddress' => $dataPODetail[0]['supplierAddress'] ?? '',
                    'downPayment' => (int) $dataPODetail[0]['downPayment'] ?? '',
                    'termOfPaymentID' => $dataPODetail[0]['termOfPayment_RefID'] ?? '',
                    'paymentNotes' => $dataPODetail[0]['paymentNotes'] ?? '',
                    'remarkPO' => $dataPODetail[0]['remarks'] ?? '',
                    'internalNote' => $dataPODetail[0]['internalNotes'] ?? '',
                    'fileID' => $dataPODetail[0]['log_FileUpload_Pointer_RefID'] ?? null,
                    'vatValue' => $dataPODetail[0]['vatRatio'] ?? null,
                    'isVATSelected' => $dataPODetail[0]['vatRatio'] != "0.00" ? 'selected' : '',
                    'transactionTaxDetailRefID' => $dataPODetail[0]['transactionTaxDetail_RefID'] ?? ''
                ],
                'detail' => $dataPODetail
            ];

            return view('Purchase.PurchaseOrder.Transactions.RevisionPurchaseOrder', $compact);
        } catch (\Throwable $th) {
            Log::error("Revision Purchase Order Index Function Error: " . $th->getMessage());

            session()->flash('NotFound', 'Process Error');
            return redirect()->route('PurchaseOrder.index', ['var' => 1]);
        }
    }

    public function UpdatePurchaseOrder(Request $request)
    {
        try {
            $response = $this->purchaseOrderService->updates($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Update Purchase Order');
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data'][0]['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Submit Workflow Update Purchase Order');
            }

            $compact = [
                "documentNumber" => $response['data'][0]['businessDocument']['documentNumber'],
                "status" => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Update Purchase Order Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        REPORTS                                                                           |
    // +--------------------------------------------------------------------------------------------------------------------------+

    public function ReportPurchaseOrderSummary(Request $request)
    {
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Purchase Order Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Purchase.PurchaseOrder.Reports.ReportPurchaseOrderSummary', $compact);
    }

    public function ReportPurchaseOrderSummaryStore(Request $request)
    {
        try {
            $date = $request->poDate;
            $budget = [
                "id" => $request->budget_id,
                "code" => $request->budget_code,
            ];
            $subBudget = [
                "id" => $request->site_id,
                "code" => $request->site_code,
            ];
            $supplierID = $request->supplier_id;

            $response = $this->purchaseOrderService->getPurchaseOrderSummary(
                $budget['code'],
                $subBudget['code'],
                $date,
                $supplierID
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Purchase Order Summary Report');
            }

            $compact = [
                'status' => $response['metadata']['HTTPStatusCode'],
                'data' => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Purchase Order Summary Store Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportPurchaseOrderSummary(Request $request)
    {
        try {
            $type = $request->printType;
            $budgetName = $request->budgetName;
            $subBudgetName = $request->subBudgetName;
            $supplierName = $request->supplierName;
            $poDate = $request->poDate;
            $dataPurchaseOrderSummary = json_decode($request->dataReport, true);

            if ($dataPurchaseOrderSummary) {
                if ($type === "PDF") {
                    $pdf = PDF::loadView('Purchase.PurchaseOrder.Reports.ReportPurchaseOrderSummary_pdf', [
                        'dataPO' => $dataPurchaseOrderSummary,
                        'budgetName' => $budgetName,
                        'subBudgetName' => $subBudgetName,
                        'supplierName' => $supplierName,
                        'poDate' => $poDate
                    ])->setPaper('a4', 'landscape');

                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();
                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Purchase Order Summary.pdf');
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportReportPurchaseOrderSummary($dataPurchaseOrderSummary), 'Export Report Purchase Order Summary.xlsx');
                } else {
                    throw new \Exception('Failed to Export Purchase Order Summary Report');
                }
            } else {
                throw new \Exception('Purchase Order Summary Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report Purchase Order Summary Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }

    public function ReportPOtoAP(Request $request)
    {
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Purchase Order Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Purchase.PurchaseOrder.Reports.ReportPOtoAP', $compact);
    }

    public function ReportPOtoAPStore(Request $request)
    {
        try {
            $date = $request->poToApDate;
            $purchaseOrder = $request->purchaseOrder_id;
            $accountPayable = $request->accountPayable_id;
            $supplier = $request->supplier_id;
            $budget = [
                "id" => $request->budget_id,
                "code" => $request->budget_code,
            ];
            $subBudget = [
                "id" => $request->site_id,
                "code" => $request->site_code,
            ];

            $response = $this->purchaseOrderService->getPurchaseOrderToAccountPayable(
                $budget['code'],
                $subBudget['code'],
                $date,
                $supplier,
                $purchaseOrder,
                $accountPayable
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Purchase Order To Account Payable Report');
            }

            $compact = [
                'status' => $response['metadata']['HTTPStatusCode'],
                'data' => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Purchase Order To Account Payable Store Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportPOtoAP(Request $request)
    {
        try {
            $type = $request->printType;
            $dataPurchaseOrder = json_decode($request->dataReport, true);

            if ($dataPurchaseOrder) {
                if ($type === "PDF") {
                    $pdf = PDF::loadView('Purchase.PurchaseOrder.Reports.ReportPOtoAP_pdf', ['dataReport' => $dataPurchaseOrder])
                        ->setPaper('a4', 'landscape');

                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();
                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Purchase Order to Account Payable.pdf');
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportReportPOtoAP($dataPurchaseOrder), 'Export Report Purchase Order to Account Payable.xlsx');
                } else {
                    throw new \Exception('Failed to Export Report Purchase Order to Account Payable');
                }
            } else {
                throw new \Exception('Purchase Order to Account Payable Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report Purchase Order to Account Payable Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }

    public function ReportPoDetail(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportPurchaseOrderDetailSubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportPODetail', []) : [];

        $compact = [
            'varAPIWebToken' => [],
            'dataReport' => $dataReport
        ];

        return view('Purchase.PurchaseOrder.Reports.ReportPurchaseOrderDetail', $compact);
    }

    public function ReportPurchaseOrderDetailData($id)
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
                throw new \Exception('Data not found in the API response.');
            }

            // dd($filteredArray);

            $getData = $filteredArray['data'][0]['document'];

            // DATA HEADER
            $dataHeaders = [
                'budget' => $getData['content']['general']['budget']['combinedBudgetCodeList'][0],
                'budgetName' => $getData['content']['general']['budget']['combinedBudgetNameList'][0],
                'poNumber' => 'PO01-23000004',
                'date' => $getData['header']['date'],
                'paymentTerm' => 'Cash 100% sesuai qty yang di Galvanis',
                'revision' => 1,
                'file' => 'qdc-technologies.png',
                'vendor' => 'VDR2693- Lazuardi Rukun Perkasa',
                'deliver' => 'PT Qdc Technologies',
                'invoice' => 'Warehouse Kolaka',
                'currency' => 'IDR',
                'PIC' => $getData['content']['general']['involvedPersons'][0]['requesterWorkerName'],
                'remark' => $getData['content']['general']['remarks']
            ];

            // DATA DETAIL
            $dataDetails = [];
            $i = 0;
            $totalQty = 0;
            $totalIDRWithPPN = 0;
            $totalIDRWithoutPPN = 0;
            $totalOtherCurrencyWithPPN = 0;
            $totalOtherCurrencyWithoutPPN = 0;

            foreach ($getData['content']['details']['itemList'] as $dataReports) {
                $totalQty += $dataReports['entities']['quantity'];

                $quantity = $dataReports['entities']['quantity'];
                $price = $quantity * 1000;
                $totalWithoutPPN = $quantity * $price;
                $totalWithPPN = ($totalWithoutPPN * 0.11) + $totalWithoutPPN;

                $dataDetails[$i]['no'] = $i + 1;
                $dataDetails[$i]['prNumber'] = "PR01-83000004";
                $dataDetails[$i]['productId'] = $dataReports['entities']['product_RefID'];
                $dataDetails[$i]['productName'] = $dataReports['entities']['productName'];
                $dataDetails[$i]['qty'] = number_format($quantity, 2, ',', '.');
                $dataDetails[$i]['price'] = number_format($price, 2, ',', '.');
                $dataDetails[$i]['uom'] = 'Set';
                $dataDetails[$i]['totalIDRWithoutPPN'] = number_format($totalWithoutPPN, 2, ',', '.');
                $dataDetails[$i]['totalIDRWithPPN'] = number_format($totalWithPPN, 2, ',', '.');
                $dataDetails[$i]['totalOtherCurrencyWithPPN'] = number_format(0, 2, ',', '.');
                $dataDetails[$i]['totalOtherCurrencyWithoutPPN'] = number_format(0, 2, ',', '.');
                $dataDetails[$i]['currency'] = 'IDR';

                $totalIDRWithoutPPN += $totalWithoutPPN;
                $totalIDRWithPPN += $totalWithPPN;

                $i++;
            }

            $compact = [
                'dataHeader' => $dataHeaders,
                'dataDetail' => $dataDetails,
                'totalQty' => number_format($totalQty, 2, ',', '.'),
                'totalIDRWithPPN' => number_format($totalIDRWithPPN, 2, ',', '.'),
                'totalIDRWithoutPPN' => number_format($totalIDRWithoutPPN, 2, ',', '.'),
                'totalOtherCurrencyWithPPN' => number_format($totalOtherCurrencyWithPPN, 2, ',', '.'),
                'totalOtherCurrencyWithoutPPN' => number_format($totalOtherCurrencyWithoutPPN, 2, ',', '.'),
            ];

            Session::put("isButtonReportPurchaseOrderDetailSubmit", true);
            Session::put("dataReportPODetail", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("Error at ReportPurchaseOrderDetailData: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportPurchaseOrderDetailStore(Request $request)
    {
        try {
            $budgetID = $request->budget_id;
            $subBudgetID = $request->sub_budget_id;
            $supplierID = $request->advance_RefID;

            if (!$budgetID && !$subBudgetID && !$supplierID) {
                $message = 'Budget, Sub Budget & Supplier Code Cannot Empty';
            } else if ($budgetID && !$subBudgetID && !$supplierID) {
                $message = 'Sub Budget & Supplier Code Cannot Empty';
            } else if ($budgetID && $subBudgetID && !$supplierID) {
                $message = 'Supplier Code Cannot Empty';
            } else if (!$budgetID && !$subBudgetID && $supplierID) {
                $message = 'Budget & Sub Budget Cannot Empty';
            } else if ($budgetID && !$subBudgetID && $supplierID) {
                $message = 'Sub Budget Cannot Empty';
            }

            if (isset($message)) {
                Session::forget("isButtonReportPurchaseOrderDetailSubmit");
                Session::forget("dataReportPODetail");

                return redirect()->route('PurchaseOrder.ReportPurchaseOrderDetail')->with('NotFound', $message);
            }

            $compact = $this->ReportPurchaseOrderDetailData($supplierID);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('PurchaseOrder.ReportPurchaseOrderDetail');
        } catch (\Throwable $th) {
            Log::error("Error at ReportPurchaseOrderDetailStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportPurchaseOrderDetail(Request $request)
    {
        try {
            $dataReport = Session::get("dataReportPODetail");

            if ($dataReport) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Purchase.PurchaseOrder.Reports.ReportPurchaseOrderDetail_pdf', ['dataReport' => $dataReport]);
                    $pdf->output();

                    // Menambahkan script untuk header dan footer
                    $pdf->getDomPDF()->getOptions()->setChroot(public_path());
                    $pdf->getDomPDF()->set_option("isPhpEnabled", true);

                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();

                    $canvas->page_text($width / 2 + 20, 52, "{PAGE_NUM} of {PAGE_COUNT}", null, 8, array(0, 0, 0));
                    // $canvas->page_text($width / 2.5, $height - 20, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    // Preview PDF
                    // return $pdf->stream('Export_Report_Delivery_Order_Request_Detail.pdf');

                    return $pdf->download('Export Report Purchase Order Detail.pdf');
                } else {
                    return Excel::download(new ExportReportPurchaseOrderDetail, 'Export Report Purchase Order Detail.xlsx');
                }
            } else {
                return redirect()->route('PurchaseOrder.ReportPurchaseOrderDetail')->with('NotFound', 'Budget, Sub Budget, & Supplier Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportPurchaseOrderDetail: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportPOtoDO(Request $request)
    {
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Purchase Order Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Purchase.PurchaseOrder.Reports.ReportPOtoDO', $compact);
    }

    public function ReportPOtoDOStore(Request $request)
    {
        try {
            $date = $request->poToDoDate;
            $budget = $request->budget_code;
            $subBudget = $request->site_code;

            $response = $this->purchaseOrderService->getPurchaseOrderToDeliveryOrder(
                $budget,
                $subBudget,
                $date,
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Purchase Order To Delivery Order Report');
            }

            $compact = [
                'status' => $response['metadata']['HTTPStatusCode'],
                'data' => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Purchase Order To Delivery Order Store Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportPOtoDO(Request $request)
    {
        try {
            $type = $request->printType;
            $dataPurchaseOrder = json_decode($request->dataReport, true);

            if ($dataPurchaseOrder) {
                if ($type === "PDF") {
                    $pdf = PDF::loadView('Purchase.PurchaseOrder.Reports.ReportPOtoDO_pdf', ['dataReport' => $dataPurchaseOrder])
                        ->setPaper('a4', 'landscape');

                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();
                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Purchase Order to Account Payable.pdf');
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportReportPOtoDO($dataPurchaseOrder), 'Export Report PO to DO.xlsx');
                } else {
                    throw new \Exception('Failed to Export Report Purchase Order to Delivery Order');
                }
            } else {
                throw new \Exception('Purchase Order to Delivery Order Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report Purchase Order to Delivery Order Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }

    public function ReportCFS(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportCFSSubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportCFS', []) : [];

        $var = 1;
        if (!empty($_GET['var'])) {
            $var = $_GET['var'];
        }

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
            'dataReport' => $dataReport
        ];

        return view('Purchase.PurchaseOrder.Reports.ReportCFS', $compact);
    }

    public function ReportCFSData($budgetID, $budgetCode, $budgetName)
    {
        try {
            $dataHeaders = [
                'budgetName' => $budgetName . ' - ' . $budgetCode,
            ];

            $dataDetails = [
                [
                    'title' => '100 OVERHEADS',
                    'totalText' => 'Total',
                    'total' => '50000',
                    'data' => [
                        [
                            'site' => '101',
                            'name' => 'Capital Expenditure',
                            'originCO' => '11,056,882,563.86',
                            'variationsCO' => '1,380,000,000.00',
                            'revisedCO' => '12,436,882,563.86',
                            'completeProgress' => '78.00',
                            'amountProgress' => '9,700,768,399.81',
                            'invoicedBilling' => '12,359,583,916.52',
                            'receivedBilling' => '10,982,956,712.68',
                            'productIdBudget' => '1',
                            'qtyBudget' => '0',
                            'costBudget' => '8,218,004,381.57',
                            'uomBudget' => 'IDR',
                            'originBudget' => '9,515,561,362.72',
                            'variationsBudget' => '0',
                            'revisedBudget' => '0',
                            'committedCost' => '8,218,004,381.57',
                            'previousCost' => '7,493,536,249.29',
                            'movementCost' => '320,812,329.00',
                            'currentCost' => '0',
                            'paidCost' => '0',
                            'finalForecast' => '9,515,561,362.72',
                            'currentMargin' => '1,886,419,821.52',
                            'finalMargin' => '2,921,321,201.14',
                            'final%Margin' => '23.49%'
                        ],
                    ]
                ],
                [
                    'title' => '200 MATERIALS',
                    'totalText' => 'Total',
                    'total' => '150000',
                    'data' => [
                        [
                            'site' => '201',
                            'name' => 'Material Office Building',
                            'originCO' => '2,285,978,029.66',
                            'variationsCO' => '0',
                            'revisedCO' => '2,285,978,029.66',
                            'completeProgress' => '100.00',
                            'amountProgress' => '2,285,978,029.66',
                            'invoicedBilling' => '2,853,964,221.66',
                            'receivedBilling' => '2,879,909,350.95',
                            'productIdBudget' => '2',
                            'qtyBudget' => '0',
                            'costBudget' => '2,853,713,721.20',
                            'uomBudget' => 'IDR',
                            'originBudget' => '2,285,978,029.66',
                            'variationsBudget' => '0',
                            'revisedBudget' => '0',
                            'committedCost' => '2,853,713,721.20',
                            'previousCost' => '2,733,782,327.39',
                            'movementCost' => '0',
                            'currentCost' => '0',
                            'paidCost' => '0',
                            'finalForecast' => '2,895,173,756.65',
                            'currentMargin' => '609,195,726.99',
                            'finalMargin' => '609,195,726.99',
                            'final%Margin' => '26.65%'
                        ],
                    ]
                ],
            ];

            $compact = [
                'dataHeader' => $dataHeaders,
                'dataDetail' => $dataDetails,
            ];

            return $compact;
        } catch (\Throwable $th) {
            Log::error("Error at ReportCFSData: " . $th->getMessage());
            Session::forget("isButtonReportCFSSubmit");
            Session::forget("dataReportCFS");
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportCFSStore(Request $request)
    {
        try {
            $budgetID = $request->budget_id;
            $budgetName = $request->budget_name;
            $budgetCode = $request->budget;
            $subBudgetID = $request->sub_budget_id;

            if (!$budgetID && !$subBudgetID) {
                $message = 'Budget & Sub Budget Cannot Empty';
            } else if ($budgetID && !$subBudgetID) {
                $message = 'Sub Budget Cannot Empty';
            }

            if (isset($message)) {
                Session::forget("isButtonReportCFSSubmit");
                Session::forget("dataReportCFS");
                return redirect()->route('PurchaseOrder.ReportCFS')->with('NotFound', $message);
            }

            $compact = $this->ReportCFSData($budgetID, $budgetName, $budgetCode);

            if ($compact === null || empty($compact)) {
                Session::forget("isButtonReportCFSSubmit");
                Session::forget("dataReportCFS");
                return redirect()->back()->with('NotFound', 'Data Not Found');
            } else {
                Session::put("isButtonReportCFSSubmit", true);
                Session::put("dataReportCFS", $compact);
            }

            return redirect()->route('PurchaseOrder.ReportCFS');
        } catch (\Throwable $th) {
            Log::error("Error at ReportPurchaseOrderDetailStore: " . $th->getMessage());
            Session::forget("isButtonReportCFSSubmit");
            Session::forget("dataReportCFS");
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportCFS(Request $request)
    {
        try {
            $dataReport = Session::get("dataReportCFS");

            if ($dataReport) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Purchase.PurchaseOrder.Reports.ReportCFS_pdf', ['dataReport' => $dataReport]);
                    $pdf->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    // Preview PDF
                    // return $pdf->stream('Export_Report_Delivery_Order_Request_Detail.pdf');

                    return $pdf->download('Export Report CFS.pdf');
                } else {
                    return Excel::download(new ExportReportCFS, 'Export Report CFS.xlsx');
                }
            } else {
                Session::forget("isButtonReportCFSSubmit");
                Session::forget("dataReportCFS");
                return redirect()->route('PurchaseOrder.ReportCFS')->with('NotFound', 'Budget & Sub Budget Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportCFS: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}