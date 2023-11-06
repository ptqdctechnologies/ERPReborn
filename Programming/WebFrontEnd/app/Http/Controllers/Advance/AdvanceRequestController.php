<?php

namespace App\Http\Controllers\Advance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AdvanceRequestController extends Controller
{
    // INDEX FUNCTION
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
        ];

        return view('Advance.Advance.Transactions.CreateAdvanceRequest', $compact);
    }

    // STORE FUNCTION FOR INSERT DATA 
    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
        $input = $request->all();
        $GetBusinessDoc = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'generalPurposes.businessDocument.getBusinessDocumentTypeIDByName',
            'latest',
            [
                'parameter' => [
                    'name' => 'Advance Form'
                ]
            ]
        );

        $VarSelectWorkFlow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'userAction.documentWorkFlow.general.getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID',
            'latest',
            [
                'parameter' => [
                    'businessDocumentType_RefID' => (int)$GetBusinessDoc['data']['businessDocumentType_RefID'],
                    'submitterEntity_RefID' => (int)$SessionWorkerCareerInternal_RefID,
                    'combinedBudget_RefID' => (int)$input['var_combinedBudget_RefID']
                ]
            ]
        );


        if ($VarSelectWorkFlow['metadata']['HTTPStatusCode'] != "200" || count($VarSelectWorkFlow['data']) == 0) {

            $compact = [
                "message" => "WorkflowError"
            ];

            return response()->json($compact);
        } else {

            $count_product = count($input['var_product_id']);
            $advanceDetail = [];
            for ($n = 0; $n < $count_product; $n++) {
                $advanceDetail[$n] = [
                    'entities' => [
                        "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudgetSectionDetail_RefID'][$n],
                        "product_RefID" => (int) $input['var_product_id'][$n],
                        "quantity" => (float) $input['var_quantity'][$n],
                        "quantityUnit_RefID" => (int) $input['var_qty_id'][$n],
                        "productUnitPriceCurrency_RefID" => (int) $input['var_currency_id'][$n],
                        "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
                        "productUnitPriceCurrencyExchangeRate" => 1,
                        "remarks" => 'Catatan Detail'
                    ]
                ];
            }
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.create.finance.setAdvance',
                'latest',
                [
                    'entities' => [
                        "documentDateTimeTZ" => $input['var_date'],
                        "log_FileUpload_Pointer_RefID" => (int)$input['dataInput_Log_FileUpload_Pointer_RefID'],
                        "requesterWorkerJobsPosition_RefID" => (int)$input['requester_id'],
                        "beneficiaryWorkerJobsPosition_RefID" => (int)$input['beneficiary_id'],
                        "beneficiaryBankAccount_RefID" => (int)$input['beneficiaryBankAccount_RefID'],
                        "internalNotes" => 'My Internal Notes',
                        "remarks" => $input['var_remark'],
                        "additionalData" => [
                            "itemList" => [
                                "items" => $advanceDetail
                            ]
                        ]
                    ]
                ]
            );

            return $this->SelectWorkFlow($varData, $SessionWorkerCareerInternal_RefID, $VarSelectWorkFlow);
        }
    }

    // REVISION FUNCTION FOR SHOW LIST DATA FILTER BY ID 
    public function RevisionAdvanceIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varDataAdvanceRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.finance.getAdvance',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $request->searchArfNumberRevisionId,
                ]
            ]
        );
        // dd($varDataAdvanceRevision);
        $compact = [
            'dataGeneral' => $varDataAdvanceRevision['data'][0]['document']['content']['general'],
            'dataDetail' => $varDataAdvanceRevision['data'][0]['document']['content']['details']['itemList'],
            'dataHeader' => $varDataAdvanceRevision['data'][0]['document']['header'],
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
        ];

        return view('Advance.Advance.Transactions.RevisionAdvanceRequest', $compact);
    }

    // UPDATE FUNCTION
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $count_product = count($input['var_product_id']);
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $advanceDetail = [];
        if ($count_product > 0 && isset($count_product)) {
            for ($n = 0; $n < $count_product; $n++) {
                $advanceDetail[$n] = [
                    'recordID' => ((!$input['var_recordIDDetail'][$n]) ? null : (int) $input['var_recordIDDetail'][$n]),
                    'entities' => [
                        "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudgetSectionDetail_RefID'][$n],
                        "product_RefID" => (int) $input['var_product_id'][$n],
                        "quantity" => (float) $input['var_quantity'][$n],
                        "quantityUnit_RefID" => (int) $input['var_qty_id'][$n],
                        "productUnitPriceCurrency_RefID" => (int) $input['var_currency_id'][$n],
                        "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
                        "productUnitPriceCurrencyExchangeRate" => 1,
                        "remarks" => 'Catatan Detail'
                    ]
                ];
            }
        }
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.finance.setAdvance',
            'latest',
            [
                'recordID' => (int)$input['var_recordID'],
                'entities' => [
                    "documentDateTimeTZ" => $input['var_date'],
                    "log_FileUpload_Pointer_RefID" => (int)$input['dataInput_Log_FileUpload_Pointer_RefID'],
                    "requesterWorkerJobsPosition_RefID" => (int)$input['requester_id'],
                    "beneficiaryWorkerJobsPosition_RefID" => (int)$input['beneficiary_id'],
                    "beneficiaryBankAccount_RefID" => (int)$input['beneficiaryBankAccount_RefID'],
                    "internalNotes" => 'My Internal Notes',
                    "remarks" => $input['var_remark'],
                    "additionalData" => [
                        "itemList" => [
                            "items" => $advanceDetail
                        ]
                    ]
                ]
            ]
        );
        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }


    // LIST DATA FUNCTION FOR SHOW DATA ADVANCE 
    public function AdvanceListData(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $getAdvance = Cache::remember('getAdvance', 480, function () use ($varAPIWebToken) {

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
            ];

            return $compact;
        });

        return response()->json($getAdvance);
    }

    public function ReportAdvanceSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
        ];
        return view('Advance.Advance.Reports.ReportAdvanceSummary', $compact);
    }
    public function ReportAdvanceSummaryStore(Request $request)
    {

        $project_id = $request->project_id;
        $site_id = $request->site_id;
        $work_id = $request->work_id;
        $product_id = $request->product_id;
        $beneficiary_id = $request->beneficiary_id;

        if ($project_id == "") {
            $project_id = null;
        } else {
            $project_id = (int)$project_id;
        }
        if ($site_id == "") {
            $site_id = null;
        } else {
            $site_id = (int)$site_id;
        }
        if ($work_id == "") {
            $work_id = null;
        } else {
            $work_id = (int)$work_id;
        }
        if ($product_id == "") {
            $product_id = null;
        } else {
            $product_id = (int)$product_id;
        }
        if ($beneficiary_id == "") {
            $beneficiary_id = null;
        } else {
            $beneficiary_id = (int)$beneficiary_id;
        }

        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.finance.getReportAdvanceSummary',
            'latest',
            [
                'parameter' => [
                    'dataFilter' => [
                        'budgetID' => $project_id,
                        'subBudgetID' => $site_id,
                        'workID' => $work_id,
                        'productID' => $product_id,
                        'beneficiaryID' => $beneficiary_id,
                    ]
                ]
            ]
        );

        $compact = [
            'data' => $varData['data'],
        ];

        return response()->json($compact);
    }

    public function ReportAdvanceSummaryDetail(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.finance.getReportAdvanceSummaryDetail',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $id
                ]
            ]
        );

        $compact = [
            'data' => $varData['data'][0]['document']['content']
        ];

        return view('Advance.Advance.Reports.ReportAdvanceSummaryDetail', $compact);
    }
}
