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

class ExportReportBusinessTripSettlementSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Session::get("dataReportReportBusinessTripSettlementSummary");

        $filteredData = [];
        $counter = 1;
        foreach ($data['dataDetail'] as $item) {
            $filteredData[] = [
                'No'                                => $counter++,
                'BSF Number'                        => $item['DocumentNumber'] ?? null,
                'Sub Budget'                        => $item['CombinedBudgetSectionName'] ?? null,
                'Departing From'                    => "Jakarta",
                'Destination To'                    => "Batam",
                'Date'                              => date('d-m-Y', strtotime($item['DocumentDateTimeTZ'])) ?? null,
                'Total Expense Claim Cart'          => 50000,
                'Total Amount Due to Company Cart'  => 200000,
                'Total BSF'                         => $item['TotalAdvance'] ?? null,
                'Currency'                          => $item['CurrencyName'] ?? null,
                'Requester'                         => $item['RequesterWorkerName'] ?? null,
                'Beneficiary'                       => $item['BeneficiaryWorkerName'] ?? null,
                'Remark'                            => $item['remark'] ?? null,
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            ["BUSINESS TRIP SETTLEMENT SUMMARY", " ", " ", " ", " ", " ", " "],
            ["", "", "", "", "", "", ""],
            ["No", "BSF Number", "Sub Budget", "Departing From", "Destination To", "Date", "Total Expense Claim Cart", "Total Amount Due to Company Cart", "Total BSF", "Currency", "Requester", "Beneficiary", "Remark"]
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

        $sheet->getStyle('A1:M1')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A1:M1');


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

        $sheet->getStyle('A3:M3')->applyFromArray($styleArrayHeader2);

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

        $datas = Session::get("dataReportReportBusinessTripSettlementSummary");
        $totalCell = count($datas['dataDetail']);
        $lastCell = 'A4:M' . $totalCell + 3;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $total = $datas['total'];

        $sheet->insertNewRowBefore($totalCell + 4, 1);
        $sheet->setCellValue('A' . $totalCell + 4, "GRAND TOTAL");
        $sheet->setCellValue('G' . $totalCell + 4, 50000);
        $sheet->setCellValue('H' . $totalCell + 4, 200000);
        $sheet->setCellValue('I' . $totalCell + 4, $total);
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

        $sheet->getStyle('A' . $totalCell + 4 . ':' . 'M' . $totalCell + 4)->applyFromArray($styleArrayFooter);

    }
}
