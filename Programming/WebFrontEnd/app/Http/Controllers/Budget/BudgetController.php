<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\ExportExcel\Budget\ExportReportModifyBudgetDetail;
use App\Http\Controllers\ExportExcel\Budget\ExportReportModifyBudgetSummary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDO;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.budgeting.getBudget', 
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
        // dd($varData);
        return view('Budget.Budget.Transactions.index', ['data' => $varData['data']]);
    }

    public function ModifyBudget(Request $request) {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $compact = [
            'varAPIWebToken' => $varAPIWebToken
        ];

        return view('Budget.Budget.Transactions.ModifyBudget', $compact);
    }

    public function PreviewModifyBudget(Request $request) {
        try {
            // PIC
            $PIC                = $request->session()->get("SessionLoginName");

            // BUDGET CODE
            $budgetID           = $request->project_id;
            $budgetCode         = $request->project_code;
            $budgetName         = $request->project_name;

            // SUB BUDGET CODE
            $subBudgetID        = $request->site_id;
            $subBudgetCode      = $request->site_code;
            $subBudgetName      = $request->site_name;

            // REASON FOR MODIFY
            $reason             = $request->reason_modify;

            // ADDITIONAL CO
            $additionalCO       = $request->additional_co;

            // CURRENCY
            $currencyID         = $request->currency_id;
            $currencySymbol     = $request->currency_symbol ?? '';
            $currencyName       = $request->currency_name ?? '-';
            
            // IDR RATE
            $idrRate            = $request->value_idr_rate;
            
            // dump($currencySymbol, $idrRate);

            // VALUE ADDITIONAL CO
            $valueAdditionalCO  = $request->value_co_additional;

            // VALUE DEDUCTIVE CO
            $valueDeductiveCO   = $request->value_co_deductive;

            // FILES
            $files              = $request->uploaded_files ?? [];

            // MODIFY BUDGET LIST TABLE (CART)
            $productIds         = $request->input('product_id');
            $productName        = $request->input('product_name');
            $qtyBudget          = $request->input('qty_budget');
            // $qtyAvail           = $request->input('qty_avail');
            $price              = $request->input('price');
            // $currency           = $request->input('currency');
            // $balanceBudget      = $request->input('balance_budget');
            $totalBudget        = $request->input('total_budget');
            $qtyAdditionals     = $request->input('qty_additional');
            $priceAdditionals   = $request->input('price_additional');
            $totalAdditionals   = $request->input('total_additional');
            $qtySavings         = $request->input('qty_saving');
            $priceSavings       = $request->input('price_saving');
            $totalSavings       = $request->input('total_saving');
            $type               = $request->input('type');

            // dd($productIds, $productName, $qtyBudget, $price, $totalBudget, $qtyAdditionals, $priceAdditionals, $totalAdditionals, $qtySavings, $priceSavings, $totalSavings);

            $addSubtSectionOne = 0;
            if ($currencySymbol !== "IDR") {
                if ($additionalCO == "yes") {
                    if ($valueAdditionalCO) {
                        $addSubtSectionOne = '+' . ($valueAdditionalCO * $idrRate);
                    } else {
                        $addSubtSectionOne = '-' . ($valueDeductiveCO * $idrRate);
                    }
                } else {
                    $addSubtSectionOne = 0;
                }
            } else {
                if ($additionalCO == "yes") {
                    if ($valueAdditionalCO) {
                        $addSubtSectionOne = '+' . $valueAdditionalCO;
                    } else {
                        $addSubtSectionOne = '-' . $valueDeductiveCO;
                    }
                } else {
                    $addSubtSectionOne = 0;
                }
            }

            $i = 0;
            $dataModifyBudget = [];
            $totalAdditional = 0;
            $totalSaving = 0;
            foreach ($productIds as $index => $productId) {
                $totalAdditional                            += $totalAdditionals[$index];
                $totalSaving                                += $totalSavings[$index];

                $dataModifyBudget[$i]['no']                 = $i + 1;
                $dataModifyBudget[$i]['productID']          = $productIds[$index];
                $dataModifyBudget[$i]['productName']        = $productName[$index];
                $dataModifyBudget[$i]['qtyBudget']          = $qtyBudget[$index];
                // $dataModifyBudget[$i]['qtyAvail']           = number_format($qtyAvail[$index], 2);
                $dataModifyBudget[$i]['price']              = $price[$index];
                // $dataModifyBudget[$i]['currency']           = $currency[$index];
                // $dataModifyBudget[$i]['balanceBudget']      = number_format($balanceBudget[$index], 2);
                $dataModifyBudget[$i]['totalBudget']        = $totalBudget[$index];
                $dataModifyBudget[$i]['qtyAdditionals']     = number_format($qtyAdditionals[$index], 2);
                $dataModifyBudget[$i]['priceAdditionals']   = number_format($priceAdditionals[$index], 2);
                $dataModifyBudget[$i]['totalAdditionals']   = number_format($totalAdditionals[$index], 2);
                $dataModifyBudget[$i]['qtySavings']         = number_format($qtySavings[$index], 2);
                $dataModifyBudget[$i]['priceSavings']       = number_format($priceSavings[$index], 2);
                $dataModifyBudget[$i]['totalSavings']       = number_format($totalSavings[$index], 2);
                $dataModifyBudget[$i]['type']               = $type[$index] ?? 'formBudgetDetails';
                
                $i++;
            }

            // dd($dataModifyBudget);

            $compact = [
                'pic'               => $PIC,
                'budgetID'          => $budgetID,
                'budgetCode'        => $budgetCode,
                'budgetName'        => $budgetName,
                'subBudgetID'       => $subBudgetID,
                'subBudgetCode'     => $subBudgetCode,
                'subBudgetName'     => $subBudgetName,
                'reason'            => $reason ? $reason : '-',
                'additionalCO'      => $additionalCO,
                'currencyID'        => $currencyID,
                'currencySymbol'    => $currencySymbol,
                'currencyName'      => $currencyName,
                'idrRate'           => $idrRate ? number_format($idrRate, 2) : '-',
                'valueIDRRate'      => $idrRate,
                'valueAdditionalCO' => $valueAdditionalCO,
                'valueDeductiveCO'  => $valueDeductiveCO,
                'files'             => $files,
                'dataModifyBudget'  => $dataModifyBudget,
                'totalAdditional'   => number_format($totalAdditional, 2),
                'totalSaving'       => number_format($totalSaving, 2),
                'dataTable'         => [
                    'sectionOne'    => [
                        'firstRow'  => [
                            'description'   => 'Customer Oder (CO)',
                            'valuta'        => 'IDR',
                            'origin'        => 465000000,
                            'previous'      => 465000000,
                            'addSubt'       => $addSubtSectionOne,
                            'totalCurrent'  => $additionalCO == "yes" ? $valueAdditionalCO ? 465000000 + $addSubtSectionOne : 465000000 - $addSubtSectionOne : 465000000
                        ],
                        'secondRow' => [
                            'description'   => '',
                            'valuta'        => 'Cross Currency',
                            'origin'        => 0,
                            'previous'      => 0,
                            'addSubt'       => $additionalCO == "yes" ? $valueAdditionalCO ? '+' . $valueAdditionalCO : '-' . $valueDeductiveCO : 0,
                            'totalCurrent'  => 0
                        ],
                        'thirdRow' => [
                            'description'   => 'Total',
                            'valuta'        => 'IDR',
                            'origin'        => 0,
                            'previous'      => 0,
                            'addSubt'       => 0,
                            'totalCurrent'  => 0
                        ],
                    ],
                    'sectionTwo'    => [
                        'firstRow'  => [
                            'description'   => 'Add(Subt) Cost',
                            'valuta'        => 'IDR',
                            'origin'        => 376712000,
                            'previous'      => 376712000,
                            'addSubt'       => $addSubtSectionOne,
                            // 'addSubt'       => $totalAdditional - $totalSaving,
                            'totalCurrent'  => 376712000
                        ],
                        'secondRow' => [
                            'description'   => '',
                            'valuta'        => 'Cross Currency',
                            'origin'        => 0,
                            'previous'      => 0,
                            'addSubt'       => $currencySymbol != "IDR" && $additionalCO == "yes" ? $valueAdditionalCO ? '+' . $valueAdditionalCO : '-' . $valueDeductiveCO : 0,
                            // 'addSubt'       => 0,
                            'totalCurrent'  => 0
                        ],
                        'thirdRow' => [
                            'description'   => '',
                            'valuta'        => '',
                            'origin'        => 'Recorded Cost',
                            'previous'      => 0,
                            'addSubt'       => '',
                            'totalCurrent'  => ''
                        ],
                        'fourthRow' => [
                            'description'   => '',
                            'valuta'        => '',
                            'origin'        => 'Balanced Budget',
                            'previous'      => 0,
                            'addSubt'       => '',
                            'totalCurrent'  => ''
                        ],
                        'fifthRow' => [
                            'description'   => 'Total',
                            'valuta'        => 'IDR',
                            'origin'        => 0,
                            'previous'      => 376712000,
                            'addSubt'       => 0,
                            'totalCurrent'  => 376712000
                        ]
                    ],
                    'sectionThree'  => [
                        'firstRow'  => [
                            'description'   => 'Gross Margin',
                            'valuta'        => 'IDR',
                            'origin'        => 0,
                            'previous'      => 79288000,
                            'addSubt'       => 0,
                            'totalCurrent'  => 79288000
                        ],
                        'secondRow' => [
                            'description'   => '',
                            'valuta'        => 'Cross Currency',
                            'origin'        => 0,
                            'previous'      => 0,
                            'addSubt'       => 0,
                            'totalCurrent'  => 0
                        ],
                        'thirdRow' => [
                            'description'   => 'Total',
                            'valuta'        => 'IDR',
                            'origin'        => 0,
                            'previous'      => 79288000,
                            'addSubt'       => 0,
                            'totalCurrent'  => 79288000
                        ],
                    ],
                    'sectionFour'  => [
                        'firstRow'  => [
                            'description'   => 'Gross Margin',
                            'valuta'        => '%',
                            'origin'        => 0,
                            'previous'      => 17.39,
                            'addSubt'       => '',
                            'totalCurrent'  => 17.39
                        ],
                        'secondRow' => [
                            'description'   => 'Gross Margin Movement',
                            'valuta'        => '%',
                            'origin'        => 17.39,
                            'previous'      => 0,
                            'addSubt'       => '',
                            'totalCurrent'  => ''
                        ],
                    ],
                    'sectionFive'  => [
                        'firstRow'  => [
                            'description'   => 'Recorded Cost',
                            'valuta'        => 'IDR',
                            'origin'        => '',
                            'previous'      => '',
                            'addSubt'       => '',
                            'totalCurrent'  => 0
                        ],
                        'secondRow' => [
                            'description'   => '',
                            'valuta'        => 'Cross Currency',
                            'origin'        => '',
                            'previous'      => '',
                            'addSubt'       => '',
                            'totalCurrent'  => 0
                        ],
                        'thirdRow' => [
                            'description'   => 'Total',
                            'valuta'        => 'IDR',
                            'origin'        => '',
                            'previous'      => '',
                            'addSubt'       => '',
                            'totalCurrent'  => 0
                        ],
                        'fourthRow' => [
                            'description'   => 'Actual Gross Margin',
                            'valuta'        => '%',
                            'origin'        => '',
                            'previous'      => '',
                            'addSubt'       => '',
                            'totalCurrent'  => 0
                        ],
                    ],
                ],
            ];

            return view('Budget.Budget.Transactions.PreviewModifyBudget', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at PreviewModifyBudget: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportModifyBudgetSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportModifyBudgetSummarySubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportModifyBudgetSummary', []) : [];

        $compact = [
            'varAPIWebToken' => [],
            'dataReport' => $dataReport
        ];

        return view('Budget.Budget.Reports.ReportModifyBudgetSummary', $compact);
    }

    public function ReportModifyBudgetSummaryData($projectId, $siteId, $projectCode, $projectName)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'report.form.documentForm.finance.getReportAdvanceSummary',
                'latest',
                [
                    'parameter' => [
                        'dataFilter' => [
                            'budgetID' => 1,
                            'subBudgetID' => 1,
                            'workID' => 1,
                            'productID' => 1,
                            'beneficiaryID' => 1,
                        ]
                    ]
                ],
                false
            );

            $DataReportModifyBudgetSummary = json_decode(
                \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    "ReportAdvanceSummary"
                ),
                true
            );

            $collection = collect($DataReportModifyBudgetSummary);

            if ($projectId != "") {
                $collection = $collection->where('CombinedBudget_RefID', $projectId);
            }
            if ($siteId != "") {
                $collection = $collection->where('CombinedBudgetSection_RefID', $siteId);
            }

            $collection = $collection->all();

            $dataHeaders = [
                'budget'        => $projectCode . " - " . $projectName
            ];

            // dd($collection);

            $dataDetails = [];
            $i = 0;
            $total = 0;
            $productID = 88000000003832;
            foreach ($collection as $collections) {
                $total                              += $collections['TotalAdvance'];

                $dataDetails[$i]['no']              = $i + 1;
                $dataDetails[$i]['productID']       = $productID + $i;
                $dataDetails[$i]['productName']     = $collections['remark'];
                $dataDetails[$i]['price']           = $collections['TotalAdvance'];
                $dataDetails[$i]['total']           = ($i + 1) * $collections['TotalAdvance'];
    
                // $dataDetails[$i]['ModifyNumber']        = "MB01-23000004";
                // $dataDetails[$i]['budgetCode']          = $collections['CombinedBudgetCode'];
                // $dataDetails[$i]['date']                = date('d-m-Y', strtotime($collections['DocumentDateTimeTZ']));
                // $dataDetails[$i]['total']               = number_format($collections['TotalAdvance'], 2);
                $i++;
            }

            $compact = [
                'dataHeader'            => $dataHeaders,
                'dataDetail'            => $dataDetails,
                'total'                 => number_format($total, 2),
            ];

            Session::put("isButtonReportModifyBudgetSummarySubmit", true);
            Session::put("dataReportModifyBudgetSummary", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("Error at ReportModifyBudgetSummaryData: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportModifyBudgetSummaryStore(Request $request) 
    {
        try {
            $budget         = $request->budget;
            $budgetID       = $request->budget_id;
            $budgetName     = $request->budget_name;
            $subBudgetID    = $request->sub_budget_id;

            if (!$budgetID && !$subBudgetID) {
                $message = 'Budget & Sub Budget Cannot Empty';
            } else if ($budgetID && !$subBudgetID) {
                $message = 'Sub Budget Cannot Empty';
            }

            if (isset($message)) {
                Session::forget("isButtonReportModifyBudgetSummarySubmit");
                Session::forget("dataReportModifyBudgetSummary");

                return redirect()->route('Budget.ReportModifyBudgetSummary')->with('NotFound', $message);
            }

            $compact = $this->ReportModifyBudgetSummaryData($budgetID, $subBudgetID, $budget, $budgetName);

            if ($compact === null || empty($compact['dataHeader'])) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('Budget.ReportModifyBudgetSummary');
        } catch (\Throwable $th) {
            Log::error("Error at ReportModifyBudgetSummaryStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportModifyBudgetSummary(Request $request) {
        try {
            $dataReport = Session::get("dataReportModifyBudgetSummary");

            if ($dataReport) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Budget.Budget.Reports.ReportModifyBudgetSummary_pdf', ['dataReport' => $dataReport]);
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));
    
                    return $pdf->download('Export Report Modify Budget Summary.pdf');
                } else {
                    return Excel::download(new ExportReportModifyBudgetSummary, 'Export Report Modify Budget Summary.xlsx');
                }
            } else {
                return redirect()->route('Budget.ReportModifyBudgetSummary')->with('NotFound', 'Budget & Sub Budget Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportModifyBudgetSummary: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportModifyBudgetDetail(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportModifyBudgetDetailSubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportModifyBudgetDetail', []) : [];

        // dump($dataReport);

        $compact = [
            'varAPIWebToken'    => [],
            'dataReport'        => $dataReport
        ];

        return view('Budget.Budget.Reports.ReportModifyBudgetDetail', $compact);
    }

    public function ReportModifyBudgetDetailData($id) 
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.finance.getAdvance', 
                'latest',
                [
                    'parameter' => [
                        'recordID' => (int) $id
                    ]
                ]
            );

            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Data not found in the API response.');
            }

            $getData = $filteredArray['data'][0]['document'];

            // DATA HEADER
            $dataHeaders = [
                'doNumber'      => 'MB01-53000004',
                'budget'        => $getData['content']['general']['budget']['combinedBudgetCodeList'][0],
                'budgetName'    => $getData['content']['general']['budget']['combinedBudgetNameList'][0],
                'subBudget'     => $getData['content']['general']['budget']['combinedBudgetSectionCodeList'][0],
                'date'          => $getData['header']['date'],
                'transporter'   => "VDR-2594 - Aman Jaya",
                'deliveryFrom'  => "QDC",
                'deliveryTo'    => 'Gudang Tigaraksa',
                'PIC'           => $getData['content']['general']['involvedPersons'][0]['requesterWorkerName'],
            ];

            // dd($getData['content']['details']['itemList']);

            $dataDetails = [];
            $i = 0;
            $totalQty = 0;
            foreach ($getData['content']['details']['itemList'] as $dataReports) {
                $totalQty += ($i + 1) * $dataReports['entities']['quantity'];
            
                $dataDetails[$i]['no']          = $i + 1;
                $dataDetails[$i]['productID']   = $dataReports['entities']['product_RefID'];
                $dataDetails[$i]['productName'] = $dataReports['entities']['productName'];
                $dataDetails[$i]['price']       = $dataReports['entities']['quantity'];
                $dataDetails[$i]['total']       = ($i + 1) * $dataReports['entities']['quantity'];

                // $dataDetails[$i]['dorNumber']   = "MB1-23000004";
                // $dataDetails[$i]['productId']   = $dataReports['entities']['product_RefID'];
                // $dataDetails[$i]['productName'] = $dataReports['entities']['productName'];
                // $dataDetails[$i]['qty']         = number_format($dataReports['entities']['quantity'], 2, ',', '.');
                // $dataDetails[$i]['uom']         = 'Set';
                // $dataDetails[$i]['remark']      = $dataReports['entities']['quantityUnitName'];
                $i++;
            }

            $compact = [
                'dataHeader'    => $dataHeaders,
                'dataDetail'    => $dataDetails,
                'totalQty'      => number_format($totalQty, 2, ',', '.'),
            ];

            Session::put("isButtonReportModifyBudgetDetailSubmit", true);
            Session::put("dataReportModifyBudgetDetail", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("Error at ReportModifyBudgetDetailData: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportModifyBudgetDetailStore(Request $request) 
    {
        try {
            $advanceRefID   = $request->advance_RefID;
            $advanceNumber  = $request->advance_number;

            if (!$advanceRefID && !$advanceNumber) {
                Session::forget("isButtonReportModifyBudgetDetailSubmit");
                Session::forget("dataReportModifyBudgetDetail");

                return redirect()->route('Budget.ReportModifyBudgetDetail')->with('NotFound', 'Modify Number Cannot Empty');
            }

            $compact = $this->ReportModifyBudgetDetailData($advanceRefID);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('Budget.ReportModifyBudgetDetail');
        } catch (\Throwable $th) {
            Log::error("Error at ReportModifyBudgetDetailStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportModifyBudgetDetail(Request $request) {
        try {
            $dataReport = Session::get("dataReportModifyBudgetDetail");

            if ($dataReport) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Budget.Budget.Reports.ReportModifyBudgetDetail_pdf', ['dataReport' => $dataReport]);
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));
    
                    return $pdf->download('Export Report Modify Budget Detail.pdf');
                } else {
                    return Excel::download(new ExportReportModifyBudgetDetail, 'Export Report Modify Budget Detail.xlsx');
                }
            } else {
                return redirect()->route('Budget.ReportModifyBudgetDetail')->with('NotFound', 'Modify Number Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportModifyBudgetDetail: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function create()
    {
        return view('Budget.Budget.Transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $start = date('Y-m-d h:m:s+07', strtotime($request->start));
        $end = date('Y-m-d h:m:s+07', strtotime($request->end));
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.create.budgeting.setBudget', 
        'latest', 
        [
        'entities' => [
            'name' => $request->name,
            'validStartDateTimeTZ' => $start,
            'validFinishDateTimeTZ' => $end
            ]
        ]
        );
        return redirect()->route('Budget.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataRecord.budgeting.getBudget', 
        'latest', 
        [
        'recordID' => (int)$id
        ]
        );
        return view('Budget.Budget.Transactions.edit')->with('data', $varData['data']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $start = date('Y-m-d h:m:s+07', strtotime($request->start));
        $end = date('Y-m-d h:m:s+07', strtotime($request->end));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.delete.budgeting.setBudget', 
        'latest', 
        [
        'recordID' => (int)$id
        ]
        );
        return redirect()->route('Budget.index');
    }
}