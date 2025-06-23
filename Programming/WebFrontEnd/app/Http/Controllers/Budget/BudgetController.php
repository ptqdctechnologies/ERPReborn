<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\ExportExcel\Budget\ExportReportModifyBudgetDetail;
use App\Http\Controllers\ExportExcel\Budget\ExportReportModifyBudgetSummary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Services\Budget\BudgetService;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $budgetService;
    public function __construct(BudgetService $budgetService)
    {
        $this->budgetService = $budgetService;
    }

    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
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

        // dd($varAPIWebToken);

        $compact = [
            'varAPIWebToken' => $varAPIWebToken
        ];

        return view('Budget.Budget.Transactions.ModifyBudget', $compact);
    }

    public function ModifyBudgetPost(Request $request) {
        try {
            $varAPIWebToken     = $request->session()->get('SessionLogin');

            $compact = [
                'varAPIWebToken'        => $varAPIWebToken,
                'files'                 => json_decode($request->input('files'), true) == [] ? null : json_decode($request->input('files'), true),
                'budgetID'              => $request->budgetID,
                'budgetCode'            => $request->budgetCode,
                'budgetName'            => $request->budgetName,
                'subBudgetID'           => $request->subBudgetID,
                'subBudgetCode'         => $request->subBudgetCode,
                'subBudgetName'         => $request->subBudgetName,
                'reason'                => $request->reason,
                'additionalCO'          => $request->additionalCO,
                'currencyID'            => $request->currencyID,
                'currencySymbol'        => $request->currencySymbol,
                'currencyName'          => $request->currencyName,
                'exchangeRate'          => $request->exchangeRate,
                'valueCO'               => $request->valueCO,
                'budgetDetailsData'     => json_decode($request->input('budgetDetailsData'), true),
                'modifyBudgetListData'  => json_decode($request->input('modifyBudgetListData'), true),
                'totalModifyFooterData' => $request->totalModifyFooter,
                'totalPriceFooterData'  => $request->totalPriceFooter,
                'totalAmountFooterData' => $request->totalAmountFooter,
            ];
            
            // dd($request->exchangeRate);
            
            return view('Budget.Budget.Transactions.ModifyBudgetPost', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at ModifyBudgetPost: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PreviewModifyBudget(Request $request) {
        try {
            $varAPIWebToken         = $request->session()->get('SessionLogin');
            $PIC                    = $request->session()->get("SessionLoginName");

            // Add Budget & Sub Budget Code
            $budgetID               = $request->project_id;
            $budgetCode             = $request->project_code;
            $budgetName             = $request->project_name;
            $subBudgetID            = $request->site_id;
            $subBudgetCode          = $request->site_code;
            $subBudgetName          = $request->site_name;

            // Add Modify Budget
            $reason                 = $request->reason_modify ?? '-';
            $additionalCO           = $request->additional_co;
            $currencyID             = $request->currency_id;
            $currencySymbol         = $request->currency_symbol ?? '';
            $currencyName           = $request->currency_name ?? '-';
            $exchangeRate           = number_format(str_replace(",", "", $request->exchange_rate ?? 0), 2, '.', '');
            $valueCO                = str_replace(",", "", $request->value_co);

            // dump($request->value_co);
            // dump($valueCO);

            // File Attachment
            $files                  = $request->dataInput_Log_FileUpload_1 ?? [];

            // Budget Details (table)
            $budgetDetailsData      = $request->input('budgetDetailsData');

            // Modify Budget List (table)
            $modifyBudgetListData   = $request->input('modifyBudgetListData');
            $totalModifyFooter      = $request->input('totalModifyFooterData');
            $totalPriceFooter       = $request->input('totalPriceFooterData');
            $totalAmountFooter      = $request->input('totalAmountFooterData');

            // dump($modifyBudgetListData);

            // dd($totalModifyFooter, $totalPriceFooter, $totalAmountFooter);

            // SECTION ONE
            $addSubtSectionOneCO    = 0;
            $addSubtSectionOneFC    = 0; // FC -> FOREIGN CURRENCY

            // SECTION TWO
            $addSubtSectionTwoCO    = 0;
            $addSubtSectionTwoFC    = 0; // FC -> FOREIGN CURRENCY

            if ($currencySymbol != "IDR") {
                if ($valueCO) {
                    $addSubtSectionOneCO = $valueCO * $exchangeRate;
                    $addSubtSectionOneFC = $valueCO;

                    $addSubtSectionTwoCO = $exchangeRate * $totalAmountFooter;
                    $addSubtSectionTwoFC = $totalAmountFooter;
                }
            } else {
                if ($valueCO) {
                    $addSubtSectionOneCO = $valueCO;

                    $addSubtSectionTwoCO = $valueCO;
                }
            }

            // dump($valueCO * $totalAmountFooter);

            // SECTION ONE
            $originDummyCO              = 465000000;
            $originDummyFC              = 0;
            $totalCurrentCO             = $originDummyCO + $addSubtSectionOneCO;
            $totalCurrentFC             = $originDummyFC + $addSubtSectionOneFC;

            // SECTION TWO
            $originDummyAddSubt         = 376712000;
            $originDummyAddSubtFC       = 0;
            $totalCurrentAddSubt        = $originDummyAddSubt + $addSubtSectionTwoCO;
            $totalCurrentAddSubtFC      = $originDummyAddSubtFC + $addSubtSectionTwoFC;

            // SECTION FOUR
            $tempData                   = $originDummyCO - $originDummyAddSubt;
            $originDummyGrossMargin     = $tempData / ($originDummyCO + $originDummyFC);
            $previousDummyGrossMargin   = $tempData / ($originDummyCO + $originDummyFC);
            $totalCurrentGrossMargin    = $tempData / ($totalCurrentCO + $totalCurrentFC);

            $compact = [
                'varAPIWebToken'            => $varAPIWebToken,
                'pic'                       => $PIC,
                'budgetID'                  => $budgetID,
                'budgetCode'                => $budgetCode,
                'budgetName'                => $budgetName,
                'subBudgetID'               => $subBudgetID,
                'subBudgetCode'             => $subBudgetCode,
                'subBudgetName'             => $subBudgetName,
                'reason'                    => $reason,
                'additionalCO'              => $additionalCO,
                'currencyID'                => $currencyID,
                'currencySymbol'            => $currencySymbol,
                'currencyName'              => $currencyName,
                'exchangeRate'              => $exchangeRate,
                'valueCO'                   => $valueCO,
                'files'                     => $files,
                'budgetDetailsData'         => json_decode($budgetDetailsData),
                'modifyBudgetListData'      => json_decode($modifyBudgetListData),
                'totalModifyFooter'         => $totalModifyFooter,
                'totalPriceFooter'          => $totalPriceFooter,
                'totalAmountFooter'         => $totalAmountFooter,
                'dataTable'                 => [
                    'sectionOne'            => [
                        'firstRow'          => [
                            'description'   => 'Customer Order (CO)',
                            'valuta'        => 'IDR',
                            'origin'        => $originDummyCO,
                            'previous'      => $originDummyCO,
                            'addSubt'       => $addSubtSectionOneCO,
                            'totalCurrent'  => $totalCurrentCO,
                        ],
                        'secondRow'          => [
                            'description'   => '',
                            'valuta'        => 'Foreign Currency',
                            'origin'        => $originDummyFC,
                            'previous'      => $originDummyFC,
                            'addSubt'       => $addSubtSectionOneFC,
                            'totalCurrent'  => $totalCurrentFC,
                        ],
                        'thirdRow'          => [
                            'description'   => 'Total Equivalent',
                            'valuta'        => 'IDR',
                            'origin'        => $originDummyCO,
                            'previous'      => $originDummyCO,
                            'addSubt'       => $addSubtSectionOneCO,
                            'totalCurrent'  => $totalCurrentCO,
                            // 'origin'        => $originDummyCO + $originDummyFC,
                            // 'previous'      => $originDummyCO + $originDummyFC,
                            // 'addSubt'       => $addSubtSectionOneCO + $addSubtSectionOneFC,
                            // 'totalCurrent'  => $totalCurrentCO + $totalCurrentFC,
                        ],
                    ],
                    'sectionTwo'            => [
                        'firstRow'          => [
                            'description'   => 'Add(Subt) Cost',
                            'valuta'        => 'IDR',
                            'origin'        => $originDummyAddSubt,
                            'previous'      => $originDummyAddSubt,
                            'addSubt'       => $addSubtSectionTwoCO,
                            'totalCurrent'  => $totalCurrentAddSubt,
                        ],
                        'secondRow'          => [
                            'description'   => '',
                            'valuta'        => 'Foreign Currency',
                            'origin'        => $originDummyAddSubtFC,
                            'previous'      => $originDummyAddSubtFC,
                            'addSubt'       => $addSubtSectionTwoFC,
                            'totalCurrent'  => $totalCurrentAddSubtFC,
                        ],
                        'thirdRow'          => [
                            'description'   => 'Total Equivalent',
                            'valuta'        => 'IDR',
                            // 'origin'        => $originDummyAddSubt + $originDummyAddSubtFC,
                            // 'previous'      => $originDummyAddSubt + $originDummyAddSubtFC,
                            // 'addSubt'       => $addSubtSectionTwoCO + $addSubtSectionTwoFC,
                            // 'totalCurrent'  => $totalCurrentAddSubt + $totalCurrentAddSubtFC,
                            'origin'        => $originDummyAddSubt,
                            'previous'      => $originDummyAddSubt,
                            'addSubt'       => $addSubtSectionTwoCO,
                            'totalCurrent'  => $totalCurrentAddSubt,
                        ],
                    ],
                    'sectionThree'          => [
                        'firstRow'          => [
                            'description'   => 'Gross Margin',
                            'valuta'        => 'IDR',
                            'origin'        => $tempData,
                            'previous'      => $tempData,
                            'addSubt'       => 0,
                            'totalCurrent'  => $totalCurrentCO - $totalCurrentAddSubt,
                        ],
                        'secondRow'          => [
                            'description'   => '',
                            'valuta'        => 'Foreign Currency',
                            'origin'        => 0,
                            'previous'      => 0,
                            'addSubt'       => 0,
                            'totalCurrent'  => 0,
                        ],
                        'thirdRow'          => [
                            'description'   => 'Total Equivalent',
                            'valuta'        => 'IDR',
                            'origin'        => $tempData,
                            'previous'      => $tempData,
                            'addSubt'       => 0,
                            'totalCurrent'  => $totalCurrentCO - $totalCurrentAddSubt,
                            // 'totalCurrent'  => ($totalCurrentCO + $totalCurrentFC) - ($totalCurrentAddSubt + $totalCurrentAddSubtFC),
                        ],
                    ],
                    'sectionFour'          => [
                        'firstRow'          => [
                            'description'   => 'Gross Margin',
                            'valuta'        => '%',
                            'origin'        => $originDummyGrossMargin,
                            'previous'      => $previousDummyGrossMargin,
                            'addSubt'       => '',
                            'totalCurrent'  => $totalCurrentGrossMargin,
                        ],
                        'secondRow'          => [
                            'description'   => 'Gross Margin Movement',
                            'valuta'        => '%',
                            'origin'        => $totalCurrentGrossMargin - $originDummyGrossMargin,
                            'previous'      => $totalCurrentGrossMargin - $previousDummyGrossMargin,
                            'addSubt'       => '',
                            'totalCurrent'  => '',
                        ],
                        'thirdRow'          => [
                            'description'   => 'Recorded Cost',
                            'valuta'        => 'IDR',
                            'origin'        => '',
                            'previous'      => '',
                            'addSubt'       => '',
                            'totalCurrent'  => 0,
                        ],
                        'fourthRow'          => [
                            'description'   => '',
                            'valuta'        => 'Foreign Currency',
                            'origin'        => '',
                            'previous'      => '',
                            'addSubt'       => '',
                            'totalCurrent'  => 0,
                        ],
                        'fifthRow'          => [
                            'description'   => 'Total Equivalent',
                            'valuta'        => 'IDR',
                            'origin'        => '',
                            'previous'      => '',
                            'addSubt'       => '',
                            'totalCurrent'  => 0,
                        ],
                    ],
                    'sectionFive'          => [
                        'firstRow'          => [
                            'description'   => 'Actual Gross Margin',
                            'valuta'        => '%',
                            'origin'        => '',
                            'previous'      => '',
                            'addSubt'       => '',
                            'totalCurrent'  => 0,
                        ],
                    ],
                ]
            ];

            // dd($compact);

            return view('Budget.Budget.Transactions.PreviewModifyBudget', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at PreviewModifyBudget: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportModifyBudgetSummary(Request $request)
    {
        $dataReport     = Cache::get('dataReportModifyBudgetSummary') ?? [];

        $compact = [
            'dataReport' => $dataReport
        ];

        return view('Budget.Budget.Reports.ReportModifyBudgetSummary', $compact);
    }

    public function ReportModifyBudgetSummaryStore(Request $request) 
    {
        try {
            $budgetID       = $request->budget_id;
            $subBudgetID    = $request->sub_budget_id;

            if (!$budgetID && !$subBudgetID) {
                $message = 'Budget & Sub Budget Cannot Empty';
            } else if ($budgetID && !$subBudgetID) {
                $message = 'Sub Budget Cannot Empty';
            }

            if (isset($message)) {
                Cache::forget('dataReportModifyBudgetSummary');
                return redirect()->route('Budget.ReportModifyBudgetSummary')->with('NotFound', $message);
            }

            $compact = $this->budgetService->reportModifyBudgetSummaryData($request);

            if ($compact === null || empty($compact['dataHeader'])) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            Cache::put('dataReportModifyBudgetSummary', $compact, now()->addMinutes(5));

            return redirect()->route('Budget.ReportModifyBudgetSummary');
        } catch (\Throwable $th) {
            Log::error("Error at ReportModifyBudgetSummaryStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportModifyBudgetSummary(Request $request) 
    {
        try {
            $dataReport = Cache::get('dataReportModifyBudgetSummary');

            if ($dataReport) {
                switch ($request->print_type) {
                    case "PDF":
                        $pdf = PDF::loadView('Budget.Budget.Reports.ReportModifyBudgetSummary_pdf', ['dataReport' => $dataReport]);
                        $pdf->output();
                        $dom_pdf = $pdf->getDomPDF();

                        $canvas = $dom_pdf->get_canvas();
                        $width = $canvas->get_width();
                        $height = $canvas->get_height();
                        $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                        $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                        return $pdf->download('Export Report Modify Budget Summary.pdf');
                    case "Excel":
                        return Excel::download(new ExportReportModifyBudgetSummary, 'Export Report Modify Budget Summary.xlsx');
                    default:
                        return redirect()->route('Budget.ReportModifyBudgetSummary')->with('NotFound', 'Invalid Print Type');
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

            // $filteredArray = Helper_APICall::setCallAPIGateway(
            //     Helper_Environment::getUserSessionID_System(),
            //     $varAPIWebToken, 
            //     'report.form.documentForm.finance.getAdvance', 
            //     'latest',
            //     [
            //         'parameter' => [
            //             'recordID' => (int) $id
            //         ]
            //     ]
            // );

            // if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
            //     throw new \Exception('Data not found in the API response.');
            // }

            // $getData = $filteredArray['data'][0]['document'];

            $getData = [
                'header' => [
                    'date' => '2025-05-22',
                ],
                'content' => [
                    'general' => [
                        'budget' => [
                            'combinedBudgetCodeList' => ['BGT-001'],
                            'combinedBudgetNameList' => ['Operational Budget'],
                            'combinedBudgetSectionCodeList' => ['SEC-01'],
                        ],
                        'involvedPersons' => [
                            [
                                'requesterWorkerName' => 'John Doe'
                            ]
                        ]
                    ],
                    'details' => [
                        'itemList' => [
                            [
                                'entities' => [
                                    'product_RefID' => 'PRD-1001',
                                    'productName'   => 'Product A',
                                    'quantity'      => 5,
                                ]
                            ],
                            [
                                'entities' => [
                                    'product_RefID' => 'PRD-1002',
                                    'productName'   => 'Product B',
                                    'quantity'      => 3,
                                ]
                            ],
                            [
                                'entities' => [
                                    'product_RefID' => 'PRD-1003',
                                    'productName'   => 'Product C',
                                    'quantity'      => 2,
                                ]
                            ],
                        ]
                    ]
                ]
            ];

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

        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
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
        
        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
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
        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
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