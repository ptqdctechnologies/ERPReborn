<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\ExportExcel\PurchaseRequisition\ExportReportPRtoPO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;


class PurchaseRequisitionController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseRequisition");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
        ];
        return view('Purchase.PurchaseRequisition.Transactions.CreatePurchaseRequisition', $compact);
    }
    public function ReportPurchaseRequisitionSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseOrderPrNumber");
        $request->session()->forget("SessionPurchaseOrder");
        
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
        ];

        return view('Purchase.PurchaseRequisition.Reports.ReportPurchaseRequisitionSummary', $compact);
    }
    public function ReportPRtoPO(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportPRtoPOSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportPRtoPO', []) : [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'dataReport' => $dataReport
            ];
    
            return view('Purchase.PurchaseRequisition.Reports.ReportPRtoPO', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportPRtoPO Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportPRtoPOData($project_id, $site_id, $project_name, $project_code, $site_code) 
    {
        try {
            $varAPIWebToken             = Session::get('SessionLogin');
            $getReportPRtoPO    = null;

            // if (!Helper_Redis::getValue($varAPIWebToken, "ReportAdvanceSummary")) {
            //     $getReportAdvanceSummary = Helper_APICall::setCallAPIGateway(
            //         Helper_Environment::getUserSessionID_System(),
            //         $varAPIWebToken,
            //         'report.form.documentForm.finance.getReportAdvanceSummary',
            //         'latest',
            //         [
            //             'parameter' => [
            //                 'dataFilter' => [
            //                     'budgetID' => 1,
            //                     'subBudgetID' => 1,
            //                     'workID' => 1,
            //                     'productID' => 1,
            //                     'beneficiaryID' => 1,
            //                 ]
            //             ]
            //         ],
            //         false
            //     );
            // } else {
            //     $getReportAdvanceSummary = Helper_Redis::getValue($varAPIWebToken, "ReportAdvanceSummary");
            // }

            // DUMMY DATA
            $getReportPRtoPO = [
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000280",
                    "DocumentDateTimeTZ"                  => "2024-12-05 00:00:00+07",
                    "Product_ID"                          => 720077-0000,
                    "Description"                         => "Pengiriman Material Dari Bogor ke Tanjung Priuk (Container 20ft -Stuffing Luar) Cap 25 Ton",
                    "TotalAdvance"                        => "720000",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "-",
                    "DestinationTo"                       => "-",
                    "TotalExpenseClaimCart"               => "0",
                    "TotalAmountDueToCompanyCart"         => "0",
                    "remark"                              => "720000",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000279",
                    "DocumentDateTimeTZ"                  => "23-04-2025 00:00:00+07",
                    "Product_ID"                          => 720105-0000,
                    "Description"                         => "Pengiriman Material Dari Bogor ke Tanjung Priuk (Container 40ft -Stuffing Dalam) Cap 30 Ton",
                    "TotalAdvance"                        => "2000000",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "-",
                    "DestinationTo"                       => "-",
                    "TotalExpenseClaimCart"               => "0",
                    "TotalAmountDueToCompanyCart"         => "0",
                    "remark"                              => "2000000",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000278",
                    "DocumentDateTimeTZ"                  => "22-04-2025 00:00:00+07",
                    "Product_ID"                          => 129137-0000,
                    "Description"                         => "Mobilisasi-Demobilisasi",
                    "TotalAdvance"                        => "9000000",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "-",
                    "DestinationTo"                       => "-",
                    "TotalExpenseClaimCart"               => "0",
                    "TotalAmountDueToCompanyCart"         => "0",
                    "remark"                              => "9000000",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000277",
                    "DocumentDateTimeTZ"                  => "21-04-2025 00:00:00+07",
                    "Product_ID"                          => 620029-0000,
                    "Description"                         => "Sarung Tangan Kain (Polkadot)",
                    "TotalAdvance"                        => "3000000",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "PO/QDC/2025/25000233",
                    "DestinationTo"                       => "22-04-2025",
                    "TotalExpenseClaimCart"               => "100",
                    "TotalAmountDueToCompanyCart"         => "3000000",
                    "remark"                              => "0",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000276",
                    "DocumentDateTimeTZ"                  => "21-04-2025 00:00:00+07",
                    "Product_ID"                          => 810067-0000,
                    "Description"                         => "Pita Police Line",
                    "TotalAdvance"                        => "800000",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "PO/QDC/2025/25000234",
                    "DestinationTo"                       => "22-04-2025",
                    "TotalExpenseClaimCart"               => "20",
                    "TotalAmountDueToCompanyCart"         => "586000",
                    "remark"                              => "214000",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000275",
                    "DocumentDateTimeTZ"                  => "15-04-2025 00:00:00+07",
                    "Product_ID"                          => 129137-0000,
                    "Description"                         => "Mobilisasi-Demobilisasi",
                    "TotalAdvance"                        => "750000",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "-",
                    "DestinationTo"                       => "-",
                    "TotalExpenseClaimCart"               => "0",
                    "TotalAmountDueToCompanyCart"         => "0",
                    "remark"                              => "750000",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000274",
                    "DocumentDateTimeTZ"                  => "15-04-2025 00:00:00+07",
                    "Product_ID"                          => 424125-0000,
                    "Description"                         => "Overtime",
                    "TotalAdvance"                        => "2350000",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "-",
                    "DestinationTo"                       => "-",
                    "TotalExpenseClaimCart"               => "0",
                    "TotalAmountDueToCompanyCart"         => "0",
                    "remark"                              => "2350000",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000273",
                    "DocumentDateTimeTZ"                  => "15-04-2025 00:00:00+07",
                    "Product_ID"                          => 424125-0000,
                    "Description"                         => "Overtime",
                    "TotalAdvance"                        => "1175000",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "-",
                    "DestinationTo"                       => "-",
                    "TotalExpenseClaimCart"               => "0",
                    "TotalAmountDueToCompanyCart"         => "0",
                    "remark"                              => "1175000",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000272",
                    "DocumentDateTimeTZ"                  => "15-04-2025 00:00:00+07",
                    "Product_ID"                          => 129137-0000,
                    "Description"                         => "Mobilisasi-Demobilisasi",
                    "TotalAdvance"                        => "750000",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "-",
                    "DestinationTo"                       => "-",
                    "TotalExpenseClaimCart"               => "0",
                    "TotalAmountDueToCompanyCart"         => "0",
                    "remark"                              => "750000",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000271",
                    "DocumentDateTimeTZ"                  => "15-04-2025 00:00:00+07",
                    "Product_ID"                          => 720074-0000,
                    "Description"                         => "Penerbitan Delivery Order",
                    "TotalAdvance"                        => "600000",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "PO/QDC/2025/25000210",
                    "DestinationTo"                       => "11-04-2025",
                    "TotalExpenseClaimCart"               => "3",
                    "TotalAmountDueToCompanyCart"         => "600000",
                    "remark"                              => "0",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000270",
                    "DocumentDateTimeTZ"                  => "15-04-2025 00:00:00+07",
                    "Product_ID"                          => 720076-0000,
                    "Description"                         => "Freight CLN",
                    "TotalAdvance"                        => "300000",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "PO/QDC/2025/25000210",
                    "DestinationTo"                       => "11-04-2025",
                    "TotalExpenseClaimCart"               => "3",
                    "TotalAmountDueToCompanyCart"         => "300000",
                    "remark"                              => "0",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000269",
                    "DocumentDateTimeTZ"                  => "15-04-2025 00:00:00+07",
                    "Product_ID"                          => 720092-0000,
                    "Description"                         => "Terminal Handling Charge Container 40 Ft",
                    "TotalAdvance"                        => "4956756",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "PO/QDC/2025/25000210",
                    "DestinationTo"                       => "11-04-2025",
                    "TotalExpenseClaimCart"               => "3",
                    "TotalAmountDueToCompanyCart"         => "4956756",
                    "remark"                              => "0",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000268",
                    "DocumentDateTimeTZ"                  => "15-04-2025 00:00:00+07",
                    "Product_ID"                          => 720094-0000,
                    "Description"                         => "Stuffing Inside Dry Container",
                    "TotalAdvance"                        => "1801802",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "PO/QDC/2025/25000210",
                    "DestinationTo"                       => "11-04-2025",
                    "TotalExpenseClaimCart"               => "3",
                    "TotalAmountDueToCompanyCart"         => "1801802",
                    "remark"                              => "0",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                
            ];

            $reportData = is_string($getReportPRtoPO) ? json_decode($getReportPRtoPO, true) : $getReportPRtoPO;

            // $filteredData = array_filter($reportData, function ($item) use ($project_id, $site_id, $requester_id, $beneficiary_id) {
            //     return 
            //         (empty($project_id)     || $item['CombinedBudget_RefID'] == $project_id) &&
            //         (empty($site_id)        || $item['CombinedBudgetSection_RefID'] == $site_id) &&
            //         (empty($requester_id)   || $item['RequesterWorkerJobsPosition_RefID'] == $requester_id) &&
            //         (empty($beneficiary_id) || $item['BeneficiaryWorkerJobsPosition_RefID'] == $beneficiary_id);
            // });

            // $totalAdvance = array_reduce($filteredData, function ($carry, $item) {
            // $totalAdvance = array_reduce($reportData, function ($carry, $item) {
            //     return $carry + ($item['TotalAdvance'] ?? 0);
            // }, 0);

            // $totalExpense = array_reduce($reportData, function ($carry, $item) {
            //     return $carry + ($item['TotalExpenseClaimCart'] ?? 0);
            // }, 0);

            // $totalAmount = array_reduce($reportData, function ($carry, $item) {
            //     return $carry + ($item['TotalAmountDueToCompanyCart'] ?? 0);
            // }, 0);

            $compact = [
                // 'dataDetail'        => $filteredData,
                'dataDetail'        => $reportData,
                'budgetCode'        => $project_code,
                'budgetName'        => $project_name,
                'siteCode'          => $site_code,
                'requesterName'     => "",
                'beneficiaryName'   => "",
                'total'             => 0,
                'totalExpense'      => 0,
                'totalAmount'       => 0,
            ];

            Session::put("isButtonReportPRtoPOSubmit", true);
            Session::put("dataReportPRtoPO", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportPRtoPOData Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportPRtoPOStore(Request $request) 
    {
        try {
            $project_code       = $request->project_code_second;
            $project_name       = $request->project_name_second;
            $project_id         = $request->project_id_second;

            $site_id            = $request->site_id_second;
            $site_code          = $request->site_code_second;

            // $requester_id       = $request->worker_id_second;
            // $requester_name     = $request->worker_name_second;

            // $beneficiary_id     = $request->beneficiary_second_id;
            // $beneficiary_name   = $request->beneficiary_second_person_name;

            // dd($project_code, $project_name);

            $errors = [];

            if (!$project_id) {
                $errors[] = 'Budget';
            }
            if (!$site_id) {
                $errors[] = 'Sub Budget';
            }
            // if (!$requester_id) {
            //     $errors[] = 'Requester';
            // }
            // if (!$beneficiary_id) {
            //     $errors[] = 'Beneficiary';
            // }

            if (!empty($errors)) {
                $message = implode(', ', $errors) . ' Cannot Be Empty';
            }

            if (isset($message)) {
                Session::forget("isButtonReportPRtoPOSubmit");
                Session::forget("dataReportPRtoPO");
        
                return redirect()->route('PurchaseRequisition.ReportPRtoPO')->with('NotFound', $message);
            }

            $compact = $this->ReportPRtoPOData($project_id, $site_id, $project_name, $project_code, $site_code);
            // dd($compact);
            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }
            
            return redirect()->route('PurchaseRequisition.ReportPRtoPO');
        } catch (\Throwable $th) {
            Log::error("ReportPRtoPOStore Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportPRtoPO(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportPRtoPO");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            if ($project_code_second_trigger == null) {
                Session::forget("isButtonReportPRtoPOSubmit");
                Session::forget("dataReportPRtoPO");

                return redirect()->route('PurchasOrder.ReportPRtoPO')->with('NotFound', 'Budget, & Sub Budget Cannot Empty');
            }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Purchase.PurchaseRequisition.Reports.ReportPRtoPO_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report PO to DO.pdf');
                } else {
                    return Excel::download(new ExportReportPRtoPO, 'Export Report PO to DO.xlsx');
                }
            } else {
                return redirect()->route('PurchaseRequisition.ReportPRtoPO')->with('NotFound', 'Budget, & Sub Budget Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportPRtoPO Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
    public function ReportPurchaseRequisitionDetail(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseOrderPrNumber");
        $request->session()->forget("SessionPurchaseOrder");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataHeader' => []
        ];

        return view('Purchase.PurchaseRequisition.Reports.ReportPurchaseRequisitionDetail', $compact);
    }

    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
        $input = $request->all();
        // dd($input);

        $GetBusinessDoc = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'generalPurposes.businessDocument.getBusinessDocumentTypeIDByName', 
            'latest',
            [
            'parameter' => [
                'name' => 'Purchase Requisition Form'
                ]
            ]
            );
        
        $VarSelectWorkFlow = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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

        if($VarSelectWorkFlow['metadata']['HTTPStatusCode'] != "200" || count($VarSelectWorkFlow['data']) == 0){

            $compact = [
                "message" => "WorkflowError"
            ];
    
            return response()->json($compact);
        }
        else{

            $count_product = count($input['var_product_id']);
            $PurchaseRequisitionDetail = [];
            for ($n = 0; $n < $count_product; $n++) {
                $PurchaseRequisitionDetail[$n] = [
                    "entities" => [
                        "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudgetSectionDetail_RefID'][$n],
                        "product_RefID" => (int) $input['var_product_id'][$n],
                        "quantity" => (float) $input['var_quantity'][$n],
                        "quantityUnit_RefID" => 73000000000001,
                        "productUnitPriceCurrency_RefID" => 62000000000001,
                        "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
                        "productUnitPriceCurrencyExchangeRate" => 1,
                        "remarks" => $input['var_remark'][$n],
                    ]
                ];
            }

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.create.supplyChain.setPurchaseRequisition',
                'latest',
                [
                    'entities' => [
                        "documentDateTimeTZ" => $input['var_date'],
                        "log_FileUpload_Pointer_RefID" => (int)$input['dataInput_Log_FileUpload_Pointer_RefID'],
                        "requesterWorkerJobsPosition_RefID" => 164000000000497,
                        "remarks" => 'My Remarks',
                        "additionalData" => [
                            "itemList" => [
                                "items" => $PurchaseRequisitionDetail
                            ]
                        ]
                    ]
                ]
            );
        }
        // Var Data -> Combined Budget -> Approver Entity -> Submitter Entity
        return $this->SelectWorkFlow($varData, $SessionWorkerCareerInternal_RefID, $VarSelectWorkFlow);
    }


    public function PurchaseRequisitionListData(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataPurchaseRequisition = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseRequisition',
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
            'data' => $varDataPurchaseRequisition['data'],
        ];
            
        return response()->json($compact);
    }

    public function RevisionPrIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseRequisition");

        $varDataProcReqRevision = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.supplyChain.getPurchaseRequisition',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $request->searchPrNumberRevisionId
                ]
            ]
        );
        // dd($varDataProcReqRevision);
        
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'log_FileUpload_Pointer_RefID' => $varDataProcReqRevision['data'][0]['document']['content']['general']['attachmentFiles']['main']['log_FileUpload_Pointer_RefID'],
            'budget' => $varDataProcReqRevision['data'][0]['document']['content']['general']['budget'],
            'trano' => $varDataProcReqRevision['data'][0]['document']['header']['number'],
            'var_recordID' => $request->searchPrNumberRevisionId,
            'statusRevisi' => 1,
        ];

        return view('Purchase.PurchaseRequisition.Transactions.RevisionPurchaseRequisition', $compact);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $count_product = count($input['var_product_id']);
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $ProcReqDetail = [];
        if ($count_product > 0 && isset($count_product)) {
            for ($n = 0; $n < $count_product; $n++) {
                $ProcReqDetail[$n] = [
                    'recordID' => ((!$input['var_recordIDDetail'][$n]) ? null : (int) $input['var_recordIDDetail'][$n]),
                    'entities' => [
                        "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
                        "product_RefID" => (int) $input['var_product_id'][$n],
                        "quantity" => (float) $input['var_quantity'][$n],
                        "quantityUnit_RefID" => 73000000000001,
                        "productUnitPriceCurrency_RefID" => 62000000000001,
                        "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
                        "productUnitPriceCurrencyExchangeRate" => 1,
                        "remarks" => $input['var_remark'][$n],
                    ]
                ];
            }
        }

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.supplyChain.setPurchaseRequisition',
            'latest',
            [
                'recordID' => (int)$input['var_recordID'],
                'entities' => [
                    "documentDateTimeTZ" => $input['var_date'],
                    "log_FileUpload_Pointer_RefID" => (int)$input['dataInput_Log_FileUpload_Pointer_RefID'],
                    "requesterWorkerJobsPosition_RefID" => 164000000000497,
                    "remarks" => 'My Remarks',
                    "additionalData" => [
                        "itemList" => [
                            "items" => $ProcReqDetail
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

    public function ProcReqListCartRevision(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $ProcReqRefID = $request->input('ProcReqRefID');

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
            'latest',
            [
                'parameter' => [
                    'purchaseRequisition_RefID' => (int) $ProcReqRefID
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