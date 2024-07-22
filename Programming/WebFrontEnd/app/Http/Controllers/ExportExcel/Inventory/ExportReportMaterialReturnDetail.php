<?php

namespace App\Http\Controllers\ExportExcel\Inventory;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportMaterialReturnDetail implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Session::get("dataExcelReportMatReturnDetail");
        return collect($data);
    }

    public function headings(): array
    {
        return [
            ["Material Return Detail Report", " ", " ", " ", " ", " ", " "],
            ["", "", "", "", "", "", ""],
            ["No", "DO Number", "Product Id", "Qty", "Unit Price", "Total", "Remark"]
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

        $sheet->getStyle('A1:G1')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A1:G1');


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

        $sheet->getStyle('A3:G3')->applyFromArray($styleArrayHeader2);

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

        $totalCell = count(Session::get("dataExcelReportMatReturnDetail"));
        $lastCell = 'A4:G' . ($totalCell + 3);
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);
    }
}
