<?php
namespace App\Http\Controllers\Purchase;

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

            $filteredArray = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceReport',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $id,
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

            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Data not found in the API response.');
            }

            $getData = $filteredArray['data'][0]['document'];

            // DATA HEADER
            $dataHeaders = [
                'budget'        => $getData['content']['general']['budget']['combinedBudgetCodeList'][0] . ' - ' . $getData['content']['general']['budget']['combinedBudgetNameList'][0],
            ];

            // DATA DETAIL
            $dataDetails = [];
            $i = 0;
            $totalQty = 0;
            $totalPrice = 0;
            $totalIDRWithPPN = 0;
            $totalIDRWithoutPPN = 0;
            $totalOtherCurrencyWithPPN = 0;
            $totalOtherCurrencyWithoutPPN = 0;
            foreach ($getData['content']['details']['itemList'] as $dataReports) {
                $totalQty += $dataReports['entities']['quantity'] * rand(1000, 9000);
                $totalPrice += $dataReports['entities']['quantity'] * rand(1000, 9000);
                $totalIDRWithPPN += $dataReports['entities']['quantity'] * rand(1000, 9000);
                $totalIDRWithoutPPN += $dataReports['entities']['quantity'] * rand(1000, 9000);
                $totalOtherCurrencyWithPPN += $dataReports['entities']['quantity'] * rand(1000, 9000);
                $totalOtherCurrencyWithoutPPN += $dataReports['entities']['quantity'] * rand(1000, 9000);
            
                $dataDetails[$i]['no']                              = $i + 1;
                $dataDetails[$i]['transactionNumber']               = $dataReports['entities']['product_RefID'];
                $dataDetails[$i]['qty']                             = number_format($dataReports['entities']['quantity'] * rand(1, 100), 2, ',', '.');
                $dataDetails[$i]['price']                           = number_format($dataReports['entities']['quantity'] * rand(100, 1000), 2, ',', '.');
                $dataDetails[$i]['uom']                             = 'Set';
                $dataDetails[$i]['totalIDRWithPPN']                 = number_format($dataReports['entities']['quantity'] * rand(1000, 6000), 2, ',', '.');
                $dataDetails[$i]['totalIDRWithoutPPN']              = number_format($dataReports['entities']['quantity'] * rand(1000, 7000), 2, ',', '.');
                $dataDetails[$i]['totalOtherCurrencyWithPPN']       = number_format($dataReports['entities']['quantity'] * rand(1000, 8000), 2, ',', '.');
                $dataDetails[$i]['totalOtherCurrencyWithoutPPN']    = number_format($dataReports['entities']['quantity'] * rand(1000, 9000), 2, ',', '.');
                $dataDetails[$i]['currency']                        = 'IDR';
                $i++;
            }

            $compact = [
                'dataHeader'                    => $dataHeaders,
                'dataDetail'                    => $dataDetails,
                'totalQty'                      => number_format($totalQty, 2, ',', '.'),
                'totalPrice'                    => number_format($totalPrice, 2, ',', '.'),
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
                    $canvas->page_text($width - 85, 94, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text($width / 2.5, $height - 20, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

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

            $filteredArray = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceReport',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $id,
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
                'invoice'       => 'PT Qdc Technologies',
                'currency'      => 'IDR',
                'PIC'           => 'admin.procurement',
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

                    $canvas->page_text($width / 2 + 12, 47, "{PAGE_NUM} of {PAGE_COUNT}", null, 8, array(0, 0, 0));
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
    
    public function StoreValidatePurchaseOrderPrNumber(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $tamp = 0;
        $status = 200;
        $varDataPurchaseRequisitionList['data'] = [];
        $var_RefID = $request->input('var_RefID');


        $varDataPurchaseRequisitionList = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
                $varDataPurchaseRequisitionList = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
            $varDataPurchaseRequisitionList = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
        $varDataPurchaseRequisition = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
        $varDataPurchaseRequisitionList = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseRequisition");

        $varDataPurchaseOrderRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.supplyChain.getPurchaseRequisition',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $request->searchPONumberRevisionId
                ]
            ]
        );
        // dd($varDataProcReqRevision);
        
        $compact = [
            'dataPurchaseOrderRevision' => $varDataPurchaseOrderRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'dataPurchaOrdernumber' => $varDataPurchaseOrderRevision['data'][0]['document']['header']['number'],
            'var_recordID' => $request->searchPONumberRevisionId,
        ];

        return view('Purchase.Purchase.Transactions.RevisionPurchaseOrder', $compact);
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
        //
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

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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