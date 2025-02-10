<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use Illuminate\Support\Facades\Log;

class MyDocumentController extends Controller
{
    public function index(Request $request)
    {
        return view('Documents.Transactions.IndexMyDocument');
    }

    // public function CustomeFormatData()
    // {
    //     $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
    //     $ShowMyDocumentListData = json_decode(
    //         Helper_Redis::getValue(
    //             Helper_Environment::getUserSessionID_System(),
    //             "ShowMyDocumentListData" . $SessionWorkerCareerInternal_RefID
    //         ),
    //         true
    //     );

    //     // dd($ShowMyDocumentListData);

    //     $filteredArray = [];
    //     if (isset($ShowMyDocumentListData)) {
    //         for ($i = 0; $i < count($ShowMyDocumentListData); $i++) {
    //             $filteredArray[$i]['businessDocumentNumber'] = $ShowMyDocumentListData[$i]['entities']['businessDocumentNumber'];
    //             $filteredArray[$i]['businessDocumentDateTimeTZ'] = $ShowMyDocumentListData[$i]['entities']['businessDocumentDateTimeTZ'];
    //             $filteredArray[$i]['formDocumentNumber_RefID'] = $ShowMyDocumentListData[$i]['entities']['formDocumentNumber_RefID'];
    //             $filteredArray[$i]['businessDocument_RefID'] = $ShowMyDocumentListData[$i]['entities']['businessDocument_RefID'];
    //             $filteredArray[$i]['BusinessDocumentType_RefID'] = $ShowMyDocumentListData[$i]['entities']['businessDocumentType_RefID'];
    //             $filteredArray[$i]['BusinessDocumentTypeName'] = $ShowMyDocumentListData[$i]['entities']['businessDocumentTypeName'];
    //             if ($ShowMyDocumentListData[$i]['entities']['combinedBudgetID'] != []) {
    //                 $filteredArray[$i]['CombinedBudgetID'] = $ShowMyDocumentListData[$i]['entities']['combinedBudgetID'][0];
    //             } else {
    //                 $filteredArray[$i]['CombinedBudgetID'] = $ShowMyDocumentListData[$i]['entities']['combinedBudgetID'];
    //             }
    //             if ($ShowMyDocumentListData[$i]['entities']['combinedBudgetCode'] != []) {
    //                 $filteredArray[$i]['combinedBudgetCode'] = $ShowMyDocumentListData[$i]['entities']['combinedBudgetCode'][0];
    //             } else {
    //                 $filteredArray[$i]['combinedBudgetCode'] = $ShowMyDocumentListData[$i]['entities']['combinedBudgetCode'];
    //             }
    //             $filteredArray[$i]['workFlowPathSubmitterRemarks'] = $ShowMyDocumentListData[$i]['entities']['workFlowPathSubmitterRemarks'];
    //             $filteredArray[$i]['previousWorkFlowPathApproverName'] = $ShowMyDocumentListData[$i]['entities']['previousWorkFlowPathApproverName'];
    //             $filteredArray[$i]['previousWorkFlowPathActionName'] = $ShowMyDocumentListData[$i]['entities']['previousWorkFlowPathActionName'];
    //         }
    //     }

    //     // Log::info("filteredArray: " . $filteredArray);

    //     return $filteredArray;
    // }

    public function MyDocumentListDataFilter(Request $request)
    {

        $filteredArray = $this->CustomeFormatData();

        $trano = $request->trano;
        $projectid = $request->projectid;
        $DocumentType = $request->DocumentType;

        $collection = collect($filteredArray);

        if ($trano != "") {
            $collection = $collection->where('businessDocumentNumber', $trano);
        }
        if ($projectid != "") {
            $collection = $collection->where('CombinedBudgetID', $projectid);
        }
        if ($DocumentType != "") {
            $collection = $collection->where('BusinessDocumentType_RefID', $DocumentType);
        }

        $collection = $collection->all();

        return response()->json($collection);
    }

    public function ShowMyDocumentListData(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
            $dataAPIReport = [];

            $apiResponse = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'report.form.resume.master.getBusinessDocumentIssuanceDisposition',
                'latest',
                [
                    'parameter' => [
                        'recordID' => (int) $SessionWorkerCareerInternal_RefID,
                        'dataFilter' => [
                            'businessDocumentNumber' => null,
                            'businessDocumentType_RefID' => null,
                            'combinedBudget_RefID' => null
                        ]
                    ]
                ],
                false
            );
            
            if (isset($apiResponse['metadata']) && $apiResponse['metadata']['HTTPStatusCode'] == 200) {
                $dataAPIReport = $apiResponse['data'][0]['document']['content']['itemList']['ungrouped'];
            } else {
                throw new \Exception("API call failed with response: " . json_encode($apiResponse['data']['message']));
            }

            return response()->json($dataAPIReport);
        } catch (\Exception $th) {
            Log::error("Error at ShowMyDocumentListData: " . $th->getMessage());

            return response()->json(['error' => 'Process Error'], 500);
        }
    }

    // public function ShowMyDocumentListData(Request $request)
    // {
    //     $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
    //     $varAPIWebToken = Session::get('SessionLogin'); 

    //     if (Redis::get("ShowMyDocumentListData" . $SessionWorkerCareerInternal_RefID) == null) {
    //         Helper_APICall::setCallAPIGateway(
    //             Helper_Environment::getUserSessionID_System(),
    //             $varAPIWebToken,
    //             'report.form.resume.master.getBusinessDocumentIssuanceDisposition',
    //             'latest',
    //             [
    //                 'parameter' => [
    //                     'recordID' => (int)$SessionWorkerCareerInternal_RefID,
    //                     'dataFilter' => [
    //                         'businessDocumentNumber' => null,
    //                         'businessDocumentType_RefID' => null,
    //                         'combinedBudget_RefID' => null
    //                     ]
    //                 ]
    //             ],
    //             false
    //         );
    //     }

    //     $filteredArray = $this->CustomeFormatData();

    //     return response()->json($filteredArray);
    // }
}
