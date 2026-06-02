<?php

namespace App\Http\Controllers\ExportExcel\Process;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportRemToDN implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataReport;

    public function __construct($dataReport)
    {
        $this->dataReport = $dataReport;
    }

    public function collection()
    {
        $data = $this->dataReport;

        $totalReimbursementIDR = 0;
        $totalReimbursementOtherCurrency = 0;
        $totalReimbursementEquivalentIDR = 0;
        $totalReimbursementPaymentBalance = 0;

        $totalDebitNoteIDR = 0;
        $totalDebitNoteOtherCurrency = 0;
        $totalDebitNoteEquivalentIDR = 0;
        $totalDebitNoteBalance = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $totalReimbursementIDR += is_numeric($item['REM_Total_IDR']) ? $item['REM_Total_IDR'] : 0;
            $totalReimbursementOtherCurrency += is_numeric($item['REM_Total_Other_Currency']) ? $item['REM_Total_Other_Currency'] : 0;
            $totalReimbursementEquivalentIDR += is_numeric($item['REM_Total_Equivalent_IDR']) ? $item['REM_Total_Equivalent_IDR'] : 0;
            $totalReimbursementPaymentBalance += is_numeric($item['balanceREM_ToPayment']) ? $item['balanceREM_ToPayment'] : 0;

            $totalDebitNoteIDR += is_numeric($item['DN_Total_IDR']) ? $item['DN_Total_IDR'] : 0;
            $totalDebitNoteOtherCurrency += is_numeric($item['DN_Total_Other_Currency']) ? $item['DN_Total_Other_Currency'] : 0;
            $totalDebitNoteEquivalentIDR += is_numeric($item['DN_Total_Equivalent_IDR']) ? $item['DN_Total_Equivalent_IDR'] : 0;
            $totalDebitNoteBalance += is_numeric($item['balanceREM_ToDN']) ? $item['balanceREM_ToDN'] : 0;

            $filteredData[] = [
                'No' => $counter++,
                'REM Number' => $item['REM_Number'] ?? '-',
                'REM Date' => $item['REM_Date'] ?? '-',
                'REM Customer' => ($item['REM_CustomerCode'] ?? '') . ' - ' . ($item['REM_CustomerName'] ?? ''),
                'REM Total IDR' => isset($item['REM_Total_IDR']) ? (string) $item['REM_Total_IDR'] : '0',
                'REM Total Other Currency' => isset($item['REM_Total_Other_Currency']) ? (string) $item['REM_Total_Other_Currency'] : '0',
                'REM Total Equivalent IDR' => isset($item['REM_Total_Equivalent_IDR']) ? (string) $item['REM_Total_Equivalent_IDR'] : '0',
                'REM Payment' => '0',
                'REM To Payment Balance' => isset($item['balanceREM_ToPayment']) ? (string) $item['balanceREM_ToPayment'] : '0',
                'REM Status' => $item['REM_Status'] ?? '-',
                'DN Number' => $item['DN_Number'] ?? '-',
                'DN Date' => $item['DN_Date'] ?? '-',
                'DN Total IDR' => isset($item['DN_Total_IDR']) ? (string) $item['DN_Total_IDR'] : '0',
                'DN Total Other Currency' => isset($item['DN_Total_Other_Currency']) ? (string) $item['DN_Total_Other_Currency'] : '0',
                'DN Total Equivalent IDR' => isset($item['DN_Total_Equivalent_IDR']) ? (string) $item['DN_Total_Equivalent_IDR'] : '0',
                'DN Payment' => '0',
                'REM To DN Balance' => isset($item['balanceREM_ToDN']) ? (string) $item['balanceREM_ToDN'] : '0',
                'DN Status' => $item['DN_Status'] ?? '-'
            ];
        }

        $filteredData[] = [
            'No' => 'GRAND TOTAL',
            'REM Number' => '',
            'REM Date' => '',
            'REM Customer' => '',
            'REM Total IDR' => $totalReimbursementIDR,
            'REM Total Other Currency' => $totalReimbursementOtherCurrency,
            'REM Total Equivalent IDR' => $totalReimbursementEquivalentIDR,
            'REM Payment' => '0',
            'REM To Payment Balance' => $totalReimbursementPaymentBalance,
            'REM Status' => '',
            'DN Number' => '',
            'DN Date' => '',
            'DN Total IDR' => $totalDebitNoteIDR,
            'DN Total Other Currency' => $totalDebitNoteOtherCurrency,
            'DN Total Equivalent IDR' => $totalDebitNoteEquivalentIDR,
            'DN Payment' => '0',
            'REM To DN Balance' => $totalDebitNoteBalance,
            'DN Status' => ''
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            [date('F j, Y')],
            ["REIMBURSEMENT TO DEBIT NOTE"],
            [date('h:i A')],
            ["REM Number", ": -", "Budget", ": -", "Date Range", ": -"],
            ["DN Number", ": -", "Customer", ": -"],
            [""],
            ["No", "Reimbursement", "", "", "", "", "", "", "", "", "Debit Note", "", "", "", "", "", "", ""],
            ["", "Number", "Date", "Customer", "Total IDR", "Total Other Currency", "Total Equivalent IDR", "Payment", "REM to Payment Balance", "REM Status", "Number", "Date", "Total IDR", "Total Other Currency", "Total Equivalent IDR", "Payment", "REM to DN Balance", "DN Status"]
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
        $sheet->getStyle('A1:R1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:R1');

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
        $sheet->getStyle('A2:R2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:R2');

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
        $sheet->getStyle('A3:R3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:R3');

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
        $sheet->getStyle('A4:R4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:R5')->applyFromArray($styleArrayHeader3);

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
        $sheet->getStyle('A7:R7')->applyFromArray($styleArrayHeader4);
        $sheet->getStyle('A8:R8')->applyFromArray($styleArrayHeader4);
        $sheet->mergeCells('A7:A8');
        $sheet->mergeCells('B7:J7');
        $sheet->mergeCells('K7:R7');

        $styleArrayContent = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
            ],
        ];
        $datas = $this->dataReport;
        $totalCell = count($datas);
        $lastCell = 'A9:R' . $totalCell + 9;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $styleArrayFooter = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'fill' => [
                'fillType' => 'solid',
                'rotation' => 0,
                'color' => [
                    'rgb' => 'E9ECEF',
                ],
            ],
        ];
        $sheet->getStyle('A' . $totalCell + 9 . ':' . 'R' . $totalCell + 9)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 9 . ':D' . $totalCell + 9);
        $sheet->mergeCells('J' . $totalCell + 9 . ':L' . $totalCell + 9);
    }
}