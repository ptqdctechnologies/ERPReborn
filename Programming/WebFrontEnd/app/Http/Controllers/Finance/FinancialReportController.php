<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\ExportExcel\Finance\ExportReportGeneralLedger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class FinancialReportController extends Controller
{
    public function ReportGeneralLedger(Request $request)
    {
        return view('Accounting.GeneralJournal.Reports.ReportGeneralLedger');
    }

    public function ReportGeneralLedgerStore(Request $request)
    {
        try {
            $date = $request->date;
            $accountNumber = $request->account_number;
            $dataDummy = [
                [
                    "chartOfAccountCode" => "1-1100",
                    "chartOfAccountName" => "Cash & Bank",
                    "bankName" => "BCA",
                    "accountNumber" => "0065557750",
                    "accountName" => "PT QDC Technologies",
                    "date" => "2026/01/03",
                    "journalNumber" => "Journal/QDC/2026/000001",
                    "description" => "Saldo awal kas operasional",
                    "refDocument" => "INV/QDC/2026/000001",
                    "debit" => "15000000",
                    "credit" => "0",
                    "balance" => "15000000"
                ],
                [
                    "chartOfAccountCode" => "1-1200",
                    "chartOfAccountName" => "Accounts Receivable",
                    "bankName" => "BNI",
                    "accountNumber" => "8995885888",
                    "accountName" => "PT QDC Technologies",
                    "date" => "2026/01/05",
                    "journalNumber" => "Journal/QDC/2026/000002",
                    "description" => "Piutang penjualan customer PT Maju Jaya",
                    "refDocument" => "INV/QDC/2026/000002",
                    "debit" => "8500000",
                    "credit" => "0",
                    "balance" => "8500000"
                ],
                [
                    "chartOfAccountCode" => "5-5100",
                    "chartOfAccountName" => "Office Supplies Expense",
                    "bankName" => "BJB",
                    "accountNumber" => "8880888880888",
                    "accountName" => "PT QDC Technologies",
                    "date" => "2026/01/06",
                    "journalNumber" => "Journal/QDC/2026/000003",
                    "description" => "Pembelian alat tulis kantor",
                    "refDocument" => "PO/QDC/2026/000003",
                    "debit" => "1250000",
                    "credit" => "0",
                    "balance" => "1250000"
                ],
                [
                    "chartOfAccountCode" => "2-2100",
                    "chartOfAccountName" => "Accounts Payable",
                    "bankName" => "BCA",
                    "accountNumber" => "0065557750",
                    "accountName" => "PT QDC Technologies",
                    "date" => "2026/01/07",
                    "journalNumber" => "Journal/QDC/2026/000004",
                    "description" => "Hutang pembelian perlengkapan",
                    "refDocument" => "INV/QDC/2026/000004",
                    "debit" => "0",
                    "credit" => "3200000",
                    "balance" => "3200000"
                ],
                [
                    "chartOfAccountCode" => "4-4100",
                    "chartOfAccountName" => "Sales Revenue",
                    "bankName" => "BNI",
                    "accountNumber" => "8995885888",
                    "accountName" => "PT QDC Technologies",
                    "date" => "2026/01/08",
                    "journalNumber" => "Journal/QDC/2026/000005",
                    "description" => "Pendapatan penjualan produk",
                    "refDocument" => "INV/QDC/2026/000005",
                    "debit" => "0",
                    "credit" => "12500000",
                    "balance" => "12500000"
                ],
                [
                    "chartOfAccountCode" => "1-1300",
                    "chartOfAccountName" => "Inventory",
                    "bankName" => "BJB",
                    "accountNumber" => "8880888880888",
                    "accountName" => "PT QDC Technologies",
                    "date" => "2026/01/09",
                    "journalNumber" => "Journal/QDC/2026/000006",
                    "description" => "Penambahan stok barang",
                    "refDocument" => "PR/QDC/2026/000006",
                    "debit" => "6700000",
                    "credit" => "0",
                    "balance" => "6700000"
                ],
                [
                    "chartOfAccountCode" => "5-5200",
                    "chartOfAccountName" => "Utilities Expense",
                    "bankName" => "BCA",
                    "accountNumber" => "0065557750",
                    "accountName" => "PT QDC Technologies",
                    "date" => "2026/01/10",
                    "journalNumber" => "Journal/QDC/2026/000007",
                    "description" => "Pembayaran listrik dan air",
                    "refDocument" => "INV/QDC/2026/000007",
                    "debit" => "2100000",
                    "credit" => "0",
                    "balance" => "2100000"
                ],
                [
                    "chartOfAccountCode" => "1-1100",
                    "chartOfAccountName" => "Cash & Bank",
                    "bankName" => "BNI",
                    "accountNumber" => "8995885888",
                    "accountName" => "PT QDC Technologies",
                    "date" => "2026/01/11",
                    "journalNumber" => "Journal/QDC/2026/000008",
                    "description" => "Penerimaan pembayaran customer",
                    "refDocument" => "INV/QDC/2026/000008",
                    "debit" => "9800000",
                    "credit" => "0",
                    "balance" => "24800000"
                ],
                [
                    "chartOfAccountCode" => "5-5300",
                    "chartOfAccountName" => "Transportation Expense",
                    "bankName" => "BJB",
                    "accountNumber" => "8880888880888",
                    "accountName" => "PT QDC Technologies",
                    "date" => "2026/01/12",
                    "journalNumber" => "Journal/QDC/2026/000009",
                    "description" => "Biaya transportasi pengiriman",
                    "refDocument" => "PO/QDC/2026/000009",
                    "debit" => "850000",
                    "credit" => "0",
                    "balance" => "850000"
                ],
                [
                    "chartOfAccountCode" => "2-2200",
                    "chartOfAccountName" => "Tax Payable",
                    "bankName" => "BCA",
                    "accountNumber" => "0065557750",
                    "accountName" => "PT QDC Technologies",
                    "date" => "2026/01/13",
                    "journalNumber" => "Journal/QDC/2026/000010",
                    "description" => "Pencatatan hutang pajak",
                    "refDocument" => "INV/QDC/2026/000010",
                    "debit" => "0",
                    "credit" => "1750000",
                    "balance" => "1750000"
                ],
            ];

            $dates = explode(' - ', $date);

            $startDate = $dates[0] ?? null;
            $endDate = $dates[1] ?? null;

            $filteredData = array_filter($dataDummy, function ($item) use ($accountNumber, $startDate, $endDate) {

                $matchBank = empty($accountNumber)
                    || $item['accountNumber'] == $accountNumber;

                $matchStartDate = empty($startDate)
                    || $item['date'] >= $startDate;

                $matchEndDate = empty($endDate)
                    || $item['date'] <= $endDate;

                return $matchBank && $matchStartDate && $matchEndDate;
            });

            $compact = [
                'status' => 200,
                'data' => array_values($filteredData)
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report General Ledger Store Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportGeneralLedger(Request $request)
    {
        try {
            $dataReport = json_decode($request->dataReport, true);
            $type = $request->printType;

            if ($dataReport) {
                if ($type === "PDF") {
                    $pdf = PDF::loadView('Accounting.GeneralJournal.Reports.ReportGeneralLedger_pdf', ['dataReport' => $dataReport])
                        ->setPaper('a4', 'landscape');

                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();
                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report General Ledger.pdf');
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportReportGeneralLedger($dataReport), 'Export Report General Ledger.xlsx');
                } else {

                }
            } else {

            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report General Ledger Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }
}