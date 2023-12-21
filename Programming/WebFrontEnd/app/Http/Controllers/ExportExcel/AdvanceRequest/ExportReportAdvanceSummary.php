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
        return ["No", "Transaction Number", "Date", "Total IDR", "Other Currency", "Beneficiary", "Remark"];
    }

    public function styles(Worksheet $sheet)
    {
        $styleArrayHeader = [
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

        $sheet->getStyle('A1:G1')->applyFromArray($styleArrayHeader);


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
        $lastCell = 'A2:G' . $totalCell + 1;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $sum_idr = Session::get("AdvanceSummaryReportSumIDR");
        $sum_other = Session::get("AdvanceSummaryReportSumOtherCurrency");

        $sheet->insertNewRowBefore($totalCell + 2, 1);
        $sheet->setCellValue('A' . $totalCell + 2, "GRAND TOTAL");
        $sheet->setCellValue('D' . $totalCell + 2, $sum_idr);
        $sheet->setCellValue('E' . $totalCell + 2, $sum_other);
        $sheet->mergeCells('A' . $totalCell + 2 . ':' . 'C' . $totalCell + 2);

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

        $sheet->getStyle('A' . $totalCell + 2 . ':' . 'G' . $totalCell + 2)->applyFromArray($styleArrayFooter);

    }
}
