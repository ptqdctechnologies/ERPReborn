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
            $purchaseRequisitionDetail          = json_decode($purchaseRequisitionData['storeData']['purchaseRequisitionDetail'], true);
            $fileID                             = $purchaseRequisitionData['storeData']['dataInput_Log_FileUpload_1'] ? (int) $purchaseRequisitionData['storeData']['dataInput_Log_FileUpload_1'] : null;

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
                        "fulfillmentDeadlineDateTimeTZ"         => $purchaseRequisitionData['storeData']['dateCommance'], // Tanya
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
                    "remarks"                           => $purchaseRequisitionData['storeData']['notes'],
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
        $varAPIWebToken             = $request->session()->get('SessionLogin');
        $purchaseRequisition_RefID  = $request->modal_purchase_requisition_id;
        $request->session()->forget("SessionPurchaseRequisition");

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail', 
            'latest', 
            [
            'parameter' => [
                'purchaseRequisition_RefID' => (int) $purchaseRequisition_RefID
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
                'budgetID'          => '', // Request (46000000000000)
                'budgetName'        => $data[0]['combinedBudgetName'],
                'budgetCode'        => $data[0]['combinedBudgetCode'],
                'subBudgetID'       => '', // Request (143000000000000)
                'subBudgetName'     => $data[0]['combinedBudgetSectionName'],
                'subBudgetCode'     => $data[0]['combinedBudgetSectionCode'],
                'deliverToID'       => '',
                'deliverToCode'     => '',
                'deliverToName'     => '',
                'dateOfDelivery'    => '',
                'notes'             => '',
                'fileId'            => '',
            ],
            'detail'                => $data
        ];

        // dump($data);

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