<?php

namespace App\Http\Controllers\ExportExcel\PurchaseRequisition;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportPurchaseRequisitionSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Session::get("PurchaseRequisitionSummaryDataExcel");
        return collect($data);
    }

    public function headings(): array
    {
        return [
            ["PURCHASE REQUISITION SUMMARY", " ", " ", " ", " ", " "],
            ["", "", "", "", "", "", ""],
            ["No", "Purchase Requisition Number", "Date", "Total IDR", "Total Other Currency", "Supplier"]
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

        $totalCell = count(Session::get("PurchaseRequisitionSummaryDataExcel"));
        $lastCell = 'A4:F' . $totalCell + 3;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $totalIdr = Session::get("PurchaseRequisitionSummarySumIDR");
        $totalOtherCurrency = Session::get("PurchaseRequisitionSummarySumOtherCurrency");
        
        $sheet->insertNewRowBefore($totalCell + 4, 1);
        $sheet->setCellValue('A' . $totalCell + 4, "GRAND TOTAL");
        $sheet->setCellValue('D' . $totalCell + 4, $totalIdr);
        $sheet->setCellValue('E' . $totalCell + 4, $totalOtherCurrency);
        $sheet->mergeCells('A' . $totalCell + 4 . ':' . 'C' . $totalCell + 4);

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
