<?php

namespace App\Http\Controllers\ExportExcel\Process;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportLoantoLoanSettlement implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataReport;

    public function __construct($dataReport)
    {
        $this->dataReport = $dataReport;
    }

    public function collection()
    {
        $data = $this->dataReport;

        // LOAN - PRINCIPAL LOAN
        $totalPrincipalLoanIDR = 0;
        $totalPrincipalLoanOtherCurrency = 0;
        $totalPrincipalLoanEquivalentIDR = 0;
        $totalPrincipalLoanPayment = 0;
        $totalPrincipalLoanSettlement = 0;

        // LOAN - TOTAL LOAN
        $totalLoanIDR = 0;
        $totalLoanOtherCurrency = 0;
        $totalLoanEquivalentIDR = 0;

        // LOAN SETTLEMENT - SETTLEMENT VALUE
        $totalSettlementIDR = 0;
        $totalSettlementOtherCurrency = 0;
        $totalSettlementEquivalentIDR = 0;
        $totalSettlementPayment = 0;

        // LOAN SETTLEMENT - PAYMENT VALUE
        $totalSettlementPenaltyIDR = 0;
        $totalSettlementPenaltyOtherCurrency = 0;
        $totalSettlementPenaltyEquivalentIDR = 0;

        // LOAN SETTLEMENT - INTEREST VALUE
        $totalSettlementInterestIDR = 0;
        $totalSettlementInterestOtherCurrency = 0;
        $totalSettlementInterestEquivalentIDR = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            // LOAN - PRINCIPAL LOAN
            $totalPrincipalLoanIDR += 0;
            $totalPrincipalLoanOtherCurrency += 0;
            $totalPrincipalLoanEquivalentIDR += 0;
            $totalPrincipalLoanPayment += 0;
            $totalPrincipalLoanSettlement += 0;

            // LOAN - TOTAL LOAN
            $totalLoanIDR += 0;
            $totalLoanOtherCurrency += 0;
            $totalLoanEquivalentIDR += 0;

            // LOAN SETTLEMENT - SETTLEMENT VALUE
            $totalSettlementIDR += 0;
            $totalSettlementOtherCurrency += 0;
            $totalSettlementEquivalentIDR += 0;
            $totalSettlementPayment += 0;

            // LOAN SETTLEMENT - PAYMENT VALUE
            $totalSettlementPenaltyIDR += 0;
            $totalSettlementPenaltyOtherCurrency += 0;
            $totalSettlementPenaltyEquivalentIDR += 0;

            // LOAN SETTLEMENT - INTEREST VALUE
            $totalSettlementInterestIDR += 0;
            $totalSettlementInterestOtherCurrency += 0;
            $totalSettlementInterestEquivalentIDR += 0;

            $filteredData[] = [
                'No' => $counter++,
                'Loan Number' => $item['loanNumber'] ?? null,
                'Loan Date' => $item['loanDate'] ?? null,
                'Loan Debitor' => $item['loanDebitorName'] ?? null,
                'Loan Creditor' => $item['loanCreditorName'] ?? null,
                'Loan Rate' => '-',
                'Loan Term' => '-',
                'Loan Principal IDR' => '-',
                'Loan Principal Other Currency' => '-',
                'Loan Principal Equivalent IDR' => '-',
                'Loan Principal Payment' => '-',
                'Loan Principal Settlement' => '-',
                'Loan IDR' => '-',
                'Loan Other Currency' => '-',
                'Loan Equivalent IDR' => '-',
                'Loan Status' => '-',
                'Loan Remark' => '-',
                'Settlement Number' => $item['loanSettleNumber'] ?? null,
                'Settlement Date' => $item['loanSettleDate'] ?? null,
                'Settlement Debitor' => '-',
                'Settlement Creditor' => '-',
                'Settlement IDR' => '-',
                'Settlement Other Currency' => '-',
                'Settlement Equivalent IDR' => '-',
                'Settlement Payment' => '-',
                'Settlement Penalty IDR' => '-',
                'Settlement Penalty Other Currency' => '-',
                'Settlement Penalty Equivalent IDR' => '-',
                'Settlement Interest IDR' => '-',
                'Settlement Interest Other Currency' => '-',
                'Settlement Interest Equivalent IDR' => '-',
                'Settlement Interest Status' => '-',
                'Settlement Interest Remark' => '-'
            ];
        }

        $filteredData[] = [
            'No' => 'GRAND TOTAL',
            'Loan Number' => '',
            'Loan Date' => '',
            'Loan Debitor' => '',
            'Loan Creditor' => '',
            'Loan Rate' => '-',
            'Loan Term' => '-',
            'Loan Principal IDR' => $totalPrincipalLoanIDR,
            'Loan Principal Other Currency' => $totalPrincipalLoanOtherCurrency,
            'Loan Principal Equivalent IDR' => $totalPrincipalLoanEquivalentIDR,
            'Loan Principal Payment' => $totalPrincipalLoanPayment,
            'Loan Principal Settlement' => $totalPrincipalLoanSettlement,
            'Loan IDR' => $totalLoanIDR,
            'Loan Other Currency' => $totalLoanOtherCurrency,
            'Loan Equivalent IDR' => $totalLoanEquivalentIDR,
            'Loan Status' => '-',
            'Loan Remark' => '-',
            'Settlement Number' => '-',
            'Settlement Date' => '-',
            'Settlement Debitor' => '-',
            'Settlement Creditor' => '-',
            'Settlement IDR' => $totalSettlementIDR,
            'Settlement Other Currency' => $totalSettlementOtherCurrency,
            'Settlement Equivalent IDR' => $totalSettlementEquivalentIDR,
            'Settlement Payment' => $totalSettlementPayment,
            'Settlement Penalty IDR' => $totalSettlementPenaltyIDR,
            'Settlement Penalty Other Currency' => $totalSettlementPenaltyOtherCurrency,
            'Settlement Penalty Equivalent IDR' => $totalSettlementPenaltyEquivalentIDR,
            'Settlement Interest IDR' => $totalSettlementInterestIDR,
            'Settlement Interest Other Currency' => $totalSettlementInterestOtherCurrency,
            'Settlement Interest Equivalent IDR' => $totalSettlementInterestEquivalentIDR,
            'Settlement Interest Status' => '-',
            'Settlement Interest Remark' => '-'
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            [date('F j, Y')],
            ["LOAN TO LOAN SETTLEMENT"],
            [date('h:i A')],
            ["Loan Number", ": -", "Budget", ": -", "Creditor", ": -"],
            ["Loan Settlement Number", ": -", "Date Range", ": -", "Debitor", ": -"],
            [""],
            [
                "No",
                "Loan",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "Loan Settlement",
            ],
            [
                "",
                "Number",
                "Date",
                "Debitor",
                "Creditor",
                "Rate (%)",
                "Term",
                "Principal Loan",
                "",
                "",
                "",
                "",
                "Total Loan",
                "",
                "",
                "Status",
                "Remark",
                "Number",
                "Date",
                "Debitor",
                "Creditor",
                "Settlement Value",
                "",
                "",
                "",
                "Penalty Value",
                "",
                "",
                "Interest Value",
                "",
                "",
                "Status",
                "Remark"
            ],
            [
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "Total IDR",
                "Total Other Currency",
                "Total Equivalent IDR",
                "Principal Loan to Payment",
                "Principal Loan to Settlement",
                "Total IDR",
                "Total Other Currency",
                "Total Equivalent IDR",
                "",
                "",
                "",
                "",
                "",
                "",
                "Total IDR",
                "Total Other Currency",
                "Total Equivalent IDR",
                "Settlement to Payment",
                "Total IDR",
                "Total Other Currency",
                "Total Equivalent IDR",
                "Total IDR",
                "Total Other Currency",
                "Total Equivalent IDR"
            ],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $styleArrayHeader0 = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_RIGHT,
            ]
        ];
        $sheet->getStyle('A1:AG1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:AG1');

        $styleArrayHeader1 = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ]
        ];
        $sheet->getStyle('A2:AG2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:AG2');

        $styleArrayHeader2 = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_RIGHT,
            ]
        ];
        $sheet->getStyle('A3:AG3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:AG3');

        $styleArrayHeader3 = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
            ]
        ];
        $sheet->getStyle('A4:AG4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:AG5')->applyFromArray($styleArrayHeader3);

        $styleArrayHeader4 = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => 'solid',
                'rotation' => 0,
                'color' => [
                    'rgb' => 'E9ECEF',
                ],
            ],
        ];
        $sheet->getStyle('A7:AG7')->applyFromArray($styleArrayHeader4);
        $sheet->getStyle('A8:AG8')->applyFromArray($styleArrayHeader4);
        $sheet->getStyle('A9:AG9')->applyFromArray($styleArrayHeader4);
        $sheet->mergeCells('A7:A9');
        $sheet->mergeCells('B7:Q7');
        $sheet->mergeCells('R7:AG7');
        $sheet->mergeCells('H8:L8');
        $sheet->mergeCells('M8:O8');
        $sheet->mergeCells('V8:Y8');
        $sheet->mergeCells('Z8:AB8');
        $sheet->mergeCells('AC8:AE8');
        $sheet->mergeCells('B8:B9');
        $sheet->mergeCells('C8:C9');
        $sheet->mergeCells('D8:D9');
        $sheet->mergeCells('E8:E9');
        $sheet->mergeCells('F8:F9');
        $sheet->mergeCells('G8:G9');
        $sheet->mergeCells('P8:P9');
        $sheet->mergeCells('Q8:Q9');
        $sheet->mergeCells('R8:R9');
        $sheet->mergeCells('S8:S9');
        $sheet->mergeCells('T8:T9');
        $sheet->mergeCells('U8:U9');
        $sheet->mergeCells('AF8:AF9');
        $sheet->mergeCells('AG8:AG9');
    }
}