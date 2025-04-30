<?php
namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\ExportExcel\Purchase\ExportReportCFS;
use App\Http\Controllers\ExportExcel\Purchase\ExportReportPurchaseOrderSummary;
use App\Http\Controllers\ExportExcel\Purchase\ExportReportPurchaseOrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseOrderPrNumber");
        $request->session()->forget("SessionPurchaseOrder");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
        ];

        return view('Purchase.PurchaseOrder.Transactions.CreatePurchaseOrder', $compact);
    }

    public function ReportPoSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportPurchaseOrderSummarySubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportPurchaseOrderSummary', []) : [];

        $compact = [
            'varAPIWebToken'    => [],
            'dataReport'        => $dataReport
        ];

        return view('Purchase.PurchaseOrder.Reports.ReportPurchaseOrderSummary', $compact);
    }

    public function ReportPurchaseOrderSummaryData($id) 
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
                'budget'        => $getData['content']['general']['budget']['combinedBudgetCodeList'][0],
                "budgetName"    => $getData['content']['general']['budget']['combinedBudgetNameList'][0]
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

                $dataDetails[$i]['no']                              = $i + 1;
                $dataDetails[$i]['prNumber']                        = "PR01-83000004";
                $dataDetails[$i]['productId']                       = $dataReports['entities']['product_RefID'];
                $dataDetails[$i]['productName']                     = $dataReports['entities']['productName'];
                $dataDetails[$i]['qty']                             = number_format($quantity, 2, ',', '.');
                $dataDetails[$i]['price']                           = number_format($price, 2, ',', '.');
                $dataDetails[$i]['uom']                             = 'Set';
                $dataDetails[$i]['totalIDRWithoutPPN']              = number_format($totalWithoutPPN, 2, ',', '.');
                $dataDetails[$i]['totalIDRWithPPN']                 = number_format($totalWithPPN, 2, ',', '.');
                $dataDetails[$i]['totalOtherCurrencyWithPPN']       = number_format(0, 2, ',', '.');
                $dataDetails[$i]['totalOtherCurrencyWithoutPPN']    = number_format(0, 2, ',', '.');
                $dataDetails[$i]['currency']                        = 'IDR';

                $totalIDRWithoutPPN += $totalWithoutPPN;
                $totalIDRWithPPN += $totalWithPPN;

                $i++;
            }

            $compact = [
                'dataHeader'                    => $dataHeaders,
                'dataDetail'                    => $dataDetails,
                'totalQty'                      => number_format($totalQty, 2, ',', '.'),
                'totalIDRWithPPN'               => number_format($totalIDRWithPPN, 2, ',', '.'),
                'totalIDRWithoutPPN'            => number_format($totalIDRWithoutPPN, 2, ',', '.'),
                'totalOtherCurrencyWithPPN'     => number_format($totalOtherCurrencyWithPPN, 2, ',', '.'),
                'totalOtherCurrencyWithoutPPN'  => number_format($totalOtherCurrencyWithoutPPN, 2, ',', '.'),
            ];

            Session::put("isButtonReportPurchaseOrderSummarySubmit", true);
            Session::put("dataReportPurchaseOrderSummary", $compact);

            return $compact;
        } catch (\Throwable $th) {
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportPurchaseOrderSummaryStore(Request $request) {
        try {
            $budgetID       = $request->budget_id;
            $subBudgetID    = $request->sub_budget_id;
            $supplierID     = $request->advance_RefID;
            
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
                Session::forget("isButtonReportPurchaseOrderSummarySubmit");
                Session::forget("dataReportPurchaseOrderSummary");

                return redirect()->route('PurchaseOrder.ReportPurchaseOrderSummary')->with('NotFound', $message);
            }

            $compact = $this->ReportPurchaseOrderSummaryData($supplierID);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('PurchaseOrder.ReportPurchaseOrderSummary');
        } catch (\Throwable $th) {
            Log::error("Error at ReportPurchaseOrderSummaryStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportPurchaseOrderSummary(Request $request) {
        try {
            $dataReport = Session::get("dataReportPurchaseOrderSummary");

            if ($dataReport) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Purchase.PurchaseOrder.Reports.ReportPurchaseOrderSummary_pdf', ['dataReport' => $dataReport]);
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    // Preview PDF
                    // return $pdf->stream('Export_Report_Delivery_Order_Request_Detail.pdf');
    
                    return $pdf->download('Export Report Purchase Order Summary.pdf');
                } else {
                    return Excel::download(new ExportReportPurchaseOrderSummary, 'Export Report Purchase Order Summary.xlsx');
                }
            } else {
                return redirect()->route('PurchaseOrder.ReportPurchaseOrderSummary')->with('NotFound', 'Budget, Sub Budget, & Supplier Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportPurchaseOrderSummary: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportPoDetail(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportPurchaseOrderDetailSubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportPODetail', []) : [];

        $compact = [
            'varAPIWebToken'    => [],
            'dataReport'        => $dataReport
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
                'budget'        => $getData['content']['general']['budget']['combinedBudgetCodeList'][0],
                'budgetName'    => $getData['content']['general']['budget']['combinedBudgetNameList'][0],
                'poNumber'      => 'PO01-23000004',
                'date'          => $getData['header']['date'],
                'paymentTerm'   => 'Cash 100% sesuai qty yang di Galvanis',
                'revision'      => 1,
                'file'          => 'qdc-technologies.png',
                'vendor'        => 'VDR2693- Lazuardi Rukun Perkasa',
                'deliver'       => 'PT Qdc Technologies',
                'invoice'       => 'Warehouse Kolaka',
                'currency'      => 'IDR',
                'PIC'           => $getData['content']['general']['involvedPersons'][0]['requesterWorkerName'],
                'remark'        => $getData['content']['general']['remarks']
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

                $dataDetails[$i]['no']                              = $i + 1;
                $dataDetails[$i]['prNumber']                        = "PR01-83000004";
                $dataDetails[$i]['productId']                       = $dataReports['entities']['product_RefID'];
                $dataDetails[$i]['productName']                     = $dataReports['entities']['productName'];
                $dataDetails[$i]['qty']                             = number_format($quantity, 2, ',', '.');
                $dataDetails[$i]['price']                           = number_format($price, 2, ',', '.');
                $dataDetails[$i]['uom']                             = 'Set';
                $dataDetails[$i]['totalIDRWithoutPPN']              = number_format($totalWithoutPPN, 2, ',', '.');
                $dataDetails[$i]['totalIDRWithPPN']                 = number_format($totalWithPPN, 2, ',', '.');
                $dataDetails[$i]['totalOtherCurrencyWithPPN']       = number_format(0, 2, ',', '.');
                $dataDetails[$i]['totalOtherCurrencyWithoutPPN']    = number_format(0, 2, ',', '.');
                $dataDetails[$i]['currency']                        = 'IDR';

                $totalIDRWithoutPPN += $totalWithoutPPN;
                $totalIDRWithPPN += $totalWithPPN;

                $i++;
            }

            $compact = [
                'dataHeader'                    => $dataHeaders,
                'dataDetail'                    => $dataDetails,
                'totalQty'                      => number_format($totalQty, 2, ',', '.'),
                'totalIDRWithPPN'               => number_format($totalIDRWithPPN, 2, ',', '.'),
                'totalIDRWithoutPPN'            => number_format($totalIDRWithoutPPN, 2, ',', '.'),
                'totalOtherCurrencyWithPPN'     => number_format($totalOtherCurrencyWithPPN, 2, ',', '.'),
                'totalOtherCurrencyWithoutPPN'  => number_format($totalOtherCurrencyWithoutPPN, 2, ',', '.'),
            ];

            Session::put("isButtonReportPurchaseOrderDetailSubmit", true);
            Session::put("dataReportPODetail", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("Error at ReportPurchaseOrderDetailData: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportPurchaseOrderDetailStore(Request $request) {
        try {
            $budgetID       = $request->budget_id;
            $subBudgetID    = $request->sub_budget_id;
            $supplierID     = $request->advance_RefID;
            
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

    public function PrintExportReportPurchaseOrderDetail(Request $request) {
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

    public function ReportCFS(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportCFSSubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportCFS', []) : [];

        $var = 1;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'varAPIWebToken'    => $varAPIWebToken,
            'var'               => $var,
            'statusRevisi'      => 1,
            'dataReport'        => $dataReport
        ];

        return view('Purchase.PurchaseOrder.Reports.ReportCFS', $compact);
    }

    public function ReportCFSData($budgetID, $budgetCode, $budgetName) 
    {
        try {
            $dataHeaders = [
                'budgetName'    => $budgetName . ' - ' . $budgetCode,
            ];

            $dataDetails = [
                [
                    'title'     => '100 OVERHEADS',
                    'totalText' => 'Total',
                    'total'     => '50000',
                    'data'      => [
                        [
                            'site'              => '101',
                            'name'              => 'Capital Expenditure',
                            'originCO'          => '11,056,882,563.86',
                            'variationsCO'      => '1,380,000,000.00',
                            'revisedCO'         => '12,436,882,563.86',
                            'completeProgress'  => '78.00',
                            'amountProgress'    => '9,700,768,399.81',
                            'invoicedBilling'   => '12,359,583,916.52',
                            'receivedBilling'   => '10,982,956,712.68',
                            'productIdBudget'   => '1',
                            'qtyBudget'         => '0',
                            'costBudget'        => '8,218,004,381.57',
                            'uomBudget'         => 'IDR',
                            'originBudget'      => '9,515,561,362.72',
                            'variationsBudget'  => '0',
                            'revisedBudget'     => '0',
                            'committedCost'     => '8,218,004,381.57',
                            'previousCost'      => '7,493,536,249.29',
                            'movementCost'      => '320,812,329.00',
                            'currentCost'       => '0',
                            'paidCost'          => '0',
                            'finalForecast'     => '9,515,561,362.72',
                            'currentMargin'     => '1,886,419,821.52',
                            'finalMargin'       => '2,921,321,201.14',
                            'final%Margin'      => '23.49%'
                        ],
                    ]
                ],
                [
                    'title' => '200 MATERIALS',
                    'totalText' => 'Total',
                    'total'     => '150000',
                    'data' => [
                        [
                            'site'              => '201',
                            'name'              => 'Material Office Building',
                            'originCO'          => '2,285,978,029.66',
                            'variationsCO'      => '0',
                            'revisedCO'         => '2,285,978,029.66',
                            'completeProgress'  => '100.00',
                            'amountProgress'    => '2,285,978,029.66',
                            'invoicedBilling'   => '2,853,964,221.66',
                            'receivedBilling'   => '2,879,909,350.95',
                            'productIdBudget'   => '2',
                            'qtyBudget'         => '0',
                            'costBudget'        => '2,853,713,721.20',
                            'uomBudget'         => 'IDR',
                            'originBudget'      => '2,285,978,029.66',
                            'variationsBudget'  => '0',
                            'revisedBudget'     => '0',
                            'committedCost'     => '2,853,713,721.20',
                            'previousCost'      => '2,733,782,327.39',
                            'movementCost'      => '0',
                            'currentCost'       => '0',
                            'paidCost'          => '0',
                            'finalForecast'     => '2,895,173,756.65',
                            'currentMargin'     => '609,195,726.99',
                            'finalMargin'       => '609,195,726.99',
                            'final%Margin'      => '26.65%'
                        ],
                    ]
                ],
            ];

            $compact = [
                'dataHeader'    => $dataHeaders,
                'dataDetail'    => $dataDetails,
            ];

            return $compact;
        } catch (\Throwable $th) {
            Log::error("Error at ReportCFSData: " . $th->getMessage());
            Session::forget("isButtonReportCFSSubmit");
            Session::forget("dataReportCFS");
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportCFSStore(Request $request) {
        try {
            $budgetID       = $request->budget_id;
            $budgetName     = $request->budget_name;
            $budgetCode     = $request->budget;
            $subBudgetID    = $request->sub_budget_id;

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

    public function PrintExportReportCFS(Request $request) {
        try {
            $dataReport = Session::get("dataReportCFS");

            if ($dataReport) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Purchase.PurchaseOrder.Reports.ReportCFS_pdf', ['dataReport' => $dataReport]);
                    $pdf->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
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
    
    public function StoreValidatePurchaseOrderPrNumber(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $tamp = 0;
        $status = 200;
        $varDataPurchaseRequisitionList['data'] = [];
        $var_RefID = $request->input('var_RefID');


        $varDataPurchaseRequisitionList = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
            'latest',
            [
                'parameter' => [
                    'purchaseRequisition_RefID' => (int) $var_RefID
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        // dd($varDataPurchaseRequisitionList);

        $data = $request->session()->get("SessionPurchaseOrderPrNumber");
        if ($request->session()->has("SessionPurchaseOrderPrNumber")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $var_RefID) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                $varDataPurchaseRequisitionList = Helper_APICall::setCallAPIGateway(
                    Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
                    'latest',
                    [
                        'parameter' => [
                            'purchaseRequisition_RefID' => (int) $var_RefID
                        ],
                        'SQLStatement' => [
                            'pick' => null,
                            'sort' => null,
                            'filter' => null,
                            'paging' => null
                        ]
                    ]
                );
                $request->session()->push("SessionPurchaseOrderPrNumber", $var_RefID);
            } else {
                $status = 501;
            }
        } else {
            $varDataPurchaseRequisitionList = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
                'latest',
                [
                    'parameter' => [
                        'purchaseRequisition_RefID' => (int) $var_RefID
                    ],
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ]
            );

            $request->session()->push("SessionPurchaseOrderPrNumber", $var_RefID);
        }

        $compact = [
            'status' => $status,
            'DataPurchaseRequisitionList' => $varDataPurchaseRequisitionList['data'],
        ];

        return response()->json($compact);
    }

    public function StoreValidatePurchaseOrder(Request $request)
    {
        $tamp = 0; $status = 200;
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionPurchaseOrder");
        if($request->session()->has("SessionPurchaseOrder")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val && $data[$i+1] == $val2){
                    $tamp = 1;
                }
            }
            if($tamp == 0){
                $request->session()->push("SessionPurchaseOrder", $val);
                $request->session()->push("SessionPurchaseOrder", $val2);
            }
            else{
                $status = 500;
            }
        }
        else{
            $request->session()->push("SessionPurchaseOrder", $val);
            $request->session()->push("SessionPurchaseOrder", $val2);
        }

        return response()->json($status);

    }

    public function StoreValidatePurchaseOrder2(Request $request)
    {
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionPurchaseOrder");
        if($request->session()->has("SessionPurchaseOrder")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val && $data[$i+1] == $val2){
                    unset($data[$i]);
                    unset($data[$i+1]);
                    $newClass = array_values($data);
                    $request->session()->put("SessionPurchaseOrder", $newClass);
                }
            }
        }
    }

    public function PurchaseOrderListData(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataPurchaseRequisition = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseRequisition',
            'latest',
            [
                'parameter' => null,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        $compact = [
            'data' => $varDataPurchaseRequisition['data'],
        ];
            
        return response()->json($compact);
    }

    public function PurchaseOrderByPrID(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var_recordID = $request->input('var_recordID');
        $varDataPurchaseRequisitionList = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
            'latest',
            [
                'parameter' => [
                    'purchaseRequisition_RefID' => (int) $var_recordID
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        // dd($varDataPurchaseRequisitionList);
        $compact = [
            'DataPurchaseList' => $varDataPurchaseRequisitionList['data'],
        ];
        return response()->json($compact);
    }

    public function RevisionPurchaseOrderIndex(Request $request)
    {
        $varAPIWebToken     = $request->session()->get('SessionLogin');
        $purchaseOrderID    = $request->purchaseOrder_RefID;
        // $request->session()->forget("SessionPurchaseRequisition");

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseOrderDetail',
            'latest',
            [
            'parameter' => [
                'purchaseOrder_RefID' => (int) $purchaseOrderID
                ],
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,
                'paging' => null
                ]
            ]
        );
        
        if ($varData['metadata']['HTTPStatusCode'] !== 200) {
            return response()->json($varData);
        }
        
        $data = $varData['data']['data'];
        
        $compact = [
            'varAPIWebToken'        => $varAPIWebToken,
            'header'                => [
                'poNumberID'        => $data[0]['PurchaseOrder_RefID'],
                'poNumber'          => $data[0]['DocumentNumber'],
                'deliveryTo'        => $data[0]['DeliveryDestinationManualAddress'],
                'deliveryToID'      => '',
                'supplierID'        => '',
                'supplierName'      => '',
                'supplierCode'      => '',
                'supplierAddress'   => '',
                'downPayment'       => '',
                'termOfPaymentID'   => '',
                'paymentNotes'      => '',
                'remarkPO'          => '',
                'internalNote'      => '',
                'fileID'            => '',
                'vatValue'          => '',
            ],
            'detail'                => $data
        ];

        return view('Purchase.PurchaseOrder.Transactions.RevisionPurchaseOrder', $compact);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
            $purchaseOrderData = $request->all();
            $purchaseOrderDetail = json_decode($purchaseOrderData['storeData']['purchaseOrderDetail'], true);
            $fileID = $purchaseOrderData['storeData']['dataInput_Log_FileUpload_1'] ? (int) $purchaseOrderData['storeData']['dataInput_Log_FileUpload_1'] : null;

            $transformedDetails = [];
            foreach ($purchaseOrderDetail as $entity) {
                $transformedDetails[] = [
                    "entities" => [
                        "purchaseRequisitionDetail_RefID"               => (int) $entity['purchaseRequisitionDetail_RefID'],
                        "quantity"                                      => (float) str_replace(',', '', $entity['quantity']),
                        "quantityUnit_RefID"                            => (int) $entity['quantityUnit_RefID'],
                        "productUnitPriceCurrency_RefID"                => (int) $entity['productUnitPriceCurrency_RefID'],
                        "productUnitPriceCurrencyValue"                 => (int) $entity['productUnitPriceCurrencyValue'],
                        "productUnitPriceCurrencyExchangeRate"          => (int) $entity['productUnitPriceCurrencyExchangeRate'],
                        "productUnitPriceDiscountCurrency_RefID"        => (int) $entity['productUnitPriceDiscountCurrency_RefID'],
                        "productUnitPriceDiscountCurrencyValue"         => (int) $entity['productUnitPriceDiscountCurrencyValue'],
                        "productUnitPriceDiscountCurrencyExchangeRate"  => (int) $entity['productUnitPriceDiscountCurrencyExchangeRate'],
                        "remarks"                                       => $entity['remarks'],
                    ]
                ];
            }

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.create.supplyChain.setPurchaseOrder',
                'latest',
                [
                'entities' => [
                    "documentDateTimeTZ"                    => date('Y-m-d'),
                    "log_FileUpload_Pointer_RefID"          => (int) $fileID,
                    "requesterWorkerJobsPosition_RefID"     => (int) $SessionWorkerCareerInternal_RefID,
                    "supplier_RefID"                        => (int) $purchaseOrderData['storeData']['supplier_id'],
                    "deliveryDateTimeTZ"                    => date('Y-m-d'),
                    "deliveryDestination_RefID"             => null,
                    "deliveryDestinationManualAddress"      => $purchaseOrderData['storeData']['delivery_to'],
                    "supplierInvoiceBillingPurpose_RefID"   => null,
                    "remarks"                               => $purchaseOrderData['storeData']['remarkPO'],
                    "paymentNotes"                          => $purchaseOrderData['storeData']['paymentNotes'],
                    "internalNotes"                         => $purchaseOrderData['storeData']['internalNote'],
                    "downPayment"                           => (float) str_replace(',', '', $purchaseOrderData['storeData']['downPaymentValue']),
                    "termOfPayment_RefID"                   => (int) $purchaseOrderData['storeData']['termOfPaymentValue'],
                    "additionalData"                        => [
                        "itemList"  => [
                            "items" => $transformedDetails
                            ],
                        "transactionTaxItemList" => [
                            "items" => [
                                    [
                                    "entities" => [
                                        "taxType_RefID"                 => 182000000000001,
                                        "tariffCurrency_RefID"          => 62000000000001,
                                        "tariffCurrencyValue"           => (float) str_replace(',', '', $purchaseOrderData['storeData']['tariffCurrencyValue']),
                                        "tariffCurrencyExchangeRate"    => 1,
                                        "remarks"                       => 'Catatan 1'
                                        ]
                                    ],
                                ]
                            ],
                        "additionalCostItemList" => [
                            "items" => [
                                    [
                                    "entities" => [
                                        "transactionAdditionalCostType_RefID"   => 190000000000002,
                                        "priceCurrency_RefID"                   => 62000000000001,
                                        "priceCurrencyValue"                    => 30000,
                                        "priceCurrencyExchangeRate"             => 1,
                                        "remarks"                               => 'Catatan Additional Cost New'
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            );

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($varData);
            }

            return $this->SubmitWorkflow(
                $varData['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
                $request->nextApprover,
                $varData['data']['businessDocument']['documentNumber']
            );
        } catch (\Throwable $th) {
            Log::error("Error at store: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function revisionAsfIndex(Request $request)
    {   
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );
        
        return view('Advance.Advance.Transactions.revisionASF', ['data' => $varData['data']['data']]);
    }


    public function addListCartPO(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $dataAll = array();

        foreach ($data as $i => $v) {

            array_push($dataAll, array(
                'trano' => $v['trano'],
                'productId' => $v['productId'],
                'productName' => $v['productName'],
                'uom' => $v['uom'],
                'qty' => $v['qty'],
                'unit_Price' => $v['unit_Price'],
                'ppn_value' => $v['ppn_value'],
                'total' => $v['total']
            ));
        }
        return response()->json($dataAll);
    }

    public function submitData(Request $request)
    {
        $input = $request->all();
        dd($input);die;
        $count_product = count($input['var_product_id']);

        $input_header = array(
            'var_budget_code'	=> $input['var_budget_code'],
            'var_budget_code2'	=> $input['var_budget_code2'],
            'var_sub_budget_code'	=> $input['var_sub_budget_code'],
            'var_sub_budget_code2'	=> $input['var_sub_budget_code2'],
            'var_request_name'	=> $input['var_request_name'],
            'var_beneficiary'	=> $input['var_beneficiary'],
            'var_internal_notes'	=> $input['var_internal_notes'],
            'var_bank_name'	=> $input['var_bank_name'],
            'var_account_name'	=> $input['var_account_name'],
            'var_account_number'	=> $input['var_account_number']
        );

        print_r($input_header);

        $input_product = array(); 
        if ($count_product > 0 && isset($count_product)) {
            for ($n = 0; $n < $count_product; $n++) {
                $input_product['var_product_id'] = $input['var_product_id'][$n];
                $input_product['var_product_name'] = $input['var_product_name'][$n];
                $input_product['var_quantity'] = $input['var_quantity'][$n];
                $input_product['var_uom'] = $input['var_uom'][$n];
                $input_product['var_price'] = $input['var_price'][$n];
                $input_product['var_totalPrice'] = $input['var_totalPrice'][$n];
                $input_product['var_currency'] = $input['var_currency'][$n];
                $input_product['var_remark'] = $input['var_remark'][$n];
                
                print_r($input_product);
            }
        }
    }
}