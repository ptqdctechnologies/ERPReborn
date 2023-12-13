<?php

namespace App\Http\Controllers\Advance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExportExcel\AdvanceRequest\ExportReportAdvanceSummary;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class AdvanceRequestController extends Controller
{
    // INDEX FUNCTION
    public function index(Request $request)
    {
        // dd(Redis::keys("*"));
        $varAPIWebToken = Session::get('SessionLogin');

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
        $varAPIWebToken = Session::get('SessionLogin');
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

        $advance_RefID = $request->searchArfNumberRevisionId;
        $varAPIWebToken = Session::get('SessionLogin');

        if (Redis::get("DataListAdvanceDetailComplex") == null) {
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceDetailComplex',
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

        $num = 0;
        $filteredArray = [];
        for ($i = 0; $i < count($DataAdvanceDetailComplex); $i++) {
            if ($DataAdvanceDetailComplex[$i]['Sys_ID_Advance'] == $advance_RefID) {
                $filteredArray[$num] = $DataAdvanceDetailComplex[$i];
                $num++;
                break;
            }
        }

        if ($filteredArray[0]['Log_FileUpload_Pointer_RefID'] == 0) {
            $dataDetailFileAttachment = null;
        } else {
            $dataDetailFileAttachment = $filteredArray[0]['Log_FileUpload_Pointer_RefID'];
        }

        $compact = [
            'dataHeader' => $filteredArray[0],
            'dataDetail' => $filteredArray,
            'dataFileAttachment' => $dataDetailFileAttachment,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
        ];

        return view('Advance.Advance.Transactions.RevisionAdvanceRequest', $compact);
    }

    // UPDATE FUNCTION
    public function update(Request $request, $id)
    {
        $input = $request->all();
        // dd($input);
        $count_product = count($input['var_product_id']);
        $varAPIWebToken = Session::get('SessionLogin');

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
                    "documentDateTimeTZ" => date('Y-m-d'),
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

        //RESET REDIS DATA LIST ADVANCE
        $this->FunctionResetRedisAdvance();

        return response()->json($compact);
    }


    // LIST DATA FUNCTION FOR SHOW DATA ADVANCE 
    public function AdvanceListData(Request $request)
    {
        if (Redis::get("DataListAdvance") == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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
                ],
                false
            );
        }

        $DataListAdvance = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "DataListAdvance"
            ),
            true
        );
        return response()->json($DataListAdvance);
    }

    public function ReportAdvanceSummary(Request $request)
    {

        Session::put("AdvanceSummaryReportIsSubmit", "No");

        $varAPIWebToken = Session::get('SessionLogin');

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
        ];

        return view('Advance.Advance.Reports.ReportAdvanceSummary', $compact);
    }
    public function ReportAdvanceSummaryStore(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        if (Redis::get("ReportAdvanceSummary") == null) {
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'report.form.documentForm.finance.getReportAdvanceSummary',
                'latest',
                [
                    'parameter' => [
                        'dataFilter' => [
                            'budgetID' => "",
                            'subBudgetID' => "",
                            'workID' => "",
                            'productID' => "",
                            'beneficiaryID' => "",
                        ]
                    ]
                ],
                false
            );
        }

        $DataReportAdvanceSummary = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "ReportAdvanceSummary"
            ),
            true
        );


        $collection = collect($DataReportAdvanceSummary);

        $project_id = $request->project_id;
        $site_id = $request->site_id;
        // $work_id = $request->work_id;
        $product_id = $request->product_id;
        $beneficiary_id = $request->beneficiary_id;

        if ($project_id != "") {
            $collection = $collection->where('CombinedBudget_RefID', $project_id);
        }
        if ($site_id != "") {
            $collection = $collection->where('CombinedBudgetSection_RefID', $site_id);
        }
        if ($product_id != "") {
            $collection = $collection->where('Product_ID', $product_id);
        }
        if ($beneficiary_id != "") {
            $collection = $collection->where('BeneficiaryWorkerJobsPosition_RefID', $beneficiary_id);
        }
        // if ($work_id != "") {
        //     $work_id = null;
        // }

        $collection = $collection->all();
        $varDataExcel = [];
        $i = 0;
        foreach ($collection as $collections) {
            $varDataExcel[$i]['no'] = $i + 1;
            $varDataExcel[$i]['documentNumber'] = $collections['DocumentNumber'];
            $varDataExcel[$i]['date'] = date('d-m-Y', strtotime($collections['DocumentDateTimeTZ']));
            $varDataExcel[$i]['currencyName'] = $collections['CurrencyName'];
            $varDataExcel[$i]['totalAdvance'] = $collections['TotalAdvance'];
            $varDataExcel[$i]['beneficiaryWorkerName'] = $collections['BeneficiaryWorkerName'];
            $varDataExcel[$i]['remark'] = $collections['remark'];
            $i++;
        }

        $compact = [
            'data' => $collection,
            'varDataExcel' => $varDataExcel
        ];

        Session::put("AdvanceSummaryReportDataPDF", $compact);
        Session::put("AdvanceSummaryReportDataExcel", $compact['varDataExcel']);
        Session::put("AdvanceSummaryReportIsSubmit", "Yes");

        return response()->json($compact);
    }

    public function ReportAdvanceSummaryDetail(Request $request, $id)
    {
        $varAPIWebToken = Session::get('SessionLogin');

        if (Redis::get("DataListAdvanceDetailComplex") == null) {
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceDetailComplex',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $id,
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
        $collection = $collection->where('Sys_ID_Advance', $id);

        foreach ($collection as $collections) {
            $dataHeader = $collections;
        }

        $compact = [
            'dataHeader' => $dataHeader,
            'dataDetail' => $collection->all()

        ];
        return view('Advance.Advance.Reports.ReportAdvanceSummaryDetail', $compact);
    }

    public function PrintExportReportAdvanceSummary(Request $request)
    {
        $isSubmit = Session::get("AdvanceSummaryReportIsSubmit");
        if ($isSubmit == "Yes") {
            $print_type = $request->print_type;
            if ($print_type == "PDF") {

                $dataAdvance = Session::get("AdvanceSummaryReportDataPDF");
                $data = [
                    'title' => 'Advance Summary Report',
                    'date' => date('d/m/Y'),
                    'data' => $dataAdvance
                ];

                $pdf = Pdf::loadView('Advance.Advance.Reports.PrintReportAdvanceSummary', $data)->setOptions(['defaultFont' => 'sans-serif']);
                return $pdf->download('Print Report Advance Summary.pdf');
            } else if ($print_type == "Excel") {

                return Excel::download(new ExportReportAdvanceSummary, 'Export Report Advance Summary.xlsx');
            }
        } else {
            return redirect()->route('AdvanceRequest.ReportAdvanceSummary')->with('NotFound', 'Data Cannot Empty');
        }
    }
}
