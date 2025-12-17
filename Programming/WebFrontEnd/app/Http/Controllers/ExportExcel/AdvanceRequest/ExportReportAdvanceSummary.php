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
    protected $dataAdvanceSummary;

    public function __construct($dataAdvanceSummary)
    {
        $this->dataAdvanceSummary = $dataAdvanceSummary;
    }

    public function collection()
    {
        $data = $this->dataAdvanceSummary;

        $totalIDR           = 0;
        $totalOtherCurrency = 0;
        $totalEquivalentIDR = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $totalIDR           += is_numeric($item['total_IDR']) ? $item['total_IDR'] : 0;
            $totalOtherCurrency += is_numeric($item['total_Other_Currency']) ? $item['total_Other_Currency'] : 0;
            $totalEquivalentIDR += is_numeric($item['total_Equivalent_IDR']) ? $item['total_Equivalent_IDR'] : 0;

            $filteredData[] = [
                'No'                    => $counter++,
                'Advance Number'        => $item['advanceNumber'] ?? '-',
                'Sub Budget'            => ($item['combinedBudgetSectionName'] ?? '') . ' - ' . ($item['combinedBudgetSectionName'] ?? ''),
                'Date'                  => isset($item['advanceDate']) ? date('d-m-Y', strtotime($item['advanceDate'])) : '-',
                'Requester'             => $item['requesterName'] ?? '-',
                'Beneficiary'           => $item['beneficiaryName'] ?? '-',
                'Total IDR'             => $item['total_IDR'] ?? '-',
                'Total Other Currency'  => $item['total_Other_Currency'] ?? '-',
                'Total Equivalent IDR'  => $item['total_Equivalent_IDR'] ?? '-',
                'Remark'                => $item['remarks'] ?? '-',
            ];
        }

        $filteredData[] = [
            'No'                    => 'GRAND TOTAL',
            'Advance Number'        => '',
            'Sub Budget'            => '',
            'Date'                  => '',
            'Requester'             => '',
            'Beneficiary'           => '',
            'Total IDR'             => $totalIDR,
            'Total Other Currency'  => $totalOtherCurrency,
            'Total Equivalent IDR'  => $totalEquivalentIDR,
            'Remark'                => '',
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = $this->dataAdvanceSummary;

        return [
            [date('F j, Y')],
            ["ADVANCE REQUEST SUMMARY", " ", " ", " ", " ", " ", " "],
            [date('h:i A')],
            ["Budget", ": " . $data[0]['combinedBudgetCode'] . ' - ' . $data[0]['combinedBudgetName'], "", "", "", "", ""],
            ["", "", "", "", "", "", "", "", "", "", ""],
            ["No", "Advance Number", "Sub Budget", "Date", "Requester", "Beneficiary","Total IDR", "Total Other Currency","Total Equivalent IDR",  "Remark"]
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

        $sheet->getStyle('A6:J6')->applyFromArray($styleArrayHeader4);

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

        $datas      = $this->dataAdvanceSummary;
        $totalCell  = count($datas);
        $lastCell   = 'A6:J' . $totalCell + 6;
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

        $sheet->getStyle('A' . $totalCell + 7 . ':' . 'J' . $totalCell + 7)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 7 . ':F' . $totalCell + 7);
    }
}
