<?php

namespace App\Http\Controllers\Purchase;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use Illuminate\Support\Facades\Log;

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
    public function ReportPurchaseRequisitionSummary(Request $request)
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

        return view('Purchase.PurchaseRequisition.Reports.ReportPurchaseRequisitionSummary', $compact);
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
    public function ReportPurchaseRequisitionDetail(Request $request)
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
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataHeader' => []
        ];

        return view('Purchase.PurchaseRequisition.Reports.ReportPurchaseRequisitionDetail', $compact);
    }

    public function store(Request $request)
    {
        try {
            $varAPIWebToken                     = Session::get('SessionLogin');
            $SessionWorkerCareerInternal_RefID  = Session::get('SessionWorkerCareerInternal_RefID');
            $purchaseRequisitionData            = $request->all();
            $purchaseRequisitionDetail          = json_decode($purchaseRequisitionData['purchaseRequisitionDetail'], true);
            $fileID                             = $purchaseRequisitionData['dataInput_Log_FileUpload_1'] ? (int) $purchaseRequisitionData['dataInput_Log_FileUpload_1'] : null;

            $transformedDetails = [];
            foreach ($purchaseRequisitionDetail as $entity) {
                $transformedDetails[] = [
                    "entities" => [
                        "combinedBudgetSectionDetail_RefID"     => (int) $entity['combinedBudgetSectionDetail_RefID'],
                        "product_RefID"                         => (int) $entity['product_RefID'],
                        "quantity"                              => (float) str_replace(',', '', $entity['quantity']),
                        "quantityUnit_RefID"                    => (int) $entity['quantityUnit_RefID'],
                        "productUnitPriceCurrency_RefID"        => (int) $entity['productUnitPriceCurrency_RefID'],
                        "productUnitPriceCurrencyValue"         => (float) str_replace(',', '', $entity['productUnitPriceCurrencyValue']),
                        "productUnitPriceCurrencyExchangeRate"  => (int) $entity['productUnitPriceCurrencyExchangeRate'],
                        "fulfillmentDeadlineDateTimeTZ"         => $purchaseRequisitionData['dateCommance'], // Tanya
                        "remarks"                               => $entity['remarks'],
                    ]
                ];
            }

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.supplyChain.setPurchaseRequisition', 
                'latest',
                [
                'entities' => [
                    "documentDateTimeTZ"                => date('Y-m-d'),
                    "log_FileUpload_Pointer_RefID"      => (int) $fileID,
                    "requesterWorkerJobsPosition_RefID" => (int) $SessionWorkerCareerInternal_RefID,
                    "remarks"                           => $purchaseRequisitionData['notes'],
                    "additionalData"    => [
                        "itemList"      => [
                            "items"     => $transformedDetails
                            ]
                        ]
                    ]
                ]
            );

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($varData);
            }

            $compact = [
                "documentNumber"    => $varData['data']['businessDocument']['documentNumber'],
                "status"            => $varData['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Error at store: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }

        // $varAPIWebToken = $request->session()->get('SessionLogin');
        // $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
        // $input = $request->all();
        // // dd($input);

        // $GetBusinessDoc = Helper_APICall::setCallAPIGateway(
        //     Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'generalPurposes.businessDocument.getBusinessDocumentTypeIDByName', 
        //     'latest',
        //     [
        //     'parameter' => [
        //         'name' => 'Purchase Requisition Form'
        //         ]
        //     ]
        //     );
        
        // $VarSelectWorkFlow = Helper_APICall::setCallAPIGateway(
        //     Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'userAction.documentWorkFlow.general.getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID', 
        //     'latest',
        //     [
        //     'parameter' => [
        //         'businessDocumentType_RefID' => (int)$GetBusinessDoc['data']['businessDocumentType_RefID'],
        //         'submitterEntity_RefID' => (int)$SessionWorkerCareerInternal_RefID,
        //         'combinedBudget_RefID' => (int)$input['var_combinedBudget_RefID']
        //         ]
        //     ]
        //     );

        // if($VarSelectWorkFlow['metadata']['HTTPStatusCode'] != "200" || count($VarSelectWorkFlow['data']) == 0){

        //     $compact = [
        //         "message" => "WorkflowError"
        //     ];
    
        //     return response()->json($compact);
        // }
        // else{

        //     $count_product = count($input['var_product_id']);
        //     $PurchaseRequisitionDetail = [];
        //     for ($n = 0; $n < $count_product; $n++) {
        //         $PurchaseRequisitionDetail[$n] = [
        //             "entities" => [
        //                 "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudgetSectionDetail_RefID'][$n],
        //                 "product_RefID" => (int) $input['var_product_id'][$n],
        //                 "quantity" => (float) $input['var_quantity'][$n],
        //                 "quantityUnit_RefID" => 73000000000001,
        //                 "productUnitPriceCurrency_RefID" => 62000000000001,
        //                 "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
        //                 "productUnitPriceCurrencyExchangeRate" => 1,
        //                 "remarks" => $input['var_remark'][$n],
        //             ]
        //         ];
        //     }

        //     $varData = Helper_APICall::setCallAPIGateway(
        //         Helper_Environment::getUserSessionID_System(),
        //         $varAPIWebToken,
        //         'transaction.create.supplyChain.setPurchaseRequisition',
        //         'latest',
        //         [
        //             'entities' => [
        //                 "documentDateTimeTZ" => $input['var_date'],
        //                 "log_FileUpload_Pointer_RefID" => (int)$input['dataInput_Log_FileUpload_Pointer_RefID'],
        //                 "requesterWorkerJobsPosition_RefID" => 164000000000497,
        //                 "remarks" => 'My Remarks',
        //                 "additionalData" => [
        //                     "itemList" => [
        //                         "items" => $PurchaseRequisitionDetail
        //                     ]
        //                 ]
        //             ]
        //         ]
        //     );
        // }
        // // Var Data -> Combined Budget -> Approver Entity -> Submitter Entity
        // return $this->SelectWorkFlow($varData, $SessionWorkerCareerInternal_RefID, $VarSelectWorkFlow);
    }


    public function PurchaseRequisitionListData(Request $request)
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

    public function RevisionPrIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseRequisition");

        $varDataProcReqRevision = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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