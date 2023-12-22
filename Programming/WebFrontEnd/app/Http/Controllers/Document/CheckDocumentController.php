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
            'submitter_ID' => 0,
            'statusDocument' => 0

        ];

        return view('Documents.Transactions.IndexCheckDocument', $compact);
    }

    // FUNCTION FOR SHOW DOCUMENT BY ID 
    public function GetAllDocumentTypeByID($varAPIWebToken, $Document, $filterType, $souceData)
    {
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
        $varAPIWebToken = Session::get('SessionLogin');

        if (Redis::get("DataListAdvanceDetailComplex") == null) {
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceDetailComplex',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => 1,
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

        $DataAdvanceDetailComplex = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "DataListAdvanceDetailComplex"
            ),
            true
        );

        $collection = collect($DataAdvanceDetailComplex);
        if($filterType == "ID"){
            $collection = $collection->where('Sys_ID_Advance', $Document);
        }
        else if($filterType == "Number"){
            $collection = $collection->where('DocumentNumber', $Document);
        }

        $num = 0;
        $filteredArray = [];

        foreach ($collection as $collections) {
            $filteredArray[$num] = $collections;
            $num++;
        }

        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
        $statusApprover = "No";
        $nextApprover = 0;
        $submitter_ID = 0;
        $businessDocument_ID = 0;
        $statusDocument = 0;
        $DataWorkflowHistory = [];

        if (count($filteredArray) != 0) {
            $businessDocument_ID = $filteredArray[0]['BusinessDocument_RefID'];

            $DataWorkflowHistory = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'userAction.documentWorkFlow.approvalStage.getApprovementHistoryList', 
                'latest',
                [
                'parameter' => [
                    'businessDocument_RefID' => (int) $businessDocument_ID
                    ]
                ],
                false
            );

            if($DataWorkflowHistory['metadata']['HTTPStatusCode'] == 200){
                $submitter_ID = $DataWorkflowHistory['data'][0]['approverEntity_RefID'];
                $nextApprover = $DataWorkflowHistory['data'][count($DataWorkflowHistory['data']) - 1]['nextApproverEntity_RefID'];
                $cek = 0;
            }
            else{
                $cek = 1;
            }

            if ($SessionWorkerCareerInternal_RefID == $nextApprover) {
                $statusApprover = "Yes";
            }
            if($nextApprover == 0 && $cek == 0){
                $statusDocument = 1;
            }
            else if($nextApprover == 0 && $cek == 1){
                $statusDocument = 2;
            }
        }

        $compact = [
            'dataHeader' => $filteredArray[0],
            'dataDetail' => $filteredArray,
            'businessDocument_RefID' => $filteredArray[0]['Sys_ID_Advance'],
            'businessDocumentNumber' => $filteredArray[0]['DocumentNumber'],
            'DataWorkflowHistory' => $DataWorkflowHistory,
            'statusApprover' => $statusApprover,
            'businessDocument_ID' => $businessDocument_ID,
            'submitter_ID' => $submitter_ID,
            'sourceData' => $souceData,
            'var' => 1,
            'statusDocument' => $statusDocument
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
        $souceData = 0;
        if (isset($businessDocument_RefID) || isset($businessDocumentNumber)) {
            if (isset($businessDocument_RefID)) {

                // CALL FUNCTION SHOW DATA BY ID
                $filterType = "ID";
                $varDataWorkflow = $this->GetAllDocumentTypeByID($varAPIWebToken, $businessDocument_RefID, $filterType, $souceData);
            } else {

                // // CALL FUNCTION SHOW DATA BY NUMBER
                $filterType = "Number";
                $varDataWorkflow = $this->GetAllDocumentTypeByID($varAPIWebToken, $businessDocumentNumber, $filterType, $souceData);

            }

            if (count($varDataWorkflow['dataDetail']) > 0) {
                return view('Documents.Transactions.IndexCheckDocument', $varDataWorkflow);
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

        $filterType = "ID";
        $souceData = 1;
        // CALL FUNCTION SHOW DATA BY ID
        $varDataWorkflow = $this->GetAllDocumentTypeByID($varAPIWebToken, $businessDocument_RefID, $filterType, $souceData);

        if (count($varDataWorkflow['dataDetail']) > 0) {
            return view('Documents.Transactions.IndexCheckDocument', $varDataWorkflow);
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
