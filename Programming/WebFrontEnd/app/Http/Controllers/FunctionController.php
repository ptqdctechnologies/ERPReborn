<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProject(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataProject = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => null
            ]
        );
        
        return response()->json($varDataProject['data']['data']);
    }

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
                    'filter' => '"CombinedBudget_RefID" = '.$projectcode.'',
                    'paging' => null
                ]
            ]
        );
        
        $compact = [
            'DataPurchaseRequisition' => $varDataPurchaseRequisition['data'],
        ];
        return response()->json($compact);
    }
    
    public function getSite(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $projectcode = $request->input('projectcode');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'dataPickList.project.getProjectSectionItem', 
            'latest',
            [
            'parameter' => [
                'project_RefID' => (int)$projectcode
                ]
            ]
        );
        // dd($varData);

        return response()->json($varData['data']['data']);
    }

    public function getBudget(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $sitecode = $request->input('sitecode');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.budgeting.getCombinedBudgetSectionDetail', 
        'latest', 
        [
        'parameter' => [
            'combinedBudgetSection_RefID' => (int)$sitecode,
            ],
        'SQLStatement' => [
            'pick' => null,
            'sort' => null,
            'filter' => null,
            'paging' => null
            ]
        ]
        );

        // dd($varData);

        return response()->json($varData['data']);
    }

    public function getWorker(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataWorker = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.humanResource.getWorkerJobsPositionCurrent', 
            'latest', 
            [
            'parameter' => [
                'worker_RefID' => null
                ],
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,
                'paging' => null
                ]
            ]
            );
            // dd($varDataWorker);
            
        return response()->json($varDataWorker['data']['data']);
    }

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
            // dd($varDataSupplier);
            
        return response()->json($varDataSupplier['data']);
    }

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
            // dd($varDataDeliverTo);
            
        return response()->json($varDataDeliverTo['data']);
    }


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
        // dd($varData);
            
        return response()->json($varData['data']['data']);
    }

    public function getBank(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.master.getBank', 
            'latest', 
            [
            'parameter' => [
                ],
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,
                'paging' => null
                ]
            ]
            );
        
        // dd($varData);
        
        return response()->json($varData['data']);
    }

    public function getBankAccount(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $bank_code = $request->input('bank_code');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.master.getBankAccount', 
            'latest', 
            [
            'parameter' => [
                'bank_RefID' => (int)$bank_code,
                ],
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,
                'paging' => null
                ]
            ]
            );
        
        // dd($varData);
        
        return response()->json($varData['data']);
    }

    public function getProduct(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.master.getProduct', 
            'latest', 
            [
            'parameter' => [
                'dateTime' => null
                ],
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,                    
                'paging' => null
                ]
            ]
            );
        
        // dd($varData['data'][0]);
        
        return response()->json($varData['data']);
    }
}
