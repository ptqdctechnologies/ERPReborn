<?php

namespace App\Http\Controllers\Function;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;

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
            $varDataProject = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
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
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "SubBudget"
            ),
            true
        );

        
        if($project_code){
            $num = 0;
            $filteredArray = [];
            for ($i = 0; $i < count($DataSubBudget); $i++) {
                if ($DataSubBudget[$i]['Project_RefID'] == $project_code) {
                    $filteredArray[$num] = $DataSubBudget[$i];
                    $num++;
                }
            }
        }   

        else{
            $filteredArray = $DataSubBudget;
        }

        return response()->json($filteredArray);
    }

    // FUNCTION BUDGET 
    public function getBudget(Request $request)
    {

        $site_code = $request->input('site_code');

        $varAPIWebToken = Session::get('SessionLogin');
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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
        //     $varData = Helper_APICall::setCallAPIGateway(
        //         Helper_Environment::getUserSessionID_System(),
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
        //     Helper_Redis::getValue(
        //         Helper_Environment::getUserSessionID_System(),
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

            $varDataWorker = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
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

        if (Redis::get("Supplier") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
                ],
                false
            );
        }

        $DataSupplier = json_decode(
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "Supplier"
            ),
            true
        );

        return response()->json($DataSupplier);
    }

    // FUNCTION DELIVER TO
    public function getDeliverTo(Request $request)
    {
        if (Redis::get("Warehouse") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
                ],
                false
            );
        }

        $varDataDeliverTo = json_decode(
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "Warehouse"
            ),
            true
        );
        return response()->json($varDataDeliverTo);
    }

    // FUNCTION WAREHOUSE 
    public function getWarehouse()
    {
        if (Redis::get("Warehouse") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
                ],
                false
            );
        }

        $DataWarehouse = json_decode(
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "Warehouse"
            ),
            true
        );

        return response()->json($DataWarehouse);
    }

    // FUNCTION BRF COST 
    public function getBusinessTripCostComponentEntity(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $TripTransportationType = $request->input('TripTransportationType');
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
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
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
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
    public function getProduct()
    {
        if (Redis::get("Product") == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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

        // $DataProduct = json_decode(
        //     Helper_Redis::getValue(
        //         Helper_Environment::getUserSessionID_System(),
        //         "Product"
        //     ),
        //     true
        // );

        return response()->json($varData);
    }

    // FUNCTION DOCUMENT TYPE 
    public function getDocumentType()
    {
        if (Redis::get("DocumentType") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
            $varBusinessDocumentType = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
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
            $varBusinessDocumentType = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "DocumentType"
            ),
            true
        );

        return response()->json($DocumentType);
    }

    //DEPARTEMENT
    public function getDepartement()
    {
        if (Redis::get("Departement") == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "Departement"
            ),
            true
        );

        // dd($Departement);

        return response()->json($Departement);
    }

    //ROLE
    public function getRole(Request $request)
    {

        if (Redis::get("RoleMenu") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
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
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
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
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "SubMenu"
            ),
            true
        );


        $menu_group_id = $request->input('menu_group_id');
        $type = $request->input('type');

        $collection = collect($SubMenu);
        $collection = $collection->where('MenuGroup_RefID', $menu_group_id);
        
        $collection = $collection->where('Type', $type);

        return response()->json($collection->all());
    }

    public function getOneSubMenu(Request $request)
    {
        $selectedValue = $request->input('selectedValue');

        if (Redis::get("SubMenu") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "SubMenu"
            ),
            true
        );

        $filteredSubMenu = array_filter($SubMenu, function($item) use ($selectedValue) {
            return $item['MenuGroup_RefID'] == $selectedValue;
        });

        return response()->json($filteredSubMenu);
    }

    public function getCurrency(Request $request)
    {
        if (Redis::get("Currency") == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            $varDataCurrency = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.dataList.master.getCurrency', 
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

            Redis::set("Currency", json_encode($varDataCurrency));
        }

        $DataCurrency = json_decode(
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "Currency"
            ),
            true
        );

        return response()->json($DataCurrency['data']);
    }
}
