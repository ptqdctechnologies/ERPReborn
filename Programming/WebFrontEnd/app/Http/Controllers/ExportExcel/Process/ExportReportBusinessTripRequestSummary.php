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

class ExportReportBusinessTripRequestSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Session::get("dataReportBusinessTripRequestSummary");

        $filteredData = [];
        $counter = 1;
        foreach ($data['dataDetail'] as $item) {
            $filteredData[] = [
                'No'                => $counter++,
                'Advance Number'    => $item['DocumentNumber'] ?? null,
                'Sub Budget'        => $item['CombinedBudgetSectionName'] ?? null,
                'Departing From'    => $item['DepartingFrom'] ?? null,
                'Destination To'    => $item['DestinationTo'] ?? null,
                'Date'              => date('d-m-Y', strtotime($item['DocumentDateTimeTZ'])) ?? null,
                'Total'             => $item['TotalAdvance'] ?? null,
                'Currency'          => $item['CurrencyName'] ?? null,
                'Requester'         => $item['RequesterWorkerName'] ?? null,
                'Beneficiary'       => $item['BeneficiaryWorkerName'] ?? null,
                'Remark'            => $item['remark'] ?? null,
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = Session::get("dataReportBusinessTripRequestSummary");

        return [
            [date('F j, Y')],
            ["BUSINESS TRIP REQUEST SUMMARY"],
            [date('h:i A')],
            ["Budget", ": " . $data['budgetCode'] . ' - ' . $data['budgetName'], "Requester", ": " . $data['requesterName'], "", "", "", "", "", "", ""],
            ["Sub Budget", ": " . $data['siteCode'] . ' - ' . $data['siteName'], "Beneficiary", ": " . $data['beneficiaryName'], "", "", "", "", "", "", ""],
            ["", "", "", "", "", "", "", "", "", "", ""],
            ["No", "BRF Number", "Sub Budget", "Departing From", "Destination To", "Date", "Total", "Currency", "Requester", "Beneficiary", "Remark"],
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
        $sheet->getStyle('A1:K1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:K1');

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

        $sheet->getStyle('A2:K2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:K2');

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
        $sheet->getStyle('A3:K3')->applyFromArray($styleArrayHeader);
        $sheet->mergeCells('A3:K3');

        $styleArrayHeader4 = [
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
        $sheet->getStyle('A4:K4')->applyFromArray($styleArrayHeader4);

        $styleArrayHeader5 = [
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
        $sheet->getStyle('A5:K5')->applyFromArray($styleArrayHeader5);

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

        $sheet->getStyle('A7:K7')->applyFromArray($styleArrayHeader2);

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

        $datas = Session::get("dataReportBusinessTripRequestSummary");
        $totalCell = count($datas['dataDetail']);
        $lastCell = 'A7:K' . $totalCell + 7;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $total = $datas['total'];

        $sheet->insertNewRowBefore($totalCell + 8, 1);
        $sheet->setCellValue('A' . $totalCell + 8, "GRAND TOTAL");
        $sheet->setCellValue('G' . $totalCell + 8, $total);
        $sheet->mergeCells('A' . $totalCell + 8 . ':' . 'D' . $totalCell + 8);

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

        $sheet->getStyle('A' . $totalCell + 8 . ':' . 'K' . $totalCell + 8)->applyFromArray($styleArrayFooter);

    }
}
