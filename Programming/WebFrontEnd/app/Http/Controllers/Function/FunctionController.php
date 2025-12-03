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
use App\Services\Process\Advance\AdvanceSettlementService;
use App\Services\Process\BusinessTrip\BusinessTripService;
use App\Services\Master\BusinessDocumentType\BusinessDocumentTypeService;
use App\Services\Master\Transporter\TransporterService;

class FunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $advanceSettlementService, 
        $businessDocumentTypeService, 
        $businessTripService, 
        $transporterService;

    public function __construct(
        AdvanceSettlementService $advanceSettlementService, 
        BusinessTripService $businessTripService, 
        BusinessDocumentTypeService $businessDocumentTypeService,
        TransporterService $transporterService)
    {
        $this->advanceSettlementService     = $advanceSettlementService;
        $this->businessTripService          = $businessTripService;
        $this->businessDocumentTypeService  = $businessDocumentTypeService;
        $this->transporterService           = $transporterService;
    }

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

        return response()->json($varData['data']['data']);
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

        return response()->json($varDataWorker['data']['data']);
    }

    public function getChartOfAccountList(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $varDataCOA     = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'dataPickList.accounting.getChartOfAccount',
                'latest',
                [
                    'parameter' => [
                        'effectiveDateTimeTZ' => NULL
                    ]
                ],
                false
            );

            return response()->json($varDataCOA['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getChartOfAccountList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getCreditNoteList(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $varDataCN      = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'dataPickList.finance.getCreditNote',
                'latest',
                [
                    'parameter' => [
                    ]
                ],
                false
            );

            return response()->json($varDataCN['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getCreditNoteList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    // FUNCTION WORKER 
    public function getTransporter(Request $request)
    {
        try {
            $response = $this->transporterService->dataPickList();

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            return response()->json($response['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getTransporter: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
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

        return response()->json($varData['data']['data']);
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
        return response()->json($varDataDeliverTo['data']);
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

        if ($person_RefID && isset($varData['data']['data'])) {
            $filteredData = array_filter($varData['data']['data'], function($item) use ($person_RefID) {
                return $item['entity_RefID'] === $person_RefID;
            });
        } else {
            $filteredData = $varData['data']['data'] ?? [];
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
        for ($i = 0; $i < count($DataBank['data']); $i++) {
            if ($DataBank['data'][$i]['Entity_RefID'] == $person_refID) {
                $filteredArray[$num] = $DataBank['data'][$i];
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
    public function getDocumentType(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $transName      = $request->input('name');
            $filterName     = null;

            if ($transName && $transName != "undefined" && $transName != null) {
                $filterName = "\"Name\" = '$transName'";
            }

            $response = $this->businessDocumentTypeService->getDetail(
                [
                    'parameter'     => [],
                    'SQLStatement'  => [
                        'pick'      => null,
                        'sort'      => null,
                        'filter'    => $filterName,
                        'paging'    => null
                    ]
                ]
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            return response()->json($response['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getDocumentType: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
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

        return response()->json($varData['data']['data']);
    }

    //ROLE
    public function getRole(Request $request)
    {
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

        $departement_id = $request->input('departement_id');

        $collection = collect($varData['data']['data']);
        $collection = $collection->where('userRoleGroup_RefID', $departement_id);

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

        $menu_group_id = $request->input('menu_group_id');
        $type = $request->input('type');

        $collection = collect($varData['data']['data']);
        $collection = $collection->where('menuGroup_RefID', $menu_group_id);
        
        $collection = $collection->where('type', $type);

        return response()->json($collection->all());
    }

    public function getOneSubMenu(Request $request)
    {
        $selectedValue = $request->input('selectedValue');

        $varAPIWebToken = Session::get('SessionLogin');
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.sysConfig.getAppObject_Menu',
            'latest',
            [
                'parameter' => [
                    'menuGroup_RefID' => (int) $selectedValue
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

        $filteredSubMenu = array_filter($varData['data']['data'], function($item) use ($selectedValue) {
            return $item['menuGroup_RefID'] == $selectedValue;
        });

        return response()->json($filteredSubMenu);
    }

    public function getCustomerList(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $varDataCustomer = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'dataPickList.customerRelation.getCustomer', 
                'latest', 
                [
                    'parameter'     => null,
                    'SQLStatement'  => [
                        'pick'      => null,
                        'sort'      => null,
                        'filter'    => null,
                        'paging'    => null
                    ]
                ]
            );

            if ($varDataCustomer['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($varDataCustomer);
            }

            return response()->json($varDataCustomer['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getCustomerList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getInvoiceList(Request $request)
    {
        try {
            // $varAPIWebToken = Session::get('SessionLogin');
            // $varDataCustomer = Helper_APICall::setCallAPIGateway(
            //     Helper_Environment::getUserSessionID_System(),
            //     $varAPIWebToken, 
            //     'dataPickList.customerRelation.getCustomer', 
            //     'latest', 
            //     [
            //         'parameter'     => null,
            //         'SQLStatement'  => [
            //             'pick'      => null,
            //             'sort'      => null,
            //             'filter'    => null,
            //             'paging'    => null
            //         ]
            //     ]
            // );

            // if ($varDataCustomer['metadata']['HTTPStatusCode'] !== 200) {
            //     return response()->json($varDataCustomer);
            // }

            $varDataCustomer = [
                'data'      => [
                    'data'  => [
                        [
                            'sys_ID'    => '1',
                            'sys_Text'  => 'INV/QDC/2025/000001'
                        ],
                        [
                            'sys_ID'    => '2',
                            'sys_Text'  => 'INV/QDC/2025/000002'
                        ],
                        [
                            'sys_ID'    => '3',
                            'sys_Text'  => 'INV/QDC/2025/000003'
                        ],
                        [
                            'sys_ID'    => '4',
                            'sys_Text'  => 'INV/QDC/2025/000004'
                        ],
                        [
                            'sys_ID'    => '5',
                            'sys_Text'  => 'INV/QDC/2025/000005'
                        ],
                        [
                            'sys_ID'    => '6',
                            'sys_Text'  => 'INV/QDC/2025/000006'
                        ],
                        [
                            'sys_ID'    => '7',
                            'sys_Text'  => 'INV/QDC/2025/000007'
                        ],
                        [
                            'sys_ID'    => '8',
                            'sys_Text'  => 'INV/QDC/2025/000008'
                        ],
                        [
                            'sys_ID'    => '9',
                            'sys_Text'  => 'INV/QDC/2025/000009'
                        ],
                        [
                            'sys_ID'    => '10',
                            'sys_Text'  => 'INV/QDC/2025/000010'
                        ],
                    ]
                ]
            ];

            return response()->json($varDataCustomer['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getInvoiceList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
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

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.finance.getAdvance',
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

        if ($varData['metadata']['HTTPStatusCode'] !== 200) {
            return response()->json($varData);
        }

        $DataAdvance = $varData['data']['data'];

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

    public function getAdvanceSettlement(Request $request)
    {
        try {
            $response = $this->advanceSettlementService->dataPickList();

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            return response()->json($response['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getAdvanceSettlement: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getReimbursementList(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'dataPickList.finance.getReimbursement',
                'latest',
                [
                    'parameter'     => null,
                    'SQLStatement'  => [
                        'pick'      => null,
                        'sort'      => null,
                        'filter'    => null,
                        'paging'    => null
                    ]
                ]
            );

            return response()->json($varData['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getReimbursementList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
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

        return response()->json($varDataPerson['data']['data']);
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
                // 'transaction.read.dataList.supplyChain.getDeliveryOrder', 
                'dataPickList.supplyChain.getDeliveryOrder',
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

            return response()->json($varData['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getDeliveryOrderList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getDeliveryOrderDetail(Request $request)
    {
        try {
            $varAPIWebToken     = Session::get('SessionLogin');
            $delivery_order_id  = $request->input('delivery_order_id');

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.supplyChain.getDeliveryOrderDetail',
                'latest',
                [
                'parameter' => [
                    'deliveryOrder_RefID' => (int) $delivery_order_id
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
                $compact = [
                    "statusCode"    => $varData['metadata']['HTTPStatusCode'],
                    "message"       => $varData['data']['message']
                ];

                return response()->json($compact);
            }

            return response()->json($varData['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getDeliveryOrderDetail: " . $th->getMessage());
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
                'dataPickList.supplyChain.getPurchaseRequisition', 
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

    public function getLoanList(Request $request) 
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $userSession    = Helper_Environment::getUserSessionID_System();

            $varData = Helper_APICall::setCallAPIGateway(
                $userSession,
                $varAPIWebToken, 
                'dataPickList.finance.getLoan', 
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
            Log::error("Error at getLoanList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getPurchaseRequisitionDetail(Request $request)
    {
        try {
            $varAPIWebToken             = Session::get('SessionLogin');
            $userSession                = Helper_Environment::getUserSessionID_System();
            $purchase_requisition_id    = $request->input('purchase_requisition_id');

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail', 
                'latest', 
                [
                'parameter' => [
                    'purchaseRequisition_RefID' => (int) $purchase_requisition_id
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
            Log::error("Error at getPurchaseRequisitionDetail: " . $th->getMessage());
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

            return response()->json($varData['data']['data']);
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

            return response()->json($varData['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getVAT: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getPurchaseOrderList(Request $request) 
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            $start  = $request->input('start', 0);
            $length = $request->input('length', 10);
            $offset = $start;
            $limit  = $length;

            $searchValue = $request->input('search.value');
            $filter = null;

            if (!empty($searchValue)) {
                $filter = '"Sys_Text" = \'' . addslashes($searchValue) . '\'';
            }

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'dataPickList.supplyChain.getPurchaseOrder', 
                'latest', 
                [
                    'parameter' => null,
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => '"Sys_Text" DESC',
                        'filter' => $filter,
                        'paging' => "LIMIT {$limit} OFFSET {$offset}"
                    ]
                ]
            );

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json([
                    'draw'              => intval($request->input('draw')),
                    'recordsTotal'      => 0,
                    'recordsFiltered'   => 0,
                    'data'              => []
                ]);
            }

            $totalRecords = $varData['data']['totalRecords'];

            return response()->json([
                'draw'              => intval($request->input('draw')),
                'recordsTotal'      => $totalRecords,
                'recordsFiltered'   => $totalRecords,
                'data'              => $varData['data']['data']
            ]);
        } catch (\Throwable $th) {
            Log::error("Error at getPurchaseOrderList: " . $th->getMessage());

            return response()->json([
                'draw'              => intval($request->input('draw')),
                'recordsTotal'      => 0,
                'recordsFiltered'   => 0,
                'data'              => [],
                'error'             => 'Internal Server Error'
            ]);
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

            return response()->json($varData['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getPurchaseOrderDetail: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getBusinessTripList(Request $request)
    {
        try {
            $response = $this->businessTripService->dataPickList();

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            return response()->json($response['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getBusinessTripList: " . $th->getMessage());
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

    public function getTimesheetList(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $userSession    = Helper_Environment::getUserSessionID_System();

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'dataPickList.humanResource.getPersonWorkTimeSheet', 
                'latest',
                [
                'parameter' => [
                    ]
                ]
            );

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');
            }

            return response()->json($varData['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getTimesheetList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getWarehouseList(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'dataPickList.supplyChain.getWarehouse', 
                'latest',
                [
                'parameter' => [
                    ]
                ]
            );

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');
            }

            return response()->json($varData['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getTimesheetList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}
