<?php

namespace App\Http\Controllers\ExportExcel\Process;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportBusinessTripRequestDetail implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Session::get("dataReportBusinessTripRequestDetail");

        $filteredData = [];
        $counter = 1;
        foreach ($data['dataDetails']['details']['itemList'] as $item) {
            $filteredData[] = [
                'No'                            => $counter++,
                'Product ID'                    => $item['entities']['product_RefID'] ?? null,
                'Description & Spesifications'  => $item['entities']['productName'] ?? null,
                'Qty'                           => $item['entities']['quantity'] ?? null,
                'Unit Price'                    => number_format($item['entities']['priceBaseCurrencyValue'], 2, '.', ',') ?? null,
                'Total Advance'                 => number_format($item['entities']['quantity'] * $item['entities']['priceBaseCurrencyValue'], 2, '.', ',') ?? null,
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            ["BUSINESS TRIP REQUEST DETAIL", " ", " ", " ", " ", " "],
            ["", "", "", "", "", ""],
            ["No", "Product ID", "Description & Spesifications", "Qty", "Unit Price", "Total Advance"]
        ];
    }

    public function styles(Worksheet $sheet)
    {
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

        $sheet->getStyle('A1:F1')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A1:F1');

        $styleArrayHeader2 = [
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

        $sheet->getStyle('A3:F3')->applyFromArray($styleArrayHeader2);

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

        $datas = Session::get("dataReportBusinessTripRequestDetail");
        $totalCell = count($datas['dataDetails']['details']['itemList']);
        $lastCell = 'A4:F' . $totalCell + 3;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $total = $datas['total'];

        $sheet->insertNewRowBefore($totalCell + 4, 1);
        $sheet->setCellValue('A' . $totalCell + 4, "GRAND TOTAL");
        $sheet->setCellValue('F' . $totalCell + 4, $total);
        $sheet->mergeCells('A' . $totalCell + 4 . ':' . 'D' . $totalCell + 4);

        $styleArrayFooter = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
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

        $sheet->getStyle('A' . $totalCell + 4 . ':' . 'F' . $totalCell + 4)->applyFromArray($styleArrayFooter);

    }
}
