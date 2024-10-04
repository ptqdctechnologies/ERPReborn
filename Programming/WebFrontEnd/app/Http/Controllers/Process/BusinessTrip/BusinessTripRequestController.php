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

class BusinessTripRequestController extends Controller
{
    public function index(Request $request)
    {   
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionBusinessTripRequest");

        $var = 0;
        if(!empty($_GET['var'])){
           $var =  $_GET['var'];
        }
        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
        ];
    
        return view('Process.BusinessTrip.BusinessTripRequest.Transactions.CreateBusinessTripRequest', $compact);
    }
    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $input = $request->all();

        $TransportationTypeID = array_map('intval', explode(',', $input['TransportTypeApplicable']));
        $detailBrf = [];

        //DETAIL
        $count_product = count($input['var_product_id']);
        for($n =0; $n < $count_product; $n++){
            $detailBrf[$n] = [
                [
                'entities' => [
                    'businessTripCostComponentEntity_RefID' => 81000000000001,
                    'amountCurrency_RefID' => (int)$input['var_currency_id'][$n],
                    'amountCurrencyValue' => (int)$input['var_allowance'][$n],
                    'amountCurrencyExchangeRate' => 1,
                    'remarks' => ''                                    
                    ]                                   
                ],
                [
                'entities' => [
                    'businessTripCostComponentEntity_RefID' => 81000000000003,
                    'amountCurrency_RefID' => (int)$input['var_currency_id'][$n],
                    'amountCurrencyValue' => (int)$input['var_accomodation'][$n],
                    'amountCurrencyExchangeRate' => 1,
                    'remarks' => ''                                    
                    ]                                   
                ],
                [
                'entities' => [
                    'businessTripCostComponentEntity_RefID' => 81000000000004,
                    'amountCurrency_RefID' => (int)$input['var_currency_id'][$n],
                    'amountCurrencyValue' => (int)$input['var_other'][$n],
                    'amountCurrencyExchangeRate' => 1,
                    'remarks' => ''  
                    ]
                ],
            ];
        }

        // dd($detailBrf);

        //HEADER
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.create.humanResource.setPersonBusinessTrip', 
            'latest', 
            [
                'entities' => 
                [
                    "documentDateTimeTZ" => $input['var_date'],
                    'combinedBudgetSectionDetail_RefID' => (int) $input['var_combinedBudgetSectionDetail_RefID'],
                    'paymentDisbursementMethod_RefID' => (int) $input['paymentApplicable'],
                    "additionalData" => [
                        "itemList" => [
                            'items' => [
                                    [
                                    'entities' => [
                                        'sequence' => 1,
                                        'requesterWorkerJobsPosition_RefID' => (int)$input['request_name_id'],
                                        'startDateTimeTZ' => $input['dateCommance'],
                                        'finishDateTimeTZ' => $input['dateEnd'],
                                        'businessTripAccommodationArrangementsType_RefID' =>  (int)$input['accomodationArrange'],
                                        'businessTripTransportationType_RefIDArray' => $TransportationTypeID,
                                        'remarks' => 'Catatan',
                                        'additionalData' => [
                                            'itemList' => [
                                                'items' =>  $detailBrf
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]                    
        );

        dd($varData);


        // $compact = [
        //     "brfnumber"=> $varData['data']['recordID'],
        // ];

        // return response()->json($compact); 
    }
    
    public function BusinessTripRequestListData(Request $request)
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
    
    public function RevisionBusinessTripRequestIndex(Request $request)
    {
        try {

            $searchBrfNumberRevisionId = $request->input('searchBrfNumberRevisionId');
            $varAPIWebToken = Session::get('SessionLogin');

            // DATA REVISION
            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceReport',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $searchBrfNumberRevisionId,
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
            return view('Process.BusinessTrip.BusinessTripRequest.Transactions.RevisionBusinessTripRequest', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }

        // $varAPIWebToken = $request->session()->get('SessionLogin');
        // $request->session()->forget("SessionBusinessTripRequest");

        // $varDataAdvanceRevision = Helper_APICall::setCallAPIGateway(
        //     Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'report.form.documentForm.finance.getAdvance', 
        //     'latest',
        //     [
        //     'parameter' => [
        //         'recordID' => (int) $request->input('searchBrfNumberRevisionId'),
        //         ]
        //     ]
        //     );
        // // dd($varDataAdvanceRevision);
        // $compact = [
        //     'dataRevisi' => $varDataAdvanceRevision['data'][0]['document']['content']['general'],
        //     'var_recordID' => $request->input('searchBrfNumberRevisionId'),
        //     'varAPIWebToken' => $varAPIWebToken,
        //     'statusRevisi' => 1,
        //     'trano' => $varDataAdvanceRevision['data'][0]['document']['header']['number'],
        // ];
        // return view('Process.BusinessTrip.BusinessTripRequest.Transactions.RevisionBusinessTripRequest', $compact);
    }

    public function BusinessTripRequestListCartRevision(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $advance_RefID = $request->input('advance_RefID');

        $varData = Helper_APICall::setCallAPIGateway(
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
        return response()->json($varData['data']);
    }
}