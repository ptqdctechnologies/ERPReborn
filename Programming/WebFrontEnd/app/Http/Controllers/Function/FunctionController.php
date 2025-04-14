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
use Illuminate\Support\Facades\Log;

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

        // $DataBudget = json_decode(
        //     Helper_Redis::getValue(
        //         Helper_Environment::getUserSessionID_System(),
        //         "Budget"
        //     ),
        //     true
        // );

        // return response()->json($DataBudget);
        return response()->json($varDataProject['data']['data']);
    }

    //FUNCTION PROJECT (MODIFIED)
    public function getNewProject(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $varGetRedisNewProject = [];

        if (!Redis::get("getNewProject")) {
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

            if (isset($varDataProject['data']['data']) && is_array($varDataProject['data']['data'])) {
                $dataAPIProject = $varDataProject['data']['data'];

                $varGetRedisNewProject = $this->syncDataWithRedis(
                    $varAPIWebToken, 
                    "getNewProject", 
                    $dataAPIProject,
                    86400
                );
            } else {
                return response()->json(['error' => 'Invalid API response'], 500);
            }
        } else {
            $varGetRedisNewProject = json_decode(
                Helper_Redis::getValue(
                    Helper_Environment::getUserSessionID_System(),
                    "getNewProject"
                ),
                true
            );
        }

        return response()->json($varGetRedisNewProject);
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
                        'project_RefID' => (int) $project_code
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

    // FUNCTION SITE PROJECT (MODIFIED)
    public function getNewSite(Request $request)
    {
        $project_code   = (int) $request->input('project_code') ?? null;
        $varAPIWebToken = Session::get('SessionLogin');
        $DataSubBudget  = [];

        if (!Redis::get("SubBudget")) {
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'dataPickList.project.getProjectSectionItem',
                'latest',
                [
                    'parameter' => [
                        'project_RefID' => (int) $project_code
                    ]
                ],
                false
            );

            if (isset($varData['data']['data']) && is_array($varData['data']['data'])) {
                $dataAPISubBudget = $varData['data']['data'];

                $DataSubBudget = $this->syncDataWithRedis(
                    $varAPIWebToken, 
                    "getNewSite", 
                    $dataAPISubBudget,
                    15
                );
            } else {
                return response()->json(['error' => 'Invalid API response'], 500);
            }
        } else {
            $DataSubBudget = json_decode(
                Helper_Redis::getValue(
                    Helper_Environment::getUserSessionID_System(),
                    "SubBudget"
                ),
                true
            );
        }

        if ($project_code && isset($DataSubBudget)) {
            $filteredData = array_filter($DataSubBudget, function($item) use ($project_code) {
                return $item['Project_RefID'] === $project_code;
            });
        } else {
            $filteredData = $DataSubBudget ?? [];
        }

        return response()->json(array_values($filteredData));
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
                    'combinedBudgetSection_RefID' => (int) $site_code,
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

        // if (Redis::get("Supplier") == null) {

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

        // }

        // $DataSupplier = json_decode(
        //     Helper_Redis::getValue(
        //         Helper_Environment::getUserSessionID_System(),
        //         "Supplier"
        //     ),
        //     true
        // );

        return response()->json($varData['data']);
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

    // FUNCTION BANK LIST
    public function getBankList(Request $request) 
    {
        $person_RefID = $request->input('person_RefID') ? (int) $request->input('person_RefID') : null;

        $varAPIWebToken = Session::get('SessionLogin');
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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

        return response()->json($varData['data']);
    }

    // FUNCTION BANK ACCOUNT
    public function getBankAccount(Request $request) 
    {
        $bank_RefID     = $request->input('bank_RefID') ? (int) $request->input('bank_RefID') : null;
        $person_RefID   = $request->input('person_RefID') ? (int) $request->input('person_RefID') : null;

        $varAPIWebToken = Session::get('SessionLogin');
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.master.getBankAccount', 
            'latest', 
            [
            'parameter' => [
                'bank_RefID' => $bank_RefID,
                ],
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,
                'paging' => null
                ]
            ]
        );

        if ($person_RefID && isset($varData['data'])) {
            $filteredData = array_filter($varData['data'], function($item) use ($person_RefID) {
                return $item['entity_RefID'] === $person_RefID;
            });
        } else {
            $filteredData = $varData['data'] ?? [];
        }

        return response()->json(array_values($filteredData));
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

        // return response()->json($DataCurrency['data']['data']);
        return response()->json($DataCurrency['data']);
    }

    public function getAdvance(Request $request) 
    {
        $projectId     = (int) $request->input('project_id', 0);
        $siteId        = (int) $request->input('site_id', 0);
        $varAPIWebToken = Session::get('SessionLogin');
        $DataAdvance    = [];

        if (!Redis::get("DataListAdvance")) {
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvance',
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

            if (isset($varData['data']['data'])) {
                $DataAdvance = $this->syncDataWithRedis(
                    $varAPIWebToken, 
                    "DataListAdvance", 
                    $varData['data']['data']
                );
            }
        } else {
            $redisData = Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "DataListAdvance"
            );

            $DataAdvance = $redisData ? json_decode($redisData, true) : [];
        }

        $filteredData = $DataAdvance;

        if ($projectId > 0 && $siteId > 0) {
            $filteredData = array_filter($DataAdvance, function ($item) use ($projectId, $siteId) {
                return 
                    isset($item['combinedBudget_RefID'], $item['combinedBudgetSection_RefID']) &&
                    is_array($item['combinedBudget_RefID']) &&
                    is_array($item['combinedBudgetSection_RefID']) &&
                    in_array($projectId, $item['combinedBudget_RefID']) &&
                    in_array($siteId, $item['combinedBudgetSection_RefID']);
            });
        }

        return response()->json(array_values($filteredData));
    }

    public function getPerson(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        
        $varDataPerson = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'dataPickList.master.getPerson', 
            'latest',
            [
                'parameter' => []
            ]
        );

        return response()->json($varDataPerson['data']);
    }

    public function getAdvanceDetail(Request $request) 
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $advanceRefID   = $request->input('advanceRefID');

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.finance.getAdvanceDetail', 
            'latest', 
            [
                'parameter' => [
                    'advance_RefID' => (int) $advanceRefID
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );

        return response()->json($varData);
    }

    public function getDeliveryOrderList(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.dataList.supplyChain.getDeliveryOrder', 
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

            return response()->json($varData['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getDeliveryOrderList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getPurchaseRequisitionList(Request $request) 
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $userSession    = Helper_Environment::getUserSessionID_System();

            $varData = Helper_APICall::setCallAPIGateway(
                $userSession,
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

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');
            }

            return response()->json($varData['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getPurchaseRequisitionList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getPaymentTerm(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $userSession    = Helper_Environment::getUserSessionID_System();

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.dataList.master.getPaymentTerm', 
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

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');
            }

            return response()->json($varData['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getPaymentTerm: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getVAT(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $userSession    = Helper_Environment::getUserSessionID_System();

            $varData = Helper_APICall::setCallAPIGateway(
                $userSession,
                $varAPIWebToken,
                'transaction.read.dataList.taxation.getVat',
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

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');
            }

            return response()->json($varData['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getVAT: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getPurchaseOrderList(Request $request) 
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.dataList.supplyChain.getPurchaseOrder', 
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

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');
            }

            return response()->json($varData['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getPurchaseOrderList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getPurchaseOrderDetail(Request $request) 
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $purchase_order_id = $request->input('purchase_order_id');

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.supplyChain.getPurchaseOrderDetail',
                'latest',
                [
                    'parameter' => [
                        'purchaseOrder_RefID' => (int) $purchase_order_id
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
                return redirect()->back()->with('NotFound', 'Process Error');
            }

            return response()->json($varData['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getPurchaseOrderDetail: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getBusinessTripCostComponentEntityNew(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $userSession = Helper_Environment::getUserSessionID_System();
            $varData = json_decode(Helper_Redis::getValue($userSession, "DataBusinessTripCostComponentEntityNew"), true);

            if (empty($varData)) {
                $varData = [
                    ['name' => 'Taxi', 'value' => "221000000000026"],
                    ['name' => 'Airplane', 'value' => "221000000000046"],
                    ['name' => 'Train', 'value' => "221000000000043"],
                    ['name' => 'Bus', 'value' => "221000000000039"],
                    ['name' => 'Ship', 'value' => "221000000000050"],
                    ['name' => 'Tol/Road', 'value' => "221000000000004"],
                    ['name' => 'Park', 'value' => "221000000000005"],
                    ['name' => 'Excess Baggage', 'value' => "221000000000006"],
                    ['name' => 'Fuel', 'value' => "221000000000003"],
                    ['name' => 'Hotel', 'value' => "276000000000002"],
                    ['name' => 'Mess', 'value' => "276000000000005"],
                    ['name' => 'Guest House', 'value' => "276000000000004"],
                    ['name' => 'Accommodation', 'value' => "81000000000001"],
                    ['name' => 'Entertainment', 'value' => "81000000000004"],
                    ['name' => 'Other', 'value' => "81000000000005"],
                ];

                $this->syncDataWithRedis($varAPIWebToken, "DataBusinessTripCostComponentEntityNew", $varData, 300);
            }

            return response()->json($varData);
        } catch (\Throwable $th) {
            Log::error("Error at getBusinessTripCostComponentEntityNew: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }


    // NITIP
    // $userSessionID = Helper_Environment::getUserSessionID_System();
    // $varData = Helper_APICall::setCallAPIGateway(
    //     Helper_Environment::getUserSessionID_System(),
    //     $varAPIWebToken, 
    //     'transaction.read.dataList.customerRelation.getCustomer', 
    //     'latest', 
    //     [
    //         'parameter' => null,
    //         'SQLStatement' => [
    //             'pick' => null,
    //             'sort' => null,
    //             'filter' => null,                    
    //             'paging' => null
    //         ]
    //     ]
    // );

    // $varGetRedisCustomer = $this->syncDataWithRedis(
    //     $userSessionID, 
    //     "Customer", 
    //     $varData['data']
    // );
}
