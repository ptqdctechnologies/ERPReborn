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
                'Departing From'                    => $item['DepartingFrom'] ?? null,
                'Destination To'                    => $item['DestinationTo'] ?? null,
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
        $data = Session::get("dataReportReportBusinessTripSettlementSummary");

        return [
            [date('F j, Y')],
            ["BUSINESS TRIP SETTLEMENT SUMMARY", " ", " ", " ", " ", " ", " "],
            [date('h:i A')],
            ["Budget", ": " . $data['budgetCode'] . ' - ' . $data['budgetName'], "", "", "", "", "", "", "", "", ""],
            ["", "", "", "", "", "", "", "", "", "", ""],
            ["No", "BSF Number", "Sub Budget", "Departing From", "Destination To", "Date", "Total Expense Claim Cart", "Total Amount Due to Company Cart", "Total BSF", "Currency", "Requester", "Beneficiary", "Remark"]
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

        $sheet->getStyle('A1:M1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:M1');

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

        $sheet->getStyle('A2:M2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:M2');

        $styleArrayHeader = [
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

        $sheet->getStyle('A3:M3')->applyFromArray($styleArrayHeader);
        $sheet->mergeCells('A3:M3');

        $styleArrayHeader2 = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
            ],
        ];

        $sheet->getStyle('A4:M4')->applyFromArray($styleArrayHeader2);

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

        $sheet->getStyle('A6:M6')->applyFromArray($styleArrayHeader4);

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
        $lastCell = 'A7:M' . $totalCell + 6;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $total = $datas['total'];

        $sheet->insertNewRowBefore($totalCell + 7, 1);
        $sheet->setCellValue('A' . $totalCell + 7, "GRAND TOTAL");
        $sheet->setCellValue('G' . $totalCell + 7, 50000);
        $sheet->setCellValue('H' . $totalCell + 7, 200000);
        $sheet->setCellValue('I' . $totalCell + 7, $total);
        $sheet->mergeCells('A' . $totalCell + 7 . ':' . 'D' . $totalCell + 7);

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

        $sheet->getStyle('A' . $totalCell + 7 . ':' . 'M' . $totalCell + 7)->applyFromArray($styleArrayFooter);

    }
}
