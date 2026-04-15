<?php

namespace App\Http\Controllers\ExportExcel\Process;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportBusinessTripSettlementSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataBusinessTripSettlement;

    public function __construct($dataBusinessTripSettlement)
    {
        $this->dataBusinessTripSettlement = $dataBusinessTripSettlement;
    }

    public function collection()
    {
        $data = $this->dataBusinessTripSettlement;

        $totalBsf = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $totalBsf += is_numeric($item['bsfTotal']) ? $item['bsfTotal'] : 0;

            $filteredData[] = [
                'No' => $counter++,
                'BSF Number' => $item['bsfNumber'] ?? '-',
                'Sub Budget' => ($item['combinedBudgetSectionCode'] ?? '') . ' - ' . ($item['combinedBudgetSectionName'] ?? ''),
                'Departing From' => $item['departurePoint'] ?? '-',
                'Departing To' => $item['destinationPoint'] ?? '-',
                'Date' => $item['bsfDate'] ?? '-',
                'Currency' => $item['currencyISOCode'] ?? '-',
                'Requester' => $item['requesterName'] ?? '-',
                'Total' => isset($item['bsfTotal']) ? (string) $item['bsfTotal'] : '0',
                'Remark' => $item['remarks'] ?? '-',
            ];
        }

        $filteredData[] = [
            'No' => 'GRAND TOTAL',
            'BSF Number' => '',
            'Sub Budget' => '',
            'Departing From' => '',
            'Departing To' => '',
            'Date' => '',
            'Currency' => '',
            'Requester' => '',
            'Total' => $totalBsf,
            'Remark' => '',
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            [date('F j, Y')],
            ["BUSINESS TRIP SETTLEMENT SUMMARY"],
            [date('h:i A')],
            ["Budget", ": -", "Requester", ": -"],
            ["Sub Budget", ": -", "Date Range", ": -"],
            [""],
            ["No", "BSF Number", "Sub Budget", "Departing From", "Destination To", "Date", "Currency", "Requester", "Total", "Remark"],
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
        $sheet->getStyle('A1:J1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:J1');

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
        $sheet->getStyle('A2:J2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:J2');

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
        $sheet->getStyle('A3:J3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:J3');

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
        $sheet->getStyle('A4:J4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:J5')->applyFromArray($styleArrayHeader3);

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
        $sheet->getStyle('A7:J7')->applyFromArray($styleArrayHeader4);

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

        $datas = $this->dataBusinessTripSettlement;
        $totalCell = count($datas);
        $lastCell = 'A8:J' . $totalCell + 8;
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
        $sheet->getStyle('A' . $totalCell + 8 . ':' . 'J' . $totalCell + 8)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 8 . ':H' . $totalCell + 8);
    }
}