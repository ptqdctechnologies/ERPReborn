<?php

namespace App\Http\Controllers\ExportExcel\AdvanceRequest;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportAdvanceSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Session::get("AdvanceSummaryReportDataExcel");
        return collect($data);
    }

    public function headings(): array
    {
        return [
            ["ADVANCE REQUEST SUMMARY", " ", " ", " ", " ", " ", " "],
            ["", "", "", "", "", "", ""],
            ["No", "Advance Number", "Sub Budget", "Date", "Total", "Currency", "Requester", "Beneficiary", "Remark"]
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

        $totalCell = count(Session::get("AdvanceSummaryReportDataExcel"));
        $lastCell = 'A4:I' . $totalCell + 3;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $total = Session::get("AdvanceSummaryReportTotal");

        $sheet->insertNewRowBefore($totalCell + 4, 1);
        $sheet->setCellValue('A' . $totalCell + 4, "GRAND TOTAL");
        $sheet->setCellValue('E' . $totalCell + 4, $total);
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

        $sheet->getStyle('A' . $totalCell + 4 . ':' . 'I' . $totalCell + 4)->applyFromArray($styleArrayFooter);

    }
}
