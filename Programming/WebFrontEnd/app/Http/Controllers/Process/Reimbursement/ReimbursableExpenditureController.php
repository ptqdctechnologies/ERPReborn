<?php


namespace App\Http\Controllers\Process\Reimbursement;

use App\Http\Controllers\ExportExcel\Process\ExportReportReimbursementDetail;
use App\Http\Controllers\ExportExcel\Process\ExportReportReimbursementSummary;
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

class ReimbursableExpenditureController extends Controller
{
    public function ReportInvoiceToCN(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportInvoiceToCNSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportInvoiceToCN', []) : [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'dataReport' => $dataReport
            ];
    
            return view('Process.Reimbursement.Reports.ReportInvoiceToCN', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportInvoiceToCN Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportInvoiceToCNData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name, $site_name, $requester_position, $beneficiary_position) 
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
                    "DocumentNumber" => "DN-24000229",
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
                    "DocumentNumber" => "DN-24000228",
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
                    "DocumentNumber" => "DN-24000227",
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
                    "DocumentNumber" => "DN-24000226",
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
                    "DocumentNumber" => "DN-24000225",
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
                    "DocumentNumber" => "DN-24000224",
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
                    "DocumentNumber" => "DN-24000223",
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
                    "DocumentNumber" => "DN-24000222",
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
                    "DocumentNumber" => "DN-24000221",
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
                    "DocumentNumber" => "DN-24000220",
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
                    "DocumentNumber" => "DN-24000219",
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
                    "DocumentNumber" => "DN-24000218",
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
                    "DocumentNumber" => "DN-24000217",
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
                    "DocumentNumber" => "DN-24000216",
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
                    "DocumentNumber" => "DN-24000215",
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
                    "DocumentNumber" => "DN-24000214",
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
                    "DocumentNumber" => "DN-24000213",
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
                    "DocumentNumber" => "DN-24000212",
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
                    "DocumentNumber" => "DN-24000211",
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
                    "DocumentNumber" => "DN-24000210",
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
                    "DocumentNumber" => "DN-24000209",
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
                    "DocumentNumber" => "DN-24000208",
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
                    "DocumentNumber" => "DN-24000207",
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
                    "DocumentNumber" => "DN-24000206",
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
                    "DocumentNumber" => "DN-24000205",
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
                    "DocumentNumber" => "DN-24000204",
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
                    "DocumentNumber" => "DN-24000203",
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
                    "DocumentNumber" => "DN-24000202",
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
                    "DocumentNumber" => "DN-24000201",
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
                    "DocumentNumber" => "DN-24000200",
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

            Session::put("isButtonReportInvoiceToCNSubmit", true);
            Session::put("dataReportInvoiceToCN", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportInvoiceToCNData Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportInvoiceToCNStore(Request $request) 
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
                Session::forget("isButtonReportInvoiceToCNSubmit");
                Session::forget("dataReportInvoiceToCN");

                return redirect()->route('Reimbursement.ReportInvoiceToCN')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Be Empty');
            }

