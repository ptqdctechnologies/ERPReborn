<?php

namespace App\Http\Controllers\Process\BusinessTrip;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;

class BusinessTripSettlementController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionBusinessTripSettllementRequester");
        $request->session()->forget("SessionBusinessTripSettllementRequesterID");
        $var = 0;
        if(!empty($_GET['var'])){
           $var =  $_GET['var'];
        }
        
        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusAdvanceRevisi' => 0,
            'statusPrRevisi' => 0,
            'statusPr' => 0,
            'statusRevisi' => 0,
        ];
        
        return view('Process.BusinessTrip.BusinessTripSettlement.Transactions.CreateBusinessTripSettlement', $compact);
    }

    public function StoreValidateBusinessTripSettlementRequester(Request $request)
    {
        
        $tamp = 0;
        $tamp2 = 0;
        $status = 200;
        $varDataAdvanceList['data'] = [];
        $requester_id = $request->input('requester_id');
        $requester_name = $request->input('requester_name');
        $bussinesTripRefID = $request->input('bussinesTripRefID');

        $data = Session::get("SessionBusinessTripSettllementRequester");
        $dataID = Session::get("SessionBusinessTripSettllementRequesterID");
        if (Session::has("SessionBusinessTripSettllementRequester")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $bussinesTripRefID) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                for ($i = 0; $i < count($dataID); $i++) {
                    if ($dataID[$i] != $requester_id) {
                        $status = 500;
                        $tamp2 = 1;
                        break;
                    }
                }

                if ($tamp2 == 0){

                    $varDataAdvanceList = $this->BussinesTripDetailComplexByRequesterID($bussinesTripRefID);

                    Session::push("SessionBusinessTripSettllementRequester", $bussinesTripRefID);
                    Session::push("SessionBusinessTripSettllementRequesterID", $requester_id);
                }
            } else {
                $status = 501;
            }
        } else {

            $varDataAdvanceList = $this->BussinesTripDetailComplexByRequesterID($bussinesTripRefID);

            Session::push("SessionBusinessTripSettllementRequester", $bussinesTripRefID);
            Session::push("SessionBusinessTripSettllementRequesterID", $requester_id);
        }
        $compact = [
            'status' => $status,
            'requester_id' => $requester_id,
            'requester_name' => $requester_name,
            'data' => $varDataAdvanceList,
        ];

        return response()->json($compact);
    }

    public function BussinesTripDetailComplexByRequesterID($bussinesTripRefID)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceReport',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $bussinesTripRefID,
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

        // dd($filteredArray['data'][0]['document']['content']['details']['itemList']);
        return $filteredArray['data'][0]['document']['content']['details']['itemList'];
    }

    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
        $count_product = count($input['var_product_id']);

        $varAPIWebToken = $request->session()->get('SessionLogin');

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
            "advnumber" => 'ASF-0000001',
        ];

        return response()->json($compact);
    }

    public function BusinessTripRequestByBudgetID(Request $request)
    {
        $projectcode = $request->input('projectcode');
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataAdvanceRequest = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.finance.getAdvance', 
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
            'DataAdvanceRequest' => $varDataAdvanceRequest['data'],
        ];
        return response()->json($compact);
    }

    public function BusinessTripSettlementListData(Request $request)
    {
        
        try {

            // if (Redis::get("DataListAdvance") == null) {
                $varAPIWebToken = Session::get('SessionLogin');
                Helper_APICall::setCallAPIGateway(
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
            // }

            $DataListAdvance = json_decode(
                Helper_Redis::getValue(
                    Helper_Environment::getUserSessionID_System(),
                    "DataListAdvance"
                ),
                true
            );


            $collection = collect($DataListAdvance);

            $project_id = $request->project_id;
            $site_id = $request->site_id;

            if ($project_id != "") {
                $collection = $collection->where('CombinedBudget_RefID', $project_id);
            }
            if ($site_id != "") {
                $collection = $collection->where('CombinedBudgetSection_RefID', $site_id);
            }

            $collection = $collection->all();

            return response()->json($collection);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }


    public function SearchBusinessTripRequest(Request $request)
    {
        Session::forget("SessionBusinessTripSettllementRequester");
        Session::forget("SessionBusinessTripSettllementRequesterID");

        if (Redis::get("DataListAdvance") == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            Helper_APICall::setCallAPIGateway(
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
        }

        $DataListAdvance = json_decode(
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "DataListAdvance"
            ),
            true
        );

        $collection = collect($DataListAdvance);

        $budget_code = $request->input('budget_code');
        $sub_budget_code = $request->input('sub_budget_code');
        $requester = $request->input('requester');
        $trano = $request->input('trano');

        if ($budget_code != "") {
            $collection = $collection->filter(function ($item) use ($budget_code) {
                return strpos($item['CombinedBudgetCode'], $budget_code) !== false;
            });
        }
        if ($sub_budget_code != "") {
            $collection = $collection->filter(function ($item) use ($sub_budget_code) {
                return strpos($item['CombinedBudgetSectionCode'], $sub_budget_code) !== false;
            });
        }
        if ($requester != "") {
            $collection = $collection->filter(function ($item) use ($requester) {
                return strpos($item['RequesterWorkerName'], $requester) !== false;
            });
        }
        if ($trano != "") {
            $collection = $collection->filter(function ($item) use ($trano) {
                return strpos($item['DocumentNumber'], $trano) !== false;
            });
        }

        return response()->json($collection->all());
    }

    public function BusinessTripSettlementListDataById(Request $request)
    {
        $advance_RefID = $request->input('var_recordID');
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataAdvanceList = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.finance.getAdvanceDetail',
            'latest',
            [
                'parameter' => [
                    'advance_RefID' => (int) $advance_RefID,
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );

        // dd($varDataAdvanceList);

        return response()->json($varDataAdvanceList['data']);
    }

    public function BusinessTripSettlementListCartRevision(Request $request)
    {
        $var_recordID = $request->input('var_recordID');
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.finance.getAdvanceDetail',
            'latest',
            [
                'parameter' => [
                    'advance_RefID' => (int) $var_recordID,
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
    
    public function RevisionBusinessTripSettlementIndex(Request $request)
    {
        // $varAPIWebToken = $request->session()->get('SessionLogin');
        // $request->session()->forget("SessionBusinessTripSettllement");
        // $request->session()->forget("SessionBusinessTripSettllementRequester");

        // $varDataAdvanceSettlementRevision = Helper_APICall::setCallAPIGateway(
        //     Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'report.form.documentForm.finance.getAdvance', 
        //     'latest',
        //     [
        //     'parameter' => [
        //         'recordID' => (int) $request->searchBsfNumberRevisionId,
        //         ]
        //     ]
        //     );

        // // dd($varDataAdvanceSettlementRevision);
        // $compact = [
        //     'dataRevisi' => $varDataAdvanceSettlementRevision['data'][0]['document']['content']['general'],
        //     'trano' => $varDataAdvanceSettlementRevision['data'][0]['document']['header']['number'],
        //     'var_recordID' => $request->searchBsfNumberRevisionId,
        //     'varAPIWebToken' => $varAPIWebToken,
        //     'statusRevisi' => 1,
        // ];

        // return view('Process.BusinessTrip.BusinessTripSettlement.Transactions.RevisionBusinessTripSettlement', $compact);

        try {

            $searchBsfNumberRevisionId = $request->input('searchBsfNumberRevisionId');
            $varAPIWebToken = Session::get('SessionLogin');

            // DATA REVISION
            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceReport',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $searchBsfNumberRevisionId,
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
            // dd($filteredArray);
            $compact = [
                'dataHeader' => $filteredArray['data'][0]['document']['header'],
                'dataContent' => $filteredArray['data'][0]['document']['content']['general'],
                'dataDetail' => $filteredArray['data'][0]['document']['content']['details']['itemList'],
                'varAPIWebToken' => $varAPIWebToken,
                'statusRevisi' => 1,
                'statusFinalApprove' => "No",
            ];
            return view('Process.BusinessTrip.BusinessTripSettlement.Transactions.RevisionBusinessTripSettlement', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }
}