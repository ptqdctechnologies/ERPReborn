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
        return ["No", "Transaction Number", "Date", "Currency", "Advance Total", "Beneficiary", "Remark"];
    }

    public function styles(Worksheet $sheet)
    {
        $styleArrayHeader = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => 'FFFFFF',
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
                    'rgb' => '4B586A',
                ],
            ],
        ];

        $sheet->getStyle('A1:G1')->applyFromArray($styleArrayHeader);


        $styleArrayContent = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ]
        ];

        $totalCell = count(Session::get("AdvanceSummaryReportDataExcel"));
        $lastCell = 'A2:G'. $totalCell+1;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);
    }
}