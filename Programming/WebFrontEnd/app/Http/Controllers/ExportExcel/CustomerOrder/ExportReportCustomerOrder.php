<?php

namespace App\Http\Controllers\ExportExcel\CustomerOrder;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportCustomerOrder implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataCustomerOrder, $budget, $coDate;

    public function __construct($dataCustomerOrder, $budget, $coDate)
    {
        $this->dataCustomerOrder = $dataCustomerOrder;
        $this->budget = $budget;
        $this->coDate = $coDate;
    }

    public function collection()
    {
        $data = $this->dataCustomerOrder;

        $total = 0;
        $totalVAT = 0;
        $totalWithVAT = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $value = (float) ($item['value'] ?? 0.00);
            $valueRatio = (float) ($item['vatRatio'] ?? 0.00);

            $resultTotalVAT = ($value * $valueRatio) / 100;
            $resultTotalWithVAT = $value + $resultTotalVAT;

            $total += $value;
            $totalVAT += $resultTotalVAT;
            $totalWithVAT += $resultTotalWithVAT;

            $filteredData[] = [
                'No' => $counter++,
                'Customer Order' => $item['customerOrderNumber'] ?? '-',
                'Budget' => ($item['combinedBudgetCode'] ?? '') . ' - ' . ($item['combinedBudgetName'] ?? ''),
                'Date' => $item['date'] ?? '-',
                'Total' => number_format($value, 2, '.', ','),
                'VAT' => number_format($valueRatio, 2, '.', ',') . ' %',
                'Total VAT' => number_format($resultTotalVAT, 2, '.', ','),
                'Total With VAT' => number_format($resultTotalWithVAT, 2, '.', ','),
                'Notes' => htmlspecialchars($dataDetail['notes'] ?? '-')
            ];
        }

        $filteredData[] = [
            'No' => 'GRAND TOTAL',
            'Customer Order' => '',
            'Budget' => '',
            'Date' => '',
            'Total' => number_format($total, 2, '.', ','),
            'VAT' => '',
            'Total VAT' => number_format($totalVAT, 2, '.', ','),
            'Total With VAT' => number_format($totalWithVAT, 2, '.', ','),
            'Notes' => ''
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        $budget = $this->budget;
        $coDate = $this->coDate;

        return [
            [date('F j, Y')],
            ["CUSTOMER ORDER SUMMARY"],
            [date('h:i A')],
            ["Budget", ": " . $budget, "Date Range", ": " . $coDate],
            [""],
            ["No", "CO Number", "Budget", "Date", "Total", "VAT", "Total VAT", "Total With VAT", "Notes"]
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

        $sheet->getStyle('A3:I3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:I3');

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

        $sheet->getStyle('A4:I4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:I5')->applyFromArray($styleArrayHeader3);

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

        $sheet->getStyle('A6:I6')->applyFromArray($styleArrayHeader4);

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

        $datas = $this->dataCustomerOrder;
        $totalCell = count($datas);
        $lastCell = 'A6:I' . $totalCell + 6;
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
        $sheet->mergeCells('A' . $totalCell + 7 . ':D' . $totalCell + 7);
    }
}
