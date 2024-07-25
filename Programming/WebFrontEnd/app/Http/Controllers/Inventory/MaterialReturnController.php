<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\ExportExcel\Inventory\ExportReportMaterialReturnSummary;
use App\Http\Controllers\ExportExcel\Inventory\ExportReportMaterialReturnDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class MaterialReturnController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget("SessionMaterialReturn");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'var' => $var,
            'statusRevisi' => 0,
        ];

        return view('Inventory.MaterialReturn.Transactions.CreateMaterialReturn', $compact);
    }

    public function ReportMatReturnSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportMaterialReturnSubmit');

        $dataDetail = $isSubmitButton ? $request->session()->get('dataDetailReportMaterialReturn', []) : [];

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'dataDetail' => $dataDetail
        ];

        return view('Inventory.MaterialReturn.Reports.ReportMatReturnSummary', $compact);
    }

    public function ReportMatReturnSummaryData($id) 
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceReport',
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

            if (!isset($filteredArray['data'][0]['document']['header'])) {
                throw new \Exception('Data not found in the API response.');
            }

            $getHeaderData = $filteredArray['data'][0]['document']['header'];

            $varDataExcel = [
                [
                    'no'        => 1,
                    'DORNumber' => $getHeaderData['number'],
                    'productId' => $getHeaderData['recordID'],
                    'qty'       => $getHeaderData['date'],
                    'unitPrice' => $getHeaderData['recordID'],
                    'total'     => $getHeaderData['businessDocumentType_RefID'],
                ]
            ];

            $compact = [
                'dataHeader' => $getHeaderData,
                'dataExcel'  => $varDataExcel
            ];

            Session::put("isButtonReportMaterialReturnSubmit", true);
            Session::put("dataDetailReportMaterialReturn", $compact['dataHeader']);
            Session::put("dataPDFReportMaterialReturn", $compact['dataHeader']);
            Session::put("dataExcelReportMaterialReturn", $compact['dataExcel']);

            return $compact;
        } catch (\Throwable $th) {
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportMatReturnSummaryStore(Request $request) 
    {
        try {
            $budgetID       = $request->budget_id;
            $subBudgetID    = $request->advance_RefID;
            // $subBudgetID    = $request->sub_budget_id;

            if (!$budgetID && !$subBudgetID) {
                $message = 'Budget & Sub Budget Cannot Empty';
            } else if ($budgetID && !$subBudgetID) {
                $message = 'Sub Budget Cannot Empty';
            } 

            if (isset($message)) {
                Session::forget("isButtonReportMaterialReturnSubmit");
                Session::forget("dataDetailReportMaterialReturn");
                Session::forget("dataPDFReportMaterialReturn");
                Session::forget("dataExcelReportMaterialReturn");
        
                return redirect()->route('Inventory.ReportMatReturnSummary')->with('NotFound', $message);
            }

            $compact = $this->ReportMatReturnSummaryData($subBudgetID);

            if ($compact === null || empty($compact['dataHeader'])) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('Inventory.ReportMatReturnSummary');
        } catch (\Throwable $th) {
            Log::error("Error at ReportMatReturnSummaryStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportMatReturnSummary(Request $request) {
        try {
            $dataDetail = Session::get("dataDetailReportMaterialReturn");

            if ($dataDetail) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Inventory.MaterialReturn.Reports.ReportMatReturnSummary_pdf', compact('dataDetail'));
                    $pdf->setPaper('A4', 'portrait');
    
                    // Preview PDF
                    // return $pdf->stream('Export_Report_Delivery_Order_Request_Detail.pdf');
    
                    return $pdf->download('Export Report Material Return Summary.pdf');
                } else {
                    return Excel::download(new ExportReportMaterialReturnSummary, 'Export Report Material Return Summary.xlsx');
                }
            } else {
                return redirect()->route('Inventory.ReportMatReturnSummary')->with('NotFound', 'Budget & Sub Budget Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportMatReturnSummary: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportMatReturnDetail(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportMatReturnDetailSubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportMatReturnDetail', []) : [];

        $compact = [
            'varAPIWebToken' => [],
            'dataReport'     => $dataReport
        ];

        return view('Inventory.MaterialReturn.Reports.ReportMatReturnDetail', $compact);
    }

    public function ReportMatReturnDetailData($id) 
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceReport',
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

            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Data not found in the API response.');
            }

            $getData = $filteredArray['data'][0]['document'];

            $dataDetails = [];
            $i = 0;
            $totalQty = 0;
            foreach ($getData['content']['details']['itemList'] as $dataReports) {
                $totalQty += $dataReports['entities']['quantity'];
            
                $dataDetails[$i]['no']         = $i + 1;
                $dataDetails[$i]['doNumber']   = $dataReports['entities']['product_RefID'];
                $dataDetails[$i]['productId']  = $dataReports['entities']['priceCurrency_RefID'];
                $dataDetails[$i]['qty']        = $dataReports['entities']['quantity'];
                $dataDetails[$i]['uom']        = 'Set';
                $dataDetails[$i]['remark']     = $dataReports['entities']['quantityUnitName'];
                $i++;
            }

            $compact = [
                'dataHeader'    => $getData['header'],
                'dataDetail'    => $dataDetails,
                'totalQty'      => $totalQty
            ];

            Session::put("isButtonReportMatReturnDetailSubmit", true);
            Session::put("dataReportMatReturnDetail", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("Error at ReportMatReturnDetailData: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportMatReturnDetailStore(Request $request) 
    {
        try {
            $advanceRefID   = $request->advance_RefID;
            $advanceNumber  = $request->advance_number;

            if (!$advanceRefID && !$advanceNumber) {
                Session::forget("isButtonReportMatReturnDetailSubmit");
                Session::forget("dataReportMatReturnDetail");

                return redirect()->route('Inventory.ReportMatReturnDetail')->with('NotFound', 'MR Number Cannot Empty');
            }

            $compact = $this->ReportMatReturnDetailData($advanceRefID);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('Inventory.ReportMatReturnDetail');
        } catch (\Throwable $th) {
            Log::error("Error at ReportMatReturnDetailStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportMatReturnDetail(Request $request) {
        try {
            $dataReport = Session::get("dataReportMatReturnDetail");

            if ($dataReport) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Inventory.MaterialReturn.Reports.ReportMatReturnDetail_pdf', ['dataReport' => $dataReport]);
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 85, 94, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text($width / 2.5, $height - 20, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));
    
                    return $pdf->download('Export Report Material Return Detail.pdf');
                } else {
                    return Excel::download(new ExportReportMaterialReturnDetail, 'Export Report Material Return Detail.xlsx');
                }
            } else {
                return redirect()->route('Inventory.ReportMatReturnDetail')->with('NotFound', 'MR Number Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportMatReturnDetail: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function StoreValidateiMaterialReturn(Request $request)
    {
        $tamp = 0;
        $status = 200;
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionMaterialReturn");
        if ($request->session()->has("SessionMaterialReturn")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $val && $data[$i + 1] == $val2) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                $request->session()->push("SessionMaterialReturn", $val);
                $request->session()->push("SessionMaterialReturn", $val2);
            } else {
                $status = 500;
            }
        } else {
            $request->session()->push("SessionMaterialReturn", $val);
            $request->session()->push("SessionMaterialReturn", $val2);
        }

        return response()->json($status);
    }

    public function StoreValidateiMaterialReturn2(Request $request)
    {
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionMaterialReturn");
        if ($request->session()->has("SessionMaterialReturn")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $val && $data[$i + 1] == $val2) {
                    unset($data[$i]);
                    unset($data[$i + 1]);
                    $newClass = array_values($data);
                    $request->session()->put("SessionMaterialReturn", $newClass);
                }
            }
        }
    }

    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
    }

    public function MaterialReturnListData(Request $request)
    {
        try {

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

    public function MaterialReturnByDorID(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var_recordID = $request->input('var_recordID');
        $varDataAdvanceList = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
        // dd($varDataAdvanceList);
        $compact = [
            'DataAdvanceList' => $varDataAdvanceList['data'],
        ];
        return response()->json($compact);
    }

    public function RevisionMaterialReturnIndex(Request $request)
    {
        try {

            $mr_RefID = $request->mr_RefID;
            $varAPIWebToken = Session::get('SessionLogin');

            // DATA REVISION ADVANCE
            if (Redis::get("DataListAdvanceDetailComplex") == null) {
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.read.dataList.finance.getAdvanceDetailComplex',
                    'latest',
                    [
                        'parameter' => [
                            'advance_RefID' => (int) $mr_RefID,
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
            $collection = $collection->where('Sys_ID_Advance', $mr_RefID);

            $num = 0;
            $filteredArray = [];

            foreach ($collection as $collections) {
                $filteredArray[$num] = $collections;
                $num++;
            }

            if ($filteredArray[0]['Log_FileUpload_Pointer_RefID'] == 0) {
                $dataDetailFileAttachment = null;
            } else {
                $dataDetailFileAttachment = $filteredArray[0]['Log_FileUpload_Pointer_RefID'];
            }

            for ($i = 0; $i < count($filteredArray); $i++) {
                unset($filteredArray[$i]['FileAttachment']);
            }

            //DOCUMENT TYPE ID ADVANCE
            $DocumentType = json_decode(
                \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    "DocumentType"
                ),
                true
            );
            $collection = collect($DocumentType);
            $collection = $collection->where('Name', "Advance Form");
            foreach ($collection->all() as $collections) {
                $DocumentTypeID = $collections['Sys_ID'];
            }

            $remark = $filteredArray[0]['Remarks'];
            $filteredArray[0]['Remarks'] = "";

            $compact = [
                'dataHeader' => $filteredArray[0],
                'dataDetail' => $filteredArray,
                'remark' => $remark,
                'dataFileAttachment' => $dataDetailFileAttachment,
                'DocumentTypeID' => $DocumentTypeID,
                'varAPIWebToken' => $varAPIWebToken,
                'statusRevisi' => 1,
            ];
            return view('Inventory.MaterialReturn.Transactions.RevisionMaterialReturn', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }

    }

    public function MaterialReturnListCartRevision(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var_recordID = $request->input('var_recordID');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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

    public function update(Request $request, $id)
    {
        $input = $request->all();
        dd($input);
    }
}
