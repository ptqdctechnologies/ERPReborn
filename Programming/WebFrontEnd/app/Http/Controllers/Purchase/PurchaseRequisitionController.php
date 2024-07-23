<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\ExportExcel\Purchase\ExportReportPurchaseRequisitionDetail;
use App\Http\Controllers\ExportExcel\Purchase\ExportReportPurchaseRequisitionSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class PurchaseRequisitionController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseRequisition");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
        ];
        return view('Purchase.PurchaseRequisition.Transactions.CreatePurchaseRequisition', $compact);
    }

    // REPORT SUMMARY
    public function Reports(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportPurchaseRequisitionSummarySubmit');

        $dataDetail = $isSubmitButton ? $request->session()->get('dataDetailReportPurchaseRequisitionSummary', []) : [];

        $compact = [
            'varAPIWebToken'    => $varAPIWebToken,
            'dataDetail'        => $dataDetail
        ];

        return view('Purchase.PurchaseRequisition.Reports.ReportPurchaseRequisitionSummary', $compact);
    }

    public function ReportPurchaseRequisitionSummaryData($id) 
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

            if (!isset($filteredArray['data'][0]['document']['header'])) {
                throw new \Exception('Data not found in the API response.');
            }

            $getHeaderData = $filteredArray['data'][0]['document']['header'];

            $varDataExcel = [
                [
                    'no'                    => 1,
                    'transactionNumber'     => $getHeaderData['number'],
                    'date'                  => $getHeaderData['date'],
                    'totalIDR'              => $getHeaderData['recordID'],
                    'totalOtherCurrency'    => $getHeaderData['businessDocumentType_RefID'],
                    'requestor'             => 'Icha Mailinda Syamsoedin',
                ]
            ];

            $compact = [
                'dataHeader' => $getHeaderData,
                'dataExcel'  => $varDataExcel
            ];

            Session::put("isButtonReportPurchaseRequisitionSummarySubmit", true);
            Session::put("dataDetailReportPurchaseRequisitionSummary", $compact['dataHeader']);
            Session::put("dataPDFReportPurchaseRequisitionSummary", $compact['dataHeader']);
            Session::put("dataExcelReportPurchaseRequisitionSummary", $compact['dataExcel']);

            return $compact;
        } catch (\Throwable $th) {
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportPurchaseRequisitionSummaryStore(Request $request) {
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
                Session::forget("isButtonReportPurchaseRequisitionSummarySubmit");
                Session::forget("dataDetailReportPurchaseRequisitionSummary");
                Session::forget("dataPDFReportPurchaseRequisitionSummary");
                Session::forget("dataExcelReportPurchaseRequisitionSummary");

                return redirect()->route('PurchaseRequisition.ReportPurchaseRequisitionSummary')->with('NotFound', $message);
            }

            $compact = $this->ReportPurchaseRequisitionSummaryData($supplierID);

            if ($compact === null || empty($compact['dataHeader'])) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('PurchaseRequisition.ReportPurchaseRequisitionSummary');
        } catch (\Throwable $th) {
            Log::error("Error at ReportPurchaseRequisitionSummaryStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportPurchaseRequisitionSummary(Request $request) {
        try {
            $dataDetail = Session::get("dataDetailReportPurchaseRequisitionSummary");

            if ($dataDetail) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Purchase.PurchaseRequisition.Reports.ReportPurchaseRequisitionSummary_pdf', compact('dataDetail'));
                    $pdf->setPaper('A4', 'portrait');
    
                    // Preview PDF
                    // return $pdf->stream('Export_Report_Delivery_Order_Request_Detail.pdf');
    
                    return $pdf->download('Export Report Purchase Requisition Summary.pdf');
                } else {
                    return Excel::download(new ExportReportPurchaseRequisitionSummary, 'Export Report Purchase Requisition Summary.xlsx');
                }
            } else {
                return redirect()->route('PurchaseRequisition.ReportPurchaseRequisitionSummary')->with('NotFound', 'Budget, Sub Budget, & Supplier Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportPurchaseRequisitionSummary: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportsPrtoPo(Request $request)
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

        return view('Purchase.PurchaseRequisition.Reports.ReportPurchaseRequisitionToPurchaseOrder', $compact);
    }

    public function ReportsDetail(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportPurchaseRequisitionDetailSubmit');

        $dataDetail = $isSubmitButton ? $request->session()->get('dataDetailReportPurchaseRequisitionDetail', []) : [];

        $compact = [
            'varAPIWebToken'    => $varAPIWebToken,
            'dataDetail'        => $dataDetail
        ];

        return view('Purchase.PurchaseRequisition.Reports.ReportPurchaseRequisitionDetail', $compact);
    }

    public function ReportPurchaseRequisitionDetailData($id) 
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

            if (!isset($filteredArray['data'][0]['document']['header'])) {
                throw new \Exception('Data not found in the API response.');
            }

            $getHeaderData = $filteredArray['data'][0]['document']['header'];

            $varDataExcel = [
                [
                    'no'        => 1,
                    'DORNumber' => $getHeaderData['number'],
                    'productId' => $getHeaderData['recordID'],
                    'qty'       => $getHeaderData['date'],
                    'unitPrice' => $getHeaderData['recordID'],
                    'total'     => $getHeaderData['businessDocumentType_RefID'],
                    'qty'       => $getHeaderData['date'],
                    'unitPrice' => $getHeaderData['recordID'],
                    'total'     => $getHeaderData['businessDocumentType_RefID'],
                ]
            ];

            $compact = [
                'dataHeader' => $getHeaderData,
                'dataExcel'  => $varDataExcel
            ];

            Session::put("isButtonReportPurchaseRequisitionDetailSubmit", true);
            Session::put("dataDetailReportPurchaseRequisitionDetail", $compact['dataHeader']);
            Session::put("dataPDFReportPurchaseRequisitionDetail", $compact['dataHeader']);
            Session::put("dataExcelReportPurchaseRequisitionDetail", $compact['dataExcel']);

            return $compact;
        } catch (\Throwable $th) {
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportPurchaseRequisitionDetailStore(Request $request) {
        try {
            $advanceRefID   = $request->advance_RefID;
            $advanceNumber  = $request->advance_number;
            
            if (!$advanceRefID && !$advanceNumber) {
                Session::forget("isButtonReportPurchaseRequisitionDetailSubmit");
                Session::forget("dataDetailReportPurchaseRequisitionDetail");
                Session::forget("dataPDFReportPurchaseRequisitionDetail");
                Session::forget("dataExcelReportPurchaseRequisitionDetail");

                return redirect()->route('PurchaseRequisition.ReportPurchaseRequisitionDetail')->with('NotFound', 'PR Number Cannot Empty');
            }

            $compact = $this->ReportPurchaseRequisitionDetailData($advanceRefID);

            if ($compact === null || empty($compact['dataHeader'])) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('PurchaseRequisition.ReportPurchaseRequisitionDetail');
        } catch (\Throwable $th) {
            Log::error("Error at ReportPurchaseRequisitionDetailStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportPurchaseRequisitionDetail(Request $request) {
        try {
            $dataDetail = Session::get("dataDetailReportPurchaseRequisitionDetail");

            if ($dataDetail) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Purchase.PurchaseRequisition.Reports.ReportPurchaseRequisitionDetail_pdf', compact('dataDetail'));
                    $pdf->setPaper('A4', 'portrait');
    
                    // Preview PDF
                    // return $pdf->stream('Export_Report_Delivery_Order_Request_Detail.pdf');
    
                    return $pdf->download('Export Report Purchase Requisition Detail.pdf');
                } else {
                    return Excel::download(new ExportReportPurchaseRequisitionDetail, 'Export Report Purchase Requisition Detail.xlsx');
                }
            } else {
                return redirect()->route('PurchaseRequisition.ReportPurchaseRequisitionDetail')->with('NotFound', 'PR Number Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportPurchaseRequisitionDetail: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
        $input = $request->all();
        // dd($input);

        $GetBusinessDoc = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'generalPurposes.businessDocument.getBusinessDocumentTypeIDByName', 
            'latest',
            [
            'parameter' => [
                'name' => 'Purchase Requisition Form'
                ]
            ]
            );
        
        $VarSelectWorkFlow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'userAction.documentWorkFlow.general.getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID', 
            'latest',
            [
            'parameter' => [
                'businessDocumentType_RefID' => (int)$GetBusinessDoc['data']['businessDocumentType_RefID'],
                'submitterEntity_RefID' => (int)$SessionWorkerCareerInternal_RefID,
                'combinedBudget_RefID' => (int)$input['var_combinedBudget_RefID']
                ]
            ]
            );

        if($VarSelectWorkFlow['metadata']['HTTPStatusCode'] != "200" || count($VarSelectWorkFlow['data']) == 0){

            $compact = [
                "message" => "WorkflowError"
            ];
    
            return response()->json($compact);
        }
        else{

            $count_product = count($input['var_product_id']);
            $PurchaseRequisitionDetail = [];
            for ($n = 0; $n < $count_product; $n++) {
                $PurchaseRequisitionDetail[$n] = [
                    "entities" => [
                        "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudgetSectionDetail_RefID'][$n],
                        "product_RefID" => (int) $input['var_product_id'][$n],
                        "quantity" => (float) $input['var_quantity'][$n],
                        "quantityUnit_RefID" => 73000000000001,
                        "productUnitPriceCurrency_RefID" => 62000000000001,
                        "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
                        "productUnitPriceCurrencyExchangeRate" => 1,
                        "remarks" => $input['var_remark'][$n],
                    ]
                ];
            }

            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.create.supplyChain.setPurchaseRequisition',
                'latest',
                [
                    'entities' => [
                        "documentDateTimeTZ" => $input['var_date'],
                        "log_FileUpload_Pointer_RefID" => (int)$input['dataInput_Log_FileUpload_Pointer_RefID'],
                        "requesterWorkerJobsPosition_RefID" => 164000000000497,
                        "remarks" => 'My Remarks',
                        "additionalData" => [
                            "itemList" => [
                                "items" => $PurchaseRequisitionDetail
                            ]
                        ]
                    ]
                ]
            );
        }
        // Var Data -> Combined Budget -> Approver Entity -> Submitter Entity
        return $this->SelectWorkFlow($varData, $SessionWorkerCareerInternal_RefID, $VarSelectWorkFlow);
    }

    public function PurchaseRequisitionListData(Request $request)
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

    public function RevisionPrIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseRequisition");

        $varDataProcReqRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.supplyChain.getPurchaseRequisition',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $request->searchPrNumberRevisionId
                ]
            ]
        );
        // dd($varDataProcReqRevision);
        
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'log_FileUpload_Pointer_RefID' => $varDataProcReqRevision['data'][0]['document']['content']['general']['attachmentFiles']['main']['log_FileUpload_Pointer_RefID'],
            'budget' => $varDataProcReqRevision['data'][0]['document']['content']['general']['budget'],
            'trano' => $varDataProcReqRevision['data'][0]['document']['header']['number'],
            'var_recordID' => $request->searchPrNumberRevisionId,
            'statusRevisi' => 1,
        ];

        return view('Purchase.PurchaseRequisition.Transactions.RevisionPurchaseRequisition', $compact);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $count_product = count($input['var_product_id']);
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $ProcReqDetail = [];
        if ($count_product > 0 && isset($count_product)) {
            for ($n = 0; $n < $count_product; $n++) {
                $ProcReqDetail[$n] = [
                    'recordID' => ((!$input['var_recordIDDetail'][$n]) ? null : (int) $input['var_recordIDDetail'][$n]),
                    'entities' => [
                        "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
                        "product_RefID" => (int) $input['var_product_id'][$n],
                        "quantity" => (float) $input['var_quantity'][$n],
                        "quantityUnit_RefID" => 73000000000001,
                        "productUnitPriceCurrency_RefID" => 62000000000001,
                        "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
                        "productUnitPriceCurrencyExchangeRate" => 1,
                        "remarks" => $input['var_remark'][$n],
                    ]
                ];
            }
        }

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.supplyChain.setPurchaseRequisition',
            'latest',
            [
                'recordID' => (int)$input['var_recordID'],
                'entities' => [
                    "documentDateTimeTZ" => $input['var_date'],
                    "log_FileUpload_Pointer_RefID" => (int)$input['dataInput_Log_FileUpload_Pointer_RefID'],
                    "requesterWorkerJobsPosition_RefID" => 164000000000497,
                    "remarks" => 'My Remarks',
                    "additionalData" => [
                        "itemList" => [
                            "items" => $ProcReqDetail
                        ]
                    ]
                ]
            ]
        );


        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }

    public function ProcReqListCartRevision(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $ProcReqRefID = $request->input('ProcReqRefID');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
            'latest',
            [
                'parameter' => [
                    'purchaseRequisition_RefID' => (int) $ProcReqRefID
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        return response()->json($varData['data']);
    }
}
