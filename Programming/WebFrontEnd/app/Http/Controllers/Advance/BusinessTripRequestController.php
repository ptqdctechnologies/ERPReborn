<?php

namespace App\Http\Controllers\Advance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

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
    
        return view('Advance.BusinessTrip.Transactions.CreateBusinessTripRequest', $compact);
    }
    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $input = $request->all();
        // dd($input);

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
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataAdvanceRequest = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
            ]
            );
        $compact = [
            'data' => $varDataAdvanceRequest['data'],
            'TransactionMenu' => "BussinesTripRequest",
            'linkReportTransaction' => "report.form.documentForm.finance.getAdvance"
        ];
            
        return response()->json($compact);
    }
    
    public function RevisionBusinessTripRequestIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionBusinessTripRequest");

        $varDataAdvanceRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'report.form.documentForm.finance.getAdvance', 
        'latest',
        [
        'parameter' => [
            'recordID' => (int) $request->searchBrfNumberRevisionId,
            ]
        ]
        );

        $varDataAccomodation = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'dataPickList.humanResource.getBusinessTripAccommodationArrangementsType', 
            'latest',
            [
            'parameter' => [
                ]
            ]
            );

        $varDataTransport = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'dataPickList.humanResource.getBusinessTripTransportationType', 
            'latest',
            [
            'parameter' => [
                ]
            ]
            );

        $varDataApplicable = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'dataPickList.master.getPaymentDisbursementMethod', 
            'latest',
            [
            'parameter' => [
                ]
            ]
            );

        $compact = [
            'dataAdvanceRevisions' => $varDataAdvanceRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'dataRequester' => $varDataAdvanceRevision['data'][0]['document']['content']['involvedPersons']['requester'],
            'var_recordID' => $request->searchBrfNumberRevisionId,
            'varAPIWebToken' => $varAPIWebToken,
            'spasi' => "<span style='color: white;'>_____</span>",
            'statusRevisi' => 1,
            'varDataAccomodation' => $varDataAccomodation['data']['data'],
            'varDataTransport' => $varDataTransport['data']['data'],
            'varDataApplicable' => $varDataApplicable['data'],
            'trano' => $varDataAdvanceRevision['data'][0]['document']['header']['number'],
        ];
        return view('Advance.BusinessTrip.Transactions.RevisionBusinessTripRequest', $compact);
    }

    public function BusinessTripRequestListCartRevision(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $advance_RefID = $request->input('advance_RefID');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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