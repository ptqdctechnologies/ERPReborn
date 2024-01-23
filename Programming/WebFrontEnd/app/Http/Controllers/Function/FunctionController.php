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

        if (Redis::get("Budget") == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            $varDataProject = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'dataPickList.project.getProject',
                'latest',
                [
                    'parameter' => null
                ],
                false
            );
        }

        $DataBudget = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "Budget"
            ),
            true
        );


        return response()->json($DataBudget);
    }

    // FUNCTION SITE PROJECT
    public function getSite(Request $request)
    {

        $project_code = $request->input('project_code');

        if (Redis::get("SubBudget") == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'dataPickList.project.getProjectSectionItem',
                'latest',
                [
                    'parameter' => [
                        'project_RefID' => (int)$project_code
                    ]
                ],
                false
            );
        }

        $DataSubBudget = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "SubBudget"
            ),
            true
        );

        $num = 0;
        $filteredArray = [];
        for ($i = 0; $i < count($DataSubBudget); $i++) {
            if ($DataSubBudget[$i]['Project_RefID'] == $project_code) {
                $filteredArray[$num] = $DataSubBudget[$i];
                $num++;
            }
        }


        return response()->json($filteredArray);
    }

    // FUNCTION BUDGET 
    public function getBudget(Request $request)
    {

        $site_code = $request->input('site_code');

        $varAPIWebToken = Session::get('SessionLogin');
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
            ],
            false
        );

        return response()->json($varData['data']);


        // $site_code = $request->input('site_code');

        // if (Redis::get("DataBudget") == null) {

        //     $varAPIWebToken = Session::get('SessionLogin');
        //     $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //         \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //         $varAPIWebToken,
        //         'transaction.read.dataList.budgeting.getCombinedBudgetSectionDetail',
        //         'latest',
        //         [
        //             'parameter' => [
        //                 'combinedBudgetSection_RefID' => (int)$site_code,
        //             ],
        //             'SQLStatement' => [
        //                 'pick' => null,
        //                 'sort' => null,
        //                 'filter' => null,
        //                 'paging' => null
        //             ]
        //         ],
        //         false
        //     );
        // }

        // $varDataBudget = json_decode(
        //     \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
        //         \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //         "DataBudget"
        //     ),
        //     true
        // );

        // $num = 0;
        // $filteredArray = [];
        // for ($i = 0; $i < count($varDataBudget); $i++) {
        //     if ($varDataBudget[$i]['CombinedBudgetSection_RefID'] == $site_code) {
        //         $filteredArray[$num] = $varDataBudget[$i];
        //         $num++;
        //     }
        // }

        // return response()->json($filteredArray);
    }

    // FUNCTION PURCHASE REQUISTION 
    public function getPurchaseRequisitionByBudgetID(Request $request)
    {
        $projectcode = $request->input('projectcode');
        $varAPIWebToken = Session::get('SessionLogin');
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

        if (Redis::get("Worker") == null) {

            $varAPIWebToken = Session::get('SessionLogin');

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
                ],
                false
            );
        }

        $DataWorker = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
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
        $varAPIWebToken = Session::get('SessionLogin');
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
        $varAPIWebToken = Session::get('SessionLogin');
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
        $varAPIWebToken = Session::get('SessionLogin');
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

        $person_refID = $request->input('person_refID');

        if (Redis::get("Bank") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.master.getEntityBankAccount',
                'latest',
                [
                    'parameter' => [
                        'entity_RefID' => 0
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
        }

        $DataBank = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "Bank"
            ),
            true
        );

        $num = 0;
        $filteredArray = [];
        for ($i = 0; $i < count($DataBank); $i++) {
            if ($DataBank[$i]['Entity_RefID'] == $person_refID) {
                $filteredArray[$num] = $DataBank[$i];
                $num++;
            }
        }

        return response()->json($filteredArray);
    }

    // FUNCTION BANK ACCOUNT 
    public function getEntityBankAccount(Request $request)
    {
        if (Redis::get("Bank") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.master.getEntityBankAccount',
                'latest',
                [
                    'parameter' => [
                        'entity_RefID' => 0
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
        }

        $person_refID = $request->input('person_refID');
        $Bank_RefID = $request->input('Bank_RefID');
        $DataBank = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "Bank"
            ),
            true
        );

        $num = 0;
        $filteredArray = [];
        for ($i = 0; $i < count($DataBank); $i++) {
            if ($DataBank[$i]['Entity_RefID'] == $person_refID && $DataBank[$i]['Bank_RefID'] == $Bank_RefID) {
                $filteredArray[$num] = $DataBank[$i];
                $num++;
            }
        }

        return response()->json($filteredArray);
    }

    // FUNCTION PRODUCT 
    public function getProduct(Request $request)
    {
        if (Redis::get("Product") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
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
                ],
                false
            );
        }

        $DataProduct = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
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
        if (Redis::get("DocumentType") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
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
                ],
                false
            );
        }

        $DocumentType = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "DocumentType"
            ),
            true
        );

        return response()->json($DocumentType);
    }

    // FUNCTION DOCUMENT TYPE 
    public function getPrivilageMenu()
    {
        if (Redis::get("DocumentType") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
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
                ],
                false
            );
        }

        $DocumentType = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "DocumentType"
            ),
            true
        );

        dd($DocumentType);

        return response()->json($DocumentType);
    }

    //LOG TRANSACTION

    public function ShowRevisionHistory($id)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataWarehouse.read.dataList.log.getTransactionHistory',
            'latest',
            [
                'parameter' => [
                    'source_RefID' => (int) $id
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
        $compact = [
            'data' => $varData['data']
        ];
        return view('getFunction.ShowRevisionHistory', $compact);
    }

    //DEPARTEMENT

    public function getDepartement()
    {
        if (Redis::get("Departement") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.sysConfig.getAppObject_UserRoleGroup',
                'latest',
                [
                    'parameter' => null,
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ],
                false
            );
        }

        $Departement = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "Departement"
            ),
            true
        );

        return response()->json($Departement);
    }

    //ROLE

    public function getRole(Request $request)
    {

        if (Redis::get("RoleMenu") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.sysConfig.getAppObject_UserRole',
                'latest',
                [
                    'parameter' => [
                        'userRoleGroup_RefID' => null
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
        }

        $RoleMenu = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "RoleMenu"
            ),
            true
        );

        $departement_id = $request->input('departement_id');

        $collection = collect($RoleMenu);
        $collection = $collection->where('UserRoleGroup_RefID', $departement_id);

        return response()->json($collection->all());
    }

    public function getMenuGroup(Request $request)
    {

        if (Redis::get("MenuGroup") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.sysConfig.getAppObject_MenuGroup',
                'latest',
                [
                    'parameter' => null,
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ],
                false
            );
        }

        $MenuGroup = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "MenuGroup"
            ),
            true
        );
        return response()->json($MenuGroup);
    }

    public function getSubMenu(Request $request)
    {

        if (Redis::get("SubMenu") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.sysConfig.getAppObject_Menu',
                'latest',
                [
                    'parameter' => [
                        'menuGroup_RefID' => null
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
        }

        $SubMenu = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "SubMenu"
            ),
            true
        );

        $menu_group_id = $request->input('menu_group_id');

        $collection = collect($SubMenu);
        $collection = $collection->where('MenuGroup_RefID', $menu_group_id);

        // dd($collection);
        return response()->json($collection->all());
    }
}
