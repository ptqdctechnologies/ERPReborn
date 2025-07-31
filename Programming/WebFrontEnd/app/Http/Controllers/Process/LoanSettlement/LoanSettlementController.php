<?php


namespace App\Http\Controllers\Process\LoanSettlement;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class LoanSettlementController extends Controller
{
    public function ReportLoanSettlementSummary(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportLoanSettlementSummarySubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportLoanSettlementSummary', []) : [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'dataReport' => $dataReport
            ];
    
            return view('Process.LoanSettlement.Reports.ReportLoanSettlementSummary', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportLoanSettlementSummary Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanSettlementSummaryData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name, $site_name, $requester_position, $beneficiary_position) 
    {
        try {
            $varAPIWebToken             = Session::get('SessionLogin');
            $getReportAdvanceSummary    = null;

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

            // DUMMY DATA (2 PAGE)
            $getReportAdvanceSummary = [
                [
                    "DocumentNumber" => "BRF-24000229",
                    "DocumentDateTimeTZ" => "2024-12-27 00:00:00+07",
                    "TotalBusinessTrip" => "6300000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Ahmad Faiz Haems Muda",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Abdul Rachman",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Presentasi project Tanjung Pinang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Tanjung Pinang",
                    "DirectToVendor" => "11632633.83",
                    "ByCorpCard" => "5095132.82",
                ],
                [
                    "DocumentNumber" => "BRF-24000228",
                    "DocumentDateTimeTZ" => "2024-12-27 00:00:00+07",
                    "TotalBusinessTrip" => "8400000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Ahmad Choerul",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agnes Sutedja",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Training teknisi Merauke",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Merauke",
                    "DirectToVendor" => "12993994.42",
                    "ByCorpCard" => "4296891.03",
                ],
                [
                    "DocumentNumber" => "BRF-24000227",
                    "DocumentDateTimeTZ" => "2024-12-27 00:00:00+07",
                    "TotalBusinessTrip" => "5900000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Achmad Yunadi",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Nuryadi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Maintenance BTS Pangkal Pinang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Pangkal Pinang",
                    "DirectToVendor" => "2389051.36",
                    "ByCorpCard" => "8143150.32",
                ],
                [
                    "DocumentNumber" => "BRF-24000226",
                    "DocumentDateTimeTZ" => "2024-12-26 00:00:00+07",
                    "TotalBusinessTrip" => "7600000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Ahmad Choerul",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Aden Bagus",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Survey lokasi Gorontalo",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Gorontalo",
                    "DirectToVendor" => "6054697.34",
                    "ByCorpCard" => "12253790.16",
                ],
                [
                    "DocumentNumber" => "BRF-24000225",
                    "DocumentDateTimeTZ" => "2024-12-26 00:00:00+07",
                    "TotalBusinessTrip" => "5200000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Agnes Sutedja",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Salim",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Meeting vendor Bengkulu",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Bengkulu",
                    "DirectToVendor" => "9761372.59",
                    "ByCorpCard" => "10151969.28",
                ],
                [
                    "DocumentNumber" => "BRF-24000224",
                    "DocumentDateTimeTZ" => "2024-12-25 00:00:00+07",
                    "TotalBusinessTrip" => "6900000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agnes Sutedja",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Audit site Kendari",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Kendari",
                    "DirectToVendor" => "4566099.89",
                    "ByCorpCard" => "5316023.26",
                ],
                [
                    "DocumentNumber" => "BRF-24000223",
                    "DocumentDateTimeTZ" => "2024-12-24 00:00:00+07",
                    "TotalBusinessTrip" => "4700000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Fauzi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Training team Jambi",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Jambi",
                    "DirectToVendor" => "5247421.23",
                    "ByCorpCard" => "1215213.85",
                ],
                [
                    "DocumentNumber" => "BRF-24000222",
                    "DocumentDateTimeTZ" => "2024-12-23 00:00:00+07",
                    "TotalBusinessTrip" => "8100000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "221",
                    "CombinedBudgetSectionName" => "Halat Medan",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Faiz Haems Muda",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Instalasi perangkat Ternate",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Ternate",
                    "DirectToVendor" => "555701.37",
                    "ByCorpCard" => "1085223.38",
                ],
                [
                    "DocumentNumber" => "BRF-24000221",
                    "DocumentDateTimeTZ" => "2024-12-20 00:00:00+07",
                    "TotalBusinessTrip" => "5600000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "221",
                    "CombinedBudgetSectionName" => "Halat Medan",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Choerul",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Meeting koordinasi Mataram",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Mataram",
                    "DirectToVendor" => "9846572.38",
                    "ByCorpCard" => "7405033.38",
                ],
                [
                    "DocumentNumber" => "BRF-24000220",
                    "DocumentDateTimeTZ" => "2024-12-19 00:00:00+07",
                    "TotalBusinessTrip" => "7300000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "221",
                    "CombinedBudgetSectionName" => "Halat Medan",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Aden Bagus",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Survey lokasi Balikpapan",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Balikpapan",
                    "DirectToVendor" => "412834.03",
                    "ByCorpCard" => "7023584.36",
                ],
                [
                    "DocumentNumber" => "BRF-24000219",
                    "DocumentDateTimeTZ" => "2024-12-19 00:00:00+07",
                    "TotalBusinessTrip" => "6400000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "221",
                    "CombinedBudgetSectionName" => "Halat Medan",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Achmad Yunadi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Maintenance BTS Kupang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Kupang",
                    "DirectToVendor" => "8144604.62",
                    "ByCorpCard" => "1742125.93",
                ],
                [
                    "DocumentNumber" => "BRF-24000218",
                    "DocumentDateTimeTZ" => "2024-12-19 00:00:00+07",
                    "TotalBusinessTrip" => "7100000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "221",
                    "CombinedBudgetSectionName" => "Halat Medan",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Abdul Rachman",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Presentasi project Samarinda",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Samarinda",
                    "DirectToVendor" => "1678891.67",
                    "ByCorpCard" => "11445578.27",
                ],
                [
                    "DocumentNumber" => "BRF-24000217",
                    "DocumentDateTimeTZ" => "2024-12-18 00:00:00+07",
                    "TotalBusinessTrip" => "4900000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "240",
                    "CombinedBudgetSectionName" => "Cendana Andalas",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Agnes Sutedja",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Fauzi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Meeting vendor Malang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Malang",
                    "DirectToVendor" => "13076269.64",
                    "ByCorpCard" => "3469770.83",
                ],
                [
                    "DocumentNumber" => "BRF-24000216",
                    "DocumentDateTimeTZ" => "2024-12-17 00:00:00+07",
                    "TotalBusinessTrip" => "8800000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "240",
                    "CombinedBudgetSectionName" => "Cendana Andalas",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Agnes Sutedja",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Faiz Haems Muda",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Audit site Sorong",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Sorong",
                    "DirectToVendor" => "3636630.76",
                    "ByCorpCard" => "1019176.27",
                ],
                [
                    "DocumentNumber" => "BRF-24000215",
                    "DocumentDateTimeTZ" => "2024-12-13 00:00:00+07",
                    "TotalBusinessTrip" => "5300000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "240",
                    "CombinedBudgetSectionName" => "Cendana Andalas",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Agnes Sutedja",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Choerul",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Training teknisi Padang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Padang",
                    "DirectToVendor" => "5584803.97",
                    "ByCorpCard" => "1074832.13",
                ],
                [
                    "DocumentNumber" => "BRF-24000214",
                    "DocumentDateTimeTZ" => "2024-12-13 00:00:00+07",
                    "TotalBusinessTrip" => "6700000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "240",
                    "CombinedBudgetSectionName" => "Cendana Andalas",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Agnes Sutedja",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Salim",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Instalasi perangkat Banjarmasin",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Banjarmasin",
                    "DirectToVendor" => "11699956.83",
                    "ByCorpCard" => "981594.58",
                ],
                [
                    "DocumentNumber" => "BRF-24000213",
                    "DocumentDateTimeTZ" => "2024-12-12 00:00:00+07",
                    "TotalBusinessTrip" => "7800000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "240",
                    "CombinedBudgetSectionName" => "Cendana Andalas",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Agnes Sutedja",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Nuryadi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Survey lokasi Pontianak",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Pontianak",
                    "DirectToVendor" => "6191598.49",
                    "ByCorpCard" => "2423840.88",
                ],
                [
                    "DocumentNumber" => "BRF-24000212",
                    "DocumentDateTimeTZ" => "2024-12-11 00:00:00+07",
                    "TotalBusinessTrip" => "5100000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "248",
                    "CombinedBudgetSectionName" => "Bukit Pakis Sby Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Achmad Yunadi",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Adhe Kurniawan",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Meeting koordinasi Pekanbaru",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Pekanbaru",
                    "DirectToVendor" => "3990965.70",
                    "ByCorpCard" => "895938.52",
                ],
                [
                    "DocumentNumber" => "BRF-24000211",
                    "DocumentDateTimeTZ" => "2024-12-10 00:00:00+07",
                    "TotalBusinessTrip" => "8200000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "248",
                    "CombinedBudgetSectionName" => "Bukit Pakis Sby Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Achmad Yunadi",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Aden Bagus",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Maintenance BTS Ambon",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Ambon",
                    "DirectToVendor" => "4290339.17",
                    "ByCorpCard" => "2207263.87",
                ],
                [
                    "DocumentNumber" => "BRF-24000210",
                    "DocumentDateTimeTZ" => "2024-12-10 00:00:00+07",
                    "TotalBusinessTrip" => "6200000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "248",
                    "CombinedBudgetSectionName" => "Bukit Pakis Sby Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Achmad Yunadi",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Salim",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Training team Yogyakarta",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Yogyakarta",
                    "DirectToVendor" => "6506060.02",
                    "ByCorpCard" => "6407582.00",
                ],
                [
                    "DocumentNumber" => "BRF-24000209",
                    "DocumentDateTimeTZ" => "2024-12-10 00:00:00+07",
                    "TotalBusinessTrip" => "7500000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Salim",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Presentasi project Denpasar",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Denpasar",
                    "DirectToVendor" => "4580540.68",
                    "ByCorpCard" => "7677468.37",
                ],
                [
                    "DocumentNumber" => "BRF-24000208",
                    "DocumentDateTimeTZ" => "2024-12-10 00:00:00+07",
                    "TotalBusinessTrip" => "5800000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Adhe Kurniawan",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Survey lokasi Palembang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Palembang",
                    "DirectToVendor" => "9812027.67",
                    "ByCorpCard" => "4722046.68",
                ],
                [
                    "DocumentNumber" => "BRF-24000207",
                    "DocumentDateTimeTZ" => "2024-12-09 00:00:00+07",
                    "TotalBusinessTrip" => "9000000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Aden Bagus",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Audit site Jayapura",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Jayapura",
                    "DirectToVendor" => "9217656.66",
                    "ByCorpCard" => "1818964.19",
                ],
                [
                    "DocumentNumber" => "BRF-24000206",
                    "DocumentDateTimeTZ" => "2024-12-09 00:00:00+07",
                    "TotalBusinessTrip" => "4200000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Faiz Haems Muda",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Meeting koordinasi Semarang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Semarang",
                    "DirectToVendor" => "8767743.46",
                    "ByCorpCard" => "2790922.28",
                ],
                [
                    "DocumentNumber" => "BRF-24000205",
                    "DocumentDateTimeTZ" => "2024-12-09 00:00:00+07",
                    "TotalBusinessTrip" => "8500000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Fauzi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Maintenance BTS Manado",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Manado",
                    "DirectToVendor" => "9445254.91",
                    "ByCorpCard" => "11937158.49",
                ],
                [
                    "DocumentNumber" => "BRF-24000204",
                    "DocumentDateTimeTZ" => "2024-12-06 00:00:00+07",
                    "TotalBusinessTrip" => "3800000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Aldi Mulyadi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Training teknisi Bandung",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Bandung",
                    "DirectToVendor" => "7185994.58",
                    "ByCorpCard" => "513655.62",
                ],
                [
                    "DocumentNumber" => "BRF-24000203",
                    "DocumentDateTimeTZ" => "2024-12-05 00:00:00+07",
                    "TotalBusinessTrip" => "7200000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Nuryadi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Instalasi perangkat Makassar",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Makassar",
                    "DirectToVendor" => "5075630.00",
                    "ByCorpCard" => "1780691.21",
                ],
                [
                    "DocumentNumber" => "BRF-24000202",
                    "DocumentDateTimeTZ" => "2024-12-04 00:00:00+07",
                    "TotalBusinessTrip" => "5500000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Choerul",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Meeting vendor Surabaya",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Surabaya",
                    "DirectToVendor" => "668860.66",
                    "ByCorpCard" => "9816691.90",
                ],
                [
                    "DocumentNumber" => "BRF-24000201",
                    "DocumentDateTimeTZ" => "2024-12-03 00:00:00+07",
                    "TotalBusinessTrip" => "4500000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agnes Sutedja",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Survey lokasi BTS Medan",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Medan",
                    "DirectToVendor" => "163579.34",
                    "ByCorpCard" => "3944147.35",
                ],
                [
                    "DocumentNumber" => "BRF-24000200",
                    "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
                    "TotalBusinessTrip" => "6000000.00",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agnes Sutedja",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "BT Pak Sagala presentasi HTLS Batam",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Batam",
                    "DirectToVendor" => "1906782.56",
                    "ByCorpCard" => "789801.69",
                ],
            ];

            $reportData = is_string($getReportAdvanceSummary) ? json_decode($getReportAdvanceSummary, true) : $getReportAdvanceSummary;

            $filteredData = array_filter($reportData, function ($item) use ($project_code, $site_name, $requester_name, $beneficiary_name) {
                return 
                    (empty($project_code)     || $item['CombinedBudgetCode'] == $project_code) &&
                    (empty($site_name)        || $item['CombinedBudgetSectionName'] == $site_name) &&
                    (empty($requester_name)   || $item['RequesterWorkerName'] == $requester_name) &&
                    (empty($beneficiary_name) || $item['BeneficiaryWorkerName'] == $beneficiary_name);
                    // (empty($project_id)     || $item['CombinedBudget_RefID'] == $project_id) &&
                    // (empty($site_id)        || $item['CombinedBudgetSection_RefID'] == $site_id) &&
                    // (empty($requester_id)   || $item['RequesterWorkerJobsPosition_RefID'] == $requester_id) &&
                    // (empty($beneficiary_id) || $item['BeneficiaryWorkerJobsPosition_RefID'] == $beneficiary_id);
            });

            // $totalAdvance = array_reduce($filteredData, function ($carry, $item) {
            $totalAdvance = array_reduce($filteredData, function ($carry, $item) {
                return $carry + ($item['TotalAdvance'] ?? 0);
            }, 0);

            $compact = [
                // 'dataDetail'         => $filteredData,
                'dataDetail'            => $filteredData,
                'budgetCode'            => $project_code,
                'budgetName'            => $project_name,
                'budgetId'              => $project_id,
                'siteCode'              => $site_code,
                'siteName'              => $site_name,
                'siteId'                => $site_id,
                'requesterName'         => $requester_name,
                'requesterId'           => $requester_id,
                'requesterPosition'     => $requester_position,
                'beneficiaryName'       => $beneficiary_name,
                'beneficiaryId'         => $beneficiary_id,
                'beneficiaryPosition'   => $beneficiary_position,
                'total'                 => $totalAdvance,
            ];

            Session::put("isButtonReportLoanSettlementSummarySubmit", true);
            Session::put("dataReportLoanSettlementSummary", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportLoanSettlementSummaryData Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanSettlementSummaryStore(Request $request) 
    {
        try {
            $project_code           = $request->project_code_second;
            $project_name           = $request->project_name_second;
            $project_id             = $request->project_id_second;

            $site_id                = $request->site_id_second;
            $site_code              = $request->site_code_second;
            $site_name              = $request->site_name_second;

            $requester_id           = $request->worker_id_second;
            $requester_name         = $request->worker_name_second;
            $requester_position     = $request->worker_position_second;

            $beneficiary_id         = $request->beneficiary_second_id;
            $beneficiary_name       = $request->beneficiary_second_person_name;
            $beneficiary_position   = $request->beneficiary_second_person_position;

            if (!$project_id && !$site_id && !$requester_id && !$beneficiary_id) {
                Session::forget("isButtonReportLoanSettlementSummarySubmit");
                Session::forget("dataReportLoanSettlementSummary");

                return redirect()->route('LoanSettlement.ReportLoanSettlementSummary')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Be Empty');
            }

            $compact = $this->ReportLoanSettlementSummaryData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name, $site_name, $requester_position, $beneficiary_position);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }
            
            return redirect()->route('LoanSettlement.ReportLoanSettlementSummary');
        } catch (\Throwable $th) {
            Log::error("ReportLoanSettlementSummaryStore Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportLoanSettlementSummary(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportLoanSettlementSummary");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            if ($project_code_second_trigger == null) {
                Session::forget("isButtonReportLoanSettlementSummarySubmit");
                Session::forget("dataReportLoanSettlementSummary");
        
                return redirect()->route('LoanSettlement.ReportLoanSettlementSummary')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Be Empty');
            }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Process.LoanSettlement.Reports.ReportLoanSettlementSummary_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Business Trip Request Summary.pdf');
                } else {
                    return Excel::download(new ExportReportLoanSettlementSummary, 'Export Report Business Trip Request Summary.xlsx');
                }
            } else {
                return redirect()->route('LoanSettlement.ReportLoanSettlementSummary')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportLoanSettlementSummary Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanSettlementDetail(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportLoanSettlementDetailSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportLoanSettlementDetail', []) : [];

            $compact = [
                'varAPIWebToken'    => $varAPIWebToken,
                'dataReport'        => $dataReport
            ];

            return view('Process.LoanSettlement.Reports.ReportLoanSettlementDetail', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportLoanSettlementDetail Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanSettlementDetailData($brf_trano, $brf_id, $brf_budget, $brf_budget_name, $brf_sub_budget, $brf_sub_budget_name)
    {
        try {
            $varAPIWebToken         = Session::get('SessionLogin');
            // $getReportAdvanceDetail = Helper_APICall::setCallAPIGateway(
            //     Helper_Environment::getUserSessionID_System(),
            //     $varAPIWebToken, 
            //     'report.form.documentForm.finance.getAdvance', 
            //     'latest',
            //     [
            //         'parameter' => [
            //             'recordID' => (int) $advance_id
            //         ]
            //     ]
            // );

            $getReportAdvanceDetail = [
                'data' => [
                    "0" => [
                        "document" => [
                            "header" => [
                                "recordID"                      => "76000000000002",
                                "title"                         => "Advance Form",
                                "number"                        => "Adv/QDC/2022/000239",
                                "version"                       => "0",
                                "date"                          => "2022-12-13",
                                "businessDocumentType_RefID"    => "77000000000057"
                            ],
                            "content" => [
                                "general" => [
                                    "budget" => [
                                        "multipleSource" => false,
                                        "combinedBudget_RefIDList" => [
                                            "0" => "46000000000033"
                                        ],
                                        "combinedBudgetCodeList" => [
                                            "0" => "Q000062"
                                        ],
                                        "combinedBudgetNameList" => [
                                            "0" => "XL Microcell 2007"
                                        ],
                                        "combinedBudgetSection_RefIDList" => [
                                            "0" => "143000000000307"
                                        ],
                                        "combinedBudgetSectionCodeList" => [
                                            "0" => "240"
                                        ],
                                        "combinedBudgetSectionNameList" => [
                                            "0" => "Cendana Andalas"
                                        ],
                                    ],
                                    "businessDocument" => [
                                        "businessDocumentList" => [
                                            "recordID"  => "74000000020307",
                                            "formBusinessDocumentNumber_RefID" => "76000000000002",
                                            "type_RefID" => "77000000000057",
                                            "typeName" => "Advance Form",
                                            "number" => "Adv/QDC/2022/000239",
                                            "version" => "0",
                                            "dateTimeTZ" => "2022-12-13T00:00:00+07:00"
                                        ],
                                    ],
                                    "workFlow" => [
                                        "historyList" => [
                                            "0" => null
                                        ]
                                    ],
                                    "bankAccount" => [
                                        "beneficiary" => [
                                            "bankAccount_RefID" => "167000000000001",
                                            "bankName" => "Bank Central Asia",
                                            "bankAccountNumber" => "0063032911",
                                            "bankAcronym" => "BCA",
                                            "bankAccountName" => "PT QDC Technologies"
                                        ]
                                    ],
                                    "involvedPersons" => [
                                        "0" => [
                                            "sequence" => "1",
                                            "requesterWorkerJobsPosition_RefID" => "164000000000001",
                                            "requesterWorkerFullName" => "Abdollah Syani Siregar",
                                            "requesterWorkerName" => "Abdollah Syani Siregar",
                                            "requesterWorkerFullJobsPositionTitle" => "",
                                            "requesterWorkerJobsPositionName" => null,
                                            "requesterWorkerDepartmentName" => null,
                                            "beneficiaryWorkerJobsPosition_RefID" => "25000000000439",
                                            "beneficiaryWorkerFullName" => null,
                                            "beneficiaryWorkerName" => "Abdul Rachman",
                                            "beneficiaryWorkerFullJobsPositionTitle" => null,
                                            "beneficiaryWorkerJobsPositionName" => null,
                                            "beneficiaryWorkerDepartmentName" => null,
                                        ]
                                    ],
                                    "internalNotes" => "My Internal Notes",
                                    "remarks" => "test jumat"
                                ],
                                "details" => [
                                    "itemList" => [
                                        "0" => [
                                            "index" => 1,
                                            "dataSource" => "SchData-OLTP-Finance.TblAdvanceDetail",
                                            "recordID" => "82000000000003",
                                            "entities" => [
                                                "product_RefID" => "88000000000927",
                                                "productName" => "PLN - Biaya Penyambungan",
                                                "quantity" => "0.5",
                                                "quantityUnit_RefID" => "73000000000024",
                                                "quantityUnitName" => "kva",
                                                "productUnitPriceBaseCurrencyValue" => "12000000",
                                                "priceCurrency_RefID" => "62000000000001",
                                                "priceCurrencyISOCode" => "IDR",
                                                "priceBaseCurrencyValue" => "6000000",
                                                "combinedBudgetSectionDetail_RefID" => "169000000000030",
                                                "combinedBudget_RefID" => "46000000000033"
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ];

            $splitResponse = $getReportAdvanceDetail['data'][0]['document'];

            $compact = [
                'dataHeaderOne'     => [
                    'brfId'             => $brf_id,
                    'brfNumber'         => $brf_trano,
                    'budgetCode'        => $brf_budget,
                    'budgetName'        => $brf_budget_name,
                    'siteCode'          => $brf_sub_budget,
                    'siteName'          => $brf_sub_budget_name,
                    'productID'         => '820005-0000',
                    'productName'       => 'Travel & Fares/Business Trip',
                    'dateCommence'      => '2024-12-18',
                    'dateEnd'           => '2024-12-20',
                    'dateBRF'           => '2024-12-12',
                    'contactPhone'      => '0896734873',
                    'bankType'          => $splitResponse['content']['general']['bankAccount']['beneficiary']['bankAcronym'],
                    'bankAccountNumber' => $splitResponse['content']['general']['bankAccount']['beneficiary']['bankAccountNumber'],
                    'bankAccountName'   => $splitResponse['content']['general']['bankAccount']['beneficiary']['bankAccountName'],
                    'requester'         => $splitResponse['content']['general']['involvedPersons'][0]['requesterWorkerName'],
                    'beneficiary'       => $splitResponse['content']['general']['involvedPersons'][0]['beneficiaryWorkerName'],
                    'departingFrom'     => 'Jakarta',
                    'destinationTo'     => 'Batam',
                ],
                'dataHeaderTwo'     => [
                    'totalAllowance'        => '240000.00',
                    'totalEntertainment'    => '100000.00',
                    'totalOther'            => '100000.00',
                    'totalTransport'        => '3450000.00',
                    'totalAccommodation'    => '0.00',
                    'totalBusinessTrip'     => '3890000.00',
                ],
                'dataHeaderThree'   => [
                    'reason'    => 'Silahturahmi PLN JBT dan cari info tender batam beserta info lain'
                ],
            ];

            Session::put("isButtonReportLoanSettlementDetailSubmit", true);
            Session::put("dataReportLoanSettlementDetail", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportLoanSettlementDetailData Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanSettlementDetailStore(Request $request)
    {
        try {
            $brf_trano              = $request->brf_number_trano;
            $brf_id                 = $request->brf_number_id;
            $brf_budget             = $request->brf_number_budget;
            $brf_budget_name        = $request->brf_number_budget_name;
            $brf_sub_budget         = $request->brf_number_sub_budget;
            $brf_sub_budget_name    = $request->brf_number_sub_budget_name;

            if (!$brf_id) {
                Session::forget("isButtonReportLoanSettlementDetailSubmit");
                Session::forget("dataReportLoanSettlementDetail");

                return redirect()->route('LoanSettlement.ReportLoanSettlementDetail')->with('NotFound', 'BRF Number Cannot Be Empty');
            }

            $compact = $this->ReportLoanSettlementDetailData($brf_trano, $brf_id, $brf_budget, $brf_budget_name, $brf_sub_budget, $brf_sub_budget_name);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('LoanSettlement.ReportLoanSettlementDetail');
        } catch (\Throwable $th) {
            Log::error("ReportLoanSettlementDetailStore Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
