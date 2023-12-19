<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class CheckDocumentController extends Controller
{
    // FUNCTION INDEX 
    public function index()
    {
        $compact = [
            'var' => 0,
            'businessDocument_RefID' => "",
            'businessDocumentNumber' => "",
            'sourceData' => 0,

        ];

        return view('Documents.Transactions.IndexCheckDocument', $compact);
    }

    // FUNCTION FOR SHOW DOCUMENT BY ID 
    public function GetAllDocumentTypeByID($varAPIWebToken, $businessDocument_RefID)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.general.getAllDocumentTypeByID',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $businessDocument_RefID,
                ]
            ],
            false
        );

        $varData = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "ShowCheckDocumentTypeID"
            ),
            true
        );

        // dd($varData);

        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
        $statusApprover = "No";
        $nextApprover = 0;
        $prevApprover = 0;
        $businessDocument_ID = 0;
        if (count($varData) != 0) {
            $prevApprover = $varData[0]['document']['content']['general']['workFlow']['historyList'][0]['CurrentApproverEntity_RefID'];
            $nextApprover = $varData[0]['document']['content']['general']['workFlow']['historyList'][0]['NextApproverEntity_RefID'];
            $businessDocument_ID = $varData[0]['document']['content']['general']['businessDocument']['businessDocumentList']['recordID'];

            if ($SessionWorkerCareerInternal_RefID == $nextApprover) {
                $statusApprover = "Yes";
            }
        }

        $compact = [
            'data' => $varData,
            'statusApprover' => $statusApprover,
            'businessDocument_ID' => $businessDocument_ID,
            'prevApprover' => $prevApprover

        ];

        return $compact;
    }

    // FUNCTION FOR SHOW DOCUMENT FORM SUBMIT IN CHECK DOCUMENT 
    public function ShowDocument(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');

        $businessDocumentNumber = $request->input('businessDocumentNumber');
        $businessDocument_RefID = $request->input('businessDocument_RefID');
        if (isset($businessDocument_RefID) || isset($businessDocumentNumber)) {
            if (isset($businessDocument_RefID)) {

                // CALL FUNCTION SHOW DATA BY ID
                $varDataWorkflow = $this->GetAllDocumentTypeByID($varAPIWebToken, $businessDocument_RefID);
            } else {
                // CALL FUNCTION SHOW DATA BY NUMBER
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'report.form.documentForm.general.getAllDocumentTypeByFormNumber',
                    'latest',
                    [
                        'parameter' => [
                            'formNumber' => $businessDocumentNumber,
                            'approverEntity_RefID' => (int) $SessionWorkerCareerInternal_RefID
                        ]
                    ],
                    false
                );

                $varData = json_decode(
                    \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        "ShowCheckDocumentTypeID"
                    ),
                    true
                );

                $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
                $statusApprover = "No";
                $nextApprover = 0;
                $prevApprover = 0;
                $businessDocument_ID = 0;
                if (count($varData) != 0) {
                    $prevApprover = $varData[0]['document']['content']['general']['workFlow']['historyList'][0]['CurrentApproverEntity_RefID'];
                    $nextApprover = $varData[0]['document']['content']['general']['workFlow']['historyList'][0]['NextApproverEntity_RefID'];
                    $businessDocument_ID = $varData[0]['document']['content']['general']['businessDocument']['businessDocumentList']['recordID'];

                    if ($SessionWorkerCareerInternal_RefID == $nextApprover) {
                        $statusApprover = "Yes";
                    }
                }

                $compact = [
                    'data' => $varData,
                    'statusApprover' => $statusApprover,
                    'businessDocument_ID' => $businessDocument_ID,
                    'prevApprover' => $prevApprover

                ];
            }

            if (count($varDataWorkflow['data']) > 0) {
                $compact = [
                    'var' => 1,
                    'dataWorkflow' => $varDataWorkflow['data'][0]['document']['content']['general']['workFlow']['historyList'],
                    'dataTransaction' => $varDataWorkflow['data'][0]['document'],
                    'businessDocument_RefID' => $varDataWorkflow['data'][0]['document']['header']['recordID'],
                    'businessDocumentNumber' => $varDataWorkflow['data'][0]['document']['header']['number'],
                    'businessDocumentTitle' => $varDataWorkflow['data'][0]['document']['header']['title'],
                    'statusApprover' => $varDataWorkflow['statusApprover'],
                    'businessDocument_ID' => $varDataWorkflow['businessDocument_ID'],
                    'prevApprover' => $varDataWorkflow['prevApprover'],
                    'sourceData' => 0,
                ];

                return view('Documents.Transactions.IndexCheckDocument', $compact);
            } else {
                return redirect()->route('CheckDocument.index')->with('NotFound', 'Data Not Found');
            }
        } else {
            return redirect()->route('CheckDocument.index')->with('NotFound', 'Data Cannot Empty');
        }
    }

    // FUNCTION FOR SHOW DOCUMENT BY CLICK DATA IN MY DOCUMENT 
    public function ShowDocumentByID(Request $request)
    {
        $businessDocument_RefID = (int) $request->input('businessDocument_RefID');

        $varAPIWebToken = $request->session()->get('SessionLogin');

        // CALL FUNCTION SHOW DATA BY ID
        $varDataWorkflow = $this->GetAllDocumentTypeByID($varAPIWebToken, $businessDocument_RefID);

        if (count($varDataWorkflow['data']) > 0) {
            $compact = [
                'var' => 1,
                'dataWorkflow' => $varDataWorkflow['data'][0]['document']['content']['general']['workFlow']['historyList'],
                'dataTransaction' => $varDataWorkflow['data'][0]['document'],
                'businessDocument_RefID' => $varDataWorkflow['data'][0]['document']['header']['recordID'],
                'businessDocumentNumber' => $varDataWorkflow['data'][0]['document']['header']['number'],
                'businessDocumentTitle' => $varDataWorkflow['data'][0]['document']['header']['title'],
                'statusApprover' => $varDataWorkflow['statusApprover'],
                'businessDocument_ID' => $varDataWorkflow['businessDocument_ID'],
                'prevApprover' => $varDataWorkflow['prevApprover'],
                'sourceData' => 1,
            ];
            return view('Documents.Transactions.IndexCheckDocument', $compact);
        } else {
            return redirect()->route('MyDocument.index')->with('NotFound', 'Data Not Found');
        }
    }

    // FUNCTION FOR SHOW LIST DATA BY DOCUMENT TYPE 
    public function ShowDocumentListData(Request $request)
    {
        $DocumentType = $request->input('DocumentType');

        if (Redis::get("CheckDocumentTypeID" . $DocumentType) == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'report.form.resume.master.getBusinessDocumentFilterByDocumentTypeID',
                'latest',
                [
                    'parameter' => [
                        'recordID' => (int)$DocumentType
                    ]
                ],
                false
            );
        }


        $varData = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "CheckDocumentTypeID" . $DocumentType
            ),
            true
        );

        return response()->json($varData);
    }
}
