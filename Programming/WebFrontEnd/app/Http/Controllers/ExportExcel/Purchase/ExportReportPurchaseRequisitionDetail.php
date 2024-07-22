<?php

namespace App\Http\Controllers\ExportExcel\Purchase;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportPurchaseRequisitionDetail implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Session::get("dataExcelReportPurchaseRequisitionDetail");
        return collect($data);
    }

    public function headings(): array
    {
        return [
            ["Purchase Requisition Detail Report", " ", " ", " ", " ", " ", " ", " ", " "],
            ["", "", "", "", "", "", "", "", ""],
            ["No", "Work ID", "Work Name", "Product ID", "Material Name", "Qty", "Unit Price", "Total IDR", "Total Other Currency"]
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

        $sheet->getStyle('A1:I1')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A1:I1');


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

        $sheet->getStyle('A3:I3')->applyFromArray($styleArrayHeader2);

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

        $totalCell = count(Session::get("dataExcelReportPurchaseRequisitionDetail"));
        $lastCell = 'A4:I' . ($totalCell + 3);
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);
    }
}
