<?php

namespace App\Http\Controllers\ExportExcel\Finance;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportGeneralLedger implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataReport;

    public function __construct($dataReport)
    {
        $this->dataReport = $dataReport;
    }

    public function collection()
    {
        $data = $this->dataReport;

        $totalDebit = 0;
        $totalCredit = 0;
        $totalBalance = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $totalDebit += is_numeric($item['credit']) ? $item['credit'] : 0;
            $totalCredit += is_numeric($item['debit']) ? $item['debit'] : 0;
            $totalBalance += is_numeric($item['balance']) ? $item['balance'] : 0;

            $filteredData[] = [
                'No' => $counter++,
                'Date' => $item['date'] ?? '-',
                'Journal Number' => $item['journalNumber'] ?? '-',
                'Description' => $item['description'] ?? '-',
                'Ref Doc' => $item['refDocument'] ?? '-',
                'Debit' => $item['debit'] ?? '-',
                'Credit' => $item['credit'] ?? '-',
                'Balance' => $item['balance'] ?? '-',
                'COA' => ($item['chartOfAccountCode'] ?? '') . ' - ' . ($item['chartOfAccountName'] ?? ''),
            ];
        }

        $filteredData[] = [
            'No' => 'GRAND TOTAL',
            'Date' => '',
            'Journal Number' => '',
            'Description' => '',
            'Ref Doc' => '',
            'Debit' => $totalDebit,
            'Credit' => $totalCredit,
            'Balance' => $totalBalance,
            'COA' => ''
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            [date('F j, Y')],
            ["GENERAL LEDGER"],
            [date('h:i A')],
            ["Account Name", ": ", "Date Range", ": "],
            [""],
            ["No", "Date", "Journal Number", "Description", "Ref Doc", "Debit (Rp)", "Credit (Rp)", "Balance (Rp)", "COA"]
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
        $sheet->getStyle('A1:I1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:I1');

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
        $sheet->getStyle('A2:I2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:I2');

        $styleArrayHeader = [
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
        $sheet->getStyle('A3:I3')->applyFromArray($styleArrayHeader);
        $sheet->mergeCells('A3:I3');

        $styleArrayHeader4 = [
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
        $sheet->getStyle('A4:I4')->applyFromArray($styleArrayHeader4);

        $styleArrayHeader6 = [
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
        $sheet->getStyle('A6:I6')->applyFromArray($styleArrayHeader6);

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
        $lastCell = 'A7:I' . $totalCell + 6;
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

        $sheet->getStyle('A' . $totalCell + 7 . ':' . 'I' . $totalCell + 7)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 7 . ':E' . $totalCell + 7);
    }
}