<?php

namespace App\Http\Controllers\Function;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class FunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //FUNCTION PROJECT
    public function getProject(Request $request)
    {
        $DataProject = json_decode(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
            "Project"
            ),
            true
        );

        return response()->json($DataProject);
    }

    // FUNCTION SITE PROJECT
    public function getSite(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $project_code = $request->input('project_code');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProjectSectionItem',
            'latest',
            [
                'parameter' => [
                    'project_RefID' => (int)$project_code
                ]
            ]
        );

        return response()->json($varData['data']['data']);
    }

    // FUNCTION BUDGET 
    public function getBudget(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $site_code = $request->input('site_code');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.budgeting.getCombinedBudgetSectionDetail',
            'latest',
            [
                'parameter' => [
                    'combinedBudgetSection_RefID' => (int)$site_code,
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

    // FUNCTION PURCHASE REQUISTION 
    public function getPurchaseRequisitionByBudgetID(Request $request)
    {
        $projectcode = $request->input('projectcode');
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
                    'filter' => '"CombinedBudget_RefID" = ' . $projectcode . '',
                    'paging' => null
                ]
            ]
        );

        $compact = [
            'DataPurchaseRequisition' => $varDataPurchaseRequisition['data'],
        ];
        return response()->json($compact);
    }

    // FUNCTION WORKER 
    public function getWorker(Request $request)
    {
        $DataWorker = json_decode(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
            "Worker"
            ),
            true
        );

        // dd($DataWorker);
        return response()->json($DataWorker);

    }

    // FUNCTION SUPPLIER
    public function getSupplier(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataSupplier = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getSupplier',
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

        return response()->json($varDataSupplier['data']);
    }

    // FUNCTION WAREHOUSE 
    public function getDeliverTo(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataDeliverTo = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getWarehouse',
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

        return response()->json($varDataDeliverTo['data']);
    }

    // FUNCTION BRF COST 
    public function getBusinessTripCostComponentEntity(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $TripTransportationType = $request->input('TripTransportationType');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.humanResource.getBusinessTripCostComponentEntity',
            'latest',
            [
                'parameter' => [
                    "businessTripTransportationType_RefIDArray" => [
                        (int)$TripTransportationType,
                    ]
                ]
            ]
        );

        return response()->json($varData['data']['data']);
    }

    // FUNCTION BANK 
    public function getBank(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $sys_ID = $request->input('sys_ID');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.master.getEntityBankAccount',
            'latest',
            [
                'parameter' => [
                    'entity_RefID' => (int)$sys_ID
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

    // FUNCTION BANK ACCOUNT 
    public function getEntityBankAccount(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $sys_ID = $request->input('sys_ID');
        $bank_ID = $request->input('bank_ID');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.master.getEntityBankAccount',
            'latest',
            [
                'parameter' => [
                    'entity_RefID' => (int)$sys_ID
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => '"Bank_RefID" = ' . $bank_ID . '',
                    'paging' => null
                ]
            ]
        );

        return response()->json($varData['data']);
    }

    // FUNCTION PRODUCT 
    public function getProduct(Request $request)
    {
        $DataProduct = json_decode(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
            "Product"
            ),
            true
        );        

        return response()->json($DataProduct);
    }

    // FUNCTION DOCUMENT TYPE 
    public function getDocumentType()
    {
        $DocumentType = json_decode(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
            "DocumentType"
            ),
            true
        );       
    }
}
