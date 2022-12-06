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
        // dd($varDataApplicable);

        $var = 0;
        if(!empty($_GET['var'])){
           $var =  $_GET['var'];
        }
        
        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'varDataAccomodation' => $varDataAccomodation['data']['data'],
            'varDataTransport' => $varDataTransport['data']['data'],
            'varDataApplicable' => $varDataApplicable['data'],
            'spasi' => "<span style='color: white;'>_____</span>"
        ];
    
        return view('Advance.BusinessTrip.Transactions.CreateBusinessTripRequest', $compact);
    }
    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $input = $request->all();
        // dd($input);

        $TransportationTypeID = array_map('intval', explode(',', $input['TransportType']));

        $detailBrf = [];
        $sequenceBrf = [];

        for($m = 0; $m < $input['totalSequence']; $m++){

            $paymentSequenceID = explode(",", $input['paymentSequenceID'][$m]);
            $paymentSequenceValue = explode(",", $input['paymentSequenceValue'][$m]);

            for($n =0; $n < $input['totalPaymentSequence']; $n++){

                //DETAIL
                $detailBrf[$n] = [
                    'entities' => [
                        'businessTripCostComponentEntity_RefID' => (int) $paymentSequenceID[$n],
                        'amountCurrency_RefID' => 62000000000001,
                        'amountCurrencyValue' => (int) $paymentSequenceValue[$n],
                        'amountCurrencyExchangeRate' => 1,
                        'remarks' => '5 Des 2022'                                    
                    ]                                   
                ];
            }

            //SEQUENCE
            $sequenceBrf[$m] = [
                'entities' => [
                    'sequence' => $m + 1,
                    'requesterWorkerJobsPosition_RefID' => (int)$input['request_name_id'],
                    'startDateTimeTZ' => '2022-10-10',
                    'finishDateTimeTZ' => '2022-10-14',
                    'businessTripAccommodationArrangementsType_RefID' =>  (int)$input['paymentApplicable'],
                    'businessTripTransportationType_RefIDArray' => $TransportationTypeID,
                    'remarks' => 'Catatan',
                    'additionalData' => [
                        'itemList' => [
                            "items" => $detailBrf
                        ]
                    ]
                ]
            ];
        }
        //HEADER
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.create.humanResource.setPersonBusinessTrip', 
            'latest', 
            [
            'entities' => [
                "documentDateTimeTZ" => '2022-10-10',
                'combinedBudgetSectionDetail_RefID' => (int) $input['var_combinedBudget'],
                'paymentDisbursementMethod_RefID' => (int) $input['paymentApplicable'],
                "additionalData" => [
                    "itemList" => [
                        "items" => $sequenceBrf
                        ]
                    ]
                ]
            ]                    
        );

        $compact = [
            "brfnumber"=> $varData['data']['recordID'],
        ];

        return response()->json($compact); 
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
            
        return response()->json($varDataAdvanceRequest['data']);
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
        $compact = [
            'dataAdvanceRevisions' => $varDataAdvanceRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'dataRequester' => $varDataAdvanceRevision['data'][0]['document']['content']['involvedPersons']['requester'],
            'var_recordID' => $request->searchBrfNumberRevisionId,
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
        // dd($varData);

        foreach($varData['data'] as $varDatas){
            $request->session()->push("SessionBusinessTripRequest", (string)$varDatas['combinedBudget_SubSectionLevel1_RefID']);
            $request->session()->push("SessionBusinessTripRequest", (string)$varDatas['product_RefID']);
        }
        return response()->json($varData['data']);
    }
}