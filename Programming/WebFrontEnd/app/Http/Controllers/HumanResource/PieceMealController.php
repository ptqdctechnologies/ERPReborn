<?php

namespace App\Http\Controllers\HumanResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class PieceMealController extends Controller
{
    public function index(Request $request)
    {
        $messages = $request->session()->get("SessionAdvance");
        dd($messages);
        $request->session()->forget("SessionPieceMeal");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'var' => $var,
        ];

        return view('HumanResource.PieceMeal.Transactions.CreatePieceMeal', $compact);
    }

    public function StoreValidatePieceMeal(Request $request)
    {
        $tamp = 0;
        $status = 200;
        $val = $request->input('putProductId');
        $data = $request->session()->get("SessionPieceMeal");
        if ($request->session()->has("SessionPieceMeal")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $val) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                $request->session()->push("SessionPieceMeal", $val);
            } else {
                $status = 500;
            }
        } else {
            $request->session()->push("SessionPieceMeal", $val);
        }

        return response()->json($status);
    }

    public function StoreValidatePieceMeal2(Request $request)
    {
        $messages = $request->session()->get("SessionPieceMeal");
        $val = $request->input('putProductId');
        if ($request->session()->has("SessionPieceMeal")) {
            if (($key = array_search($val, $messages)) !== false) {
                unset($messages[$key]);
                $newClass = array_values($messages);
                $request->session()->put("SessionPieceMeal", $newClass);
            }
        }
    }

    public function store(Request $request)
    {
        // $input = $request->all();
        // $count_product = count($input['var_product_id']);

        // $varAPIWebToken = $request->session()->get('SessionLogin');

        // $advanceDetail = [];
        // for($n =0; $n < $count_product; $n++){
        //     $advanceDetail[$n] = [
        //     'entities' => [
        //             "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
        //             "product_RefID" => (int) $input['var_product_id'][$n],
        //             "quantity" => (float) $input['var_quantity'][$n],
        //             "quantityUnit_RefID" => 73000000000001,
        //             "productUnitPriceCurrency_RefID" => 62000000000001,
        //             "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
        //             "productUnitPriceCurrencyExchangeRate" => 1,
        //             "remarks" => 'test jumat'
        //         ]
        //     ];
        // }

        // $varData = Helper_APICall::setCallAPIGateway(
        //     Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'transaction.create.finance.setAdvance', 
        //     'latest', 
        //     [
        //     'entities' => [
        //         "documentDateTimeTZ" => $input['var_date'],
        //         "log_FileUpload_Pointer_RefID" => 91000000000001,
        //         "requesterWorkerJobsPosition_RefID" => (int)$input['request_name_id'],
        //         "beneficiaryWorkerJobsPosition_RefID" => 25000000000439,
        //         "beneficiaryBankAccount_RefID" => 167000000000001,
        //         "internalNotes" => 'My Internal Notes',
        //         "remarks" => $input['var_remark'],
        //         "additionalData" => [
        //             "itemList" => [
        //                 "items" => $advanceDetail
        //                 ]
        //             ]
        //         ]
        //     ]                    
        //     );

        $compact = [
            "pmnumber" => 'PM-00000001',
        ];

        return response()->json($compact);
    }

    public function PieceMealListData(Request $request)
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

        return response()->json($varDataPurchaseRequisition['data']);
    }

    public function RevisionPieceMeal(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPieceMeal");

        $varDataProcReqRevision = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.supplyChain.getPurchaseRequisition',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $request->searchPmNumberRevisionId
                ]
            ]
        );
        // dd($varDataProcReqRevision);

        $compact = [
            'dataProcReqRevision' => $varDataProcReqRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'var_recordID' => $request->searchPmNumberRevisionId,
        ];
        return view('HumanResource.PieceMeal.Transactions.RevisionPieceMeal', $compact);
    }

    public function PieceMealListCartRevision(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var_recordID = $request->input('var_recordID');

        $varData = Helper_APICall::setCallAPIGateway(
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
        foreach ($varData['data'] as $varDatas) {
            $request->session()->push("SessionPieceMeal", (string) $varDatas['product_RefID']);
        }
        return response()->json($varData['data']);
    }

    public function update(Request $request, $id)
    {
        // $input = $request->all();
        // $count_product = count($input['var_product_id']);
        // $varAPIWebToken = $request->session()->get('SessionLogin');

        // $advanceDetail = [];
        // if ($count_product > 0 && isset($count_product)) {
        //     for($n =0; $n < $count_product; $n++){
        //         $advanceDetail[$n] = [
        //             'recordID' => ((!$input['var_recordIDDetail'][$n]) ? null : (int) $input['var_recordIDDetail'][$n]),
        //             'entities' => [
        //                 "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
        //                 "product_RefID" => (int) $input['var_product_id'][$n],
        //                 "quantity" => (float) $input['var_quantity'][$n],
        //                 "quantityUnit_RefID" => 73000000000001,
        //                 "productUnitPriceCurrency_RefID" => 62000000000001,
        //                 "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
        //                 "productUnitPriceCurrencyExchangeRate" => 1,
        //                 "remarks" => 'Catatan'
        //             ]
        //         ];
        //     }
        // }
        // $varData = Helper_APICall::setCallAPIGateway(
        //     Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'transaction.update.finance.setAdvance', 
        //     'latest', 
        //     [
        //         'recordID' => (int)$input['var_recordID'],
        //         'entities' => [
        //             "documentDateTimeTZ" => '2022-03-07',
        //             "log_FileUpload_Pointer_RefID" => 91000000000001,
        //             "requesterWorkerJobsPosition_RefID" => (int)$input['request_name_id'],
        //             "beneficiaryWorkerJobsPosition_RefID" => 25000000000439,
        //             "beneficiaryBankAccount_RefID" => 167000000000001,
        //             "internalNotes" => 'My Internal Notes',
        //             "remarks" => $input['var_remark'],
        //             "additionalData" => [
        //                 "itemList" => [
        //                     "items" => $advanceDetail
        //                     ]
        //                 ]
        //             ]
        //         ]                   
        // );
        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }
}
