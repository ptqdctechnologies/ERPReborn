<?php

namespace App\Http\Controllers\Function;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        
        // dd($varData['data']);
        return response()->json($varData['data']);
    }

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
                'filter' => '"Bank_RefID" = '.$bank_ID.'',
                'paging' => null
                ]
            ]
            );

        // dd($varData['data']);
        
        return response()->json($varData['data']);
    }

    public function getProduct(Request $request)
    {
        $banyak = 10;
        $index = 0;
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
                // trim('limit '. $banyak. ' offset '.$index) // // Munuculkan banyak data dimulai dari index sekian
                ]
            ]
            );
        
        // dd($varData['data'][0]);
        
        return response()->json($varData['data']);
    }

    public function getDocumentType(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varBusinessDocumentType = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.master.getBusinessDocumentType',
            'latest',
            [
                'parameter' => [],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        
        return response()->json($varBusinessDocumentType['data']);
    }
}
