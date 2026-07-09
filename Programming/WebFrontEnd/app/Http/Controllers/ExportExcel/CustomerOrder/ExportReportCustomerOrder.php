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
    protected $dataCustomerOrder;

    public function __construct($dataCustomerOrder)
    {
        $this->dataCustomerOrder = $dataCustomerOrder;
    }

    public function collection()
    {
        $data = $this->dataCustomerOrder;

        $total = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $total += is_numeric($item['value']) ? $item['value'] : 0;

            $filteredData[] = [
                'No' => $counter++,
                'Customer Order' => '-',
                'Budget' => ($item['combinedBudgetSectionCode'] ?? '') . ' - ' . ($item['combinedBudgetSectionName'] ?? ''),
                'Date' => $item['date'] ?? '-',
                'Total' => $item['value'] ?? '-',
                'Notes' => $item['notes'] ?? '-'
            ];
        }

        $filteredData[] = [
            'No' => 'GRAND TOTAL',
            'Customer Order' => '',
            'Budget' => '',
            'Date' => '',
            'Total' => $total,
            'Notes' => ''
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            [date('F j, Y')],
            ["CUSTOMER ORDER SUMMARY"],
            [date('h:i A')],
            ["Budget", ": ", "Date Range", ": "],
            [""],
            ["No", "CO Number", "Budget", "Date", "Total", "Notes"]
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

        $sheet->getStyle('A1:F1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:F1');

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

        $sheet->getStyle('A2:F2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:F2');

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

        $sheet->getStyle('A3:F3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:F3');

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

        $sheet->getStyle('A4:F4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:F5')->applyFromArray($styleArrayHeader3);

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

        $sheet->getStyle('A6:F6')->applyFromArray($styleArrayHeader4);

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
        $lastCell = 'A6:F' . $totalCell + 6;
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

        $sheet->getStyle('A' . $totalCell + 7 . ':' . 'F' . $totalCell + 7)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 7 . ':D' . $totalCell + 7);
    }
}