            $compact = $this->ReportInvoiceToCNData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name, $site_name, $requester_position, $beneficiary_position);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }
            
            return redirect()->route('Reimbursement.ReportInvoiceToCN');
        } catch (\Throwable $th) {
            Log::error("ReportInvoiceToCNStore Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportInvoiceToCN(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportInvoiceToCN");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            // if ($project_code_second_trigger == null) {
            //     Session::forget("isButtonReportInvoiceToCNSubmit");
            //     Session::forget("dataReportInvoiceToCN");
        
            //     return redirect()->route('Reimbursement.ReportInvoiceToCN')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Be Empty');
            // }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Process.Reimbursement.Reports.ReportInvoiceToCN_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Invoice to Debit Note.pdf');
                } else {
                    return Excel::download(new ExportReportInvoiceToCN, 'Export Report Invoice to Debit Note.xlsx');
                }
            } else {
                return redirect()->route('Reimbursement.ReportInvoiceToCN')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportCreditNoteSummary Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportRemToDN(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportRemToDNSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportRemToDN', []) : [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'dataReport' => $dataReport
            ];
    
            return view('Process.Reimbursement.Reports.ReportRemToDN', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportRemToDN Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportRemToDNData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name, $site_name, $requester_position, $beneficiary_position) 
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
                    "DocumentNumber" => "DN-24000229",
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
                    "DocumentNumber" => "DN-24000228",
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
                    "DocumentNumber" => "DN-24000227",
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
                    "DocumentNumber" => "DN-24000226",
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
                    "DocumentNumber" => "DN-24000225",
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
                    "DocumentNumber" => "DN-24000224",
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
                    "DocumentNumber" => "DN-24000223",
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
                    "DocumentNumber" => "DN-24000222",
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
                    "DocumentNumber" => "DN-24000221",
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
                    "DocumentNumber" => "DN-24000220",
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
                    "DocumentNumber" => "DN-24000219",
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
                    "DocumentNumber" => "DN-24000218",
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
                    "DocumentNumber" => "DN-24000217",
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
                    "DocumentNumber" => "DN-24000216",
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
                    "DocumentNumber" => "DN-24000215",
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
                    "DocumentNumber" => "DN-24000214",
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
                    "DocumentNumber" => "DN-24000213",
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
                    "DocumentNumber" => "DN-24000212",
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
                    "DocumentNumber" => "DN-24000211",
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
                    "DocumentNumber" => "DN-24000210",
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
                    "DocumentNumber" => "DN-24000209",
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
                    "DocumentNumber" => "DN-24000208",
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
                    "DocumentNumber" => "DN-24000207",
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
                    "DocumentNumber" => "DN-24000206",
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
                    "DocumentNumber" => "DN-24000205",
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
                    "DocumentNumber" => "DN-24000204",
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
                    "DocumentNumber" => "DN-24000203",
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
                    "DocumentNumber" => "DN-24000202",
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
                    "DocumentNumber" => "DN-24000201",
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
                    "DocumentNumber" => "DN-24000200",
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

            Session::put("isButtonReportRemToDNSubmit", true);
            Session::put("dataReportRemToDN", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportRemToDNData Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportRemToDNStore(Request $request) 
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
                Session::forget("isButtonReportRemToDNSubmit");
                Session::forget("dataReportRemToDN");

                return redirect()->route('Reimbursement.ReportRemToDN')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Be Empty');
            }

            $compact = $this->ReportRemToDNData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name, $site_name, $requester_position, $beneficiary_position);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }
            
            return redirect()->route('Reimbursement.ReportRemToDN');
        } catch (\Throwable $th) {
            Log::error("ReportRemToDNStore Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportRemToDN(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportRemToDN");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            // if ($project_code_second_trigger == null) {
            //     Session::forget("isButtonReportRemToDNSubmit");
            //     Session::forget("dataReportRemToDN");
        
            //     return redirect()->route('Reimbursement.ReportRemToDN')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Be Empty');
            // }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Process.Reimbursement.Reports.ReportRemToDN_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Reimbursement to Debit Note.pdf');
                } else {
                    return Excel::download(new ExportReportRemToDN, 'Export Report Reimbursement to Debit Note.xlsx');
                }
            } else {
                return redirect()->route('Reimbursement.ReportRemToDN')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportCreditNoteSummary Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportReimbursementSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionReimbursementNumber");
        $dataRem = Session::get("ReimbursementReportSummaryDataPDF");

        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataHeader' => [],
            'dataRem' => $dataRem
        
        ];
        // dump($dataRem);

        return view('Process.Reimbursement.Reports.ReportReimbursementSummary', $compact);
    }

    public function ReportReimbursementSummaryData( $project_code)
    {        
        try {
            Log::error("Error at ",[$project_code]);

            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.finance.getReimbursementSummary', 
                'latest',
                [
                    'parameter' => [
                        'CombinedBudgetCode' => $project_code,
                        'Vendor_RefID' => NULL
                        // 'CombinedBudgetCode' =>  $project_code,
                        // 'CombinedBudgetSectionCode' =>  $site_code,
                        // 'Warehouse_RefID' => NULL
                    ],
                     'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                        ]
                ]
            );
            
            Log::error("Error at " ,$filteredArray);
            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');

            }
            Session::put("ReimbursementReportSummaryDataPDF", $filteredArray['data']['data']);
            Session::put("ReimbursementReportSummaryDataExcel", $filteredArray['data']['data']);
            return $filteredArray['data']['data'];
        }
        catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportReimbursementSummaryStore(Request $request)
    {
        // tes;
        try {
            $project_code = $request->project_code_second;
            // $site_code = $request->site_id_second;

            $statusHeader = "Yes";
            Log::error("Error at " ,[$request->all()]);
            if ($project_code == "") {
                Session::forget("ReimbursementReportSummaryDataPDF");
                Session::forget("ReimbursementReportSummaryDataExcel");
                
                return redirect()->route('Reimbursement.ReportReimbursementSummary')->with('NotFound', 'Cannot Empty');
            }

            $compact = $this->ReportReimbursementSummaryData($project_code);
            // dd($compact);
            // if ($compact['dataHeader'] == []) {
            //     Session::forget("PReimbursementSummaryReportDataPDF");
            //     Session::forget("PReimbursementSummaryReportDataExcel");

            //     return redirect()->back()->with('NotFound', 'Data Not Found');
            // }

            return redirect()->route('Reimbursement.ReportReimbursementSummary');
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportReimbursementSummary(Request $request)
    {
        try {
            $dataPDF = Session::get("ReimbursementReportSummaryDataPDF");
            $dataExcel = Session::get("ReimbursementReportSummaryDataExcel");

            
            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataRem = Session::get("ReimbursementReportSummaryDataPDF");
                    // dd($dataRem);

                    $pdf = PDF::loadView('Process.Reimbursement.Reports.ReportReimbursementSummary_pdf', ['dataRem' => $dataRem])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Reimbursement Summary.pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportReimbursementSummary, 'Export Report Reimbursement Summary.xlsx');
                }
            } else {
                return redirect()->route('Reimbursement.ReimbursementSummary')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionRem");

        $varDataProject = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );

        $varDataWorker = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.humanResource.getWorker', 
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

        $varData3 = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.customerRelation.getCustomer', 
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

        $varData4 = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.master.getCurrency', 
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
            'dataProject' => $varDataProject['data']['data'],
            'dataWorker' => $varDataWorker['data'],
            'data3' => $varData3['data'],
            'data4' => $varData4['data'],
        ];

        return view('Process.Reimbursement.Transactions.createRem', $compact);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $count_product = count($input['var_product_id']);

        $input_header = array(
            'var_budget_code'	=> $input['var_budget_code'],
            'var_budget_code2'	=> $input['var_budget_code2'],
            'var_sub_budget_code'	=> $input['var_sub_budget_code'],
            'var_sub_budget_code2'	=> $input['var_sub_budget_code2'],
            'var_request_name'	=> $input['var_request_name'],
            'var_beneficiary'	=> $input['var_beneficiary'],
            'var_internal_notes'	=> $input['var_internal_notes'],
            'var_bank_name'	=> $input['var_bank_name'],
            'var_account_name'	=> $input['var_account_name'],
            'var_account_number'	=> $input['var_account_number']
        );

        print_r($input_header);

        $input_product = array(); 
        if ($count_product > 0 && isset($count_product)) {
            for ($n = 0; $n < $count_product; $n++) {
                $input_product['var_product_id'] = $input['var_product_id'][$n];
                $input_product['var_product_name'] = $input['var_product_name'][$n];
                $input_product['var_quantity'] = $input['var_quantity'][$n];
                $input_product['var_uom'] = $input['var_uom'][$n];
                $input_product['var_price'] = $input['var_price'][$n];
                $input_product['var_totalPrice'] = $input['var_totalPrice'][$n];
                $input_product['var_currency'] = $input['var_currency'][$n];
                $input_product['var_remark'] = $input['var_remark'][$n];
                
                print_r($input_product);
            }
        }
    }

    public function StoreValidateRem(Request $request)
    {
        $tamp = 0; $status = 200;
        $val = $request->input('productIdRem');
        $data = $request->session()->get("SessionRem");
        if($request->session()->has("SessionRem")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val){
                    $tamp = 1;
                }
            }
            if($tamp == 0){
                $request->session()->push("SessionRem", $val);
            }
            else{
                $status = 500;
            }
        }
        else{
            $request->session()->push("SessionRem", $val);
        }

        return response()->json($status);
    }

    public function StoreValidateRem2(Request $request)
    {
        $messages = $request->session()->get("SessionRem");
        $val = $request->input('productIdRem');
        if (($key = array_search($val, $messages)) !== false) {
            unset($messages[$key]);
            $newClass = array_values($messages);
            $request->session()->put("SessionRem", $newClass);
        }
    }

    public function RevisionArfIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );
        // dd($varData);

        $varData2 = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.humanResource.getWorker', 
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
            'data' => $varData['data']['data'],
            'data2' => $varData2['data'],
        ];

        return view('Advance.Advance.Transactions.revisionARF', $compact);
    }
    
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
