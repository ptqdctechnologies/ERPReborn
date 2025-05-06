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

class ExportReportPOtoAP implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Session::get("dataReportPOtoAP");

        $filteredData = [];
        $counter = 1;
        foreach ($data['dataDetail'] as $item) {
            $filteredData[] = [
                'No'                                => $counter++,
                'PO Number'                         => $item['DocumentNumber'] ?? null,
                'PO Total'                          => $item['TotalAdvance'] ?? null,
                'Valuta'                            => $item['CurrencyName'] ?? null,
                'AP Number'                         => $item['DepartingFrom'] ?? null,
                'AP Total'                          => $item['DestinationTo'] ?? null,
                'Balance PO-AP'                     => $item['TotalExpenseClaimCart'] ?? null,
                'Payment AP'                        => $item['TotalAmountDueToCompanyCart'] ?? null,
                'Payment Date'                      => date('d-m-Y', strtotime($item['TotalAdvance'])) ?? null,
                'Balance Net AP-Pay'                => $item['Description'] ?? null,
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = Session::get("dataReportPOtoAP");

        return [
            [date('F j, Y')],
            ["Report PO to AP", " ", " ", " ", " ", " ", " "," "],
            [date('h:i A')],
            ["Budget", ": " . $data['budgetCode'] . ' - ' . $data['budgetName'], "", "", "", "", "", "", ""],
            ["", "", "", "", "", "", "", "", "", ""],
            ["No","PO Number","PO Total","Valuta","AP Number","AP Total","Balance PO-AP","Payment AP","Payment Date","Balance Net AP-Pay"]
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

        $sheet->getStyle('A3:J3')->applyFromArray($styleArrayHeader);
        $sheet->mergeCells('A3:J3');

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

        $sheet->getStyle('A4:J4')->applyFromArray($styleArrayHeader2);

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

        $datas = Session::get("dataReportPOtoAP");
        $totalCell = count($datas['dataDetail']);
        $lastCell = 'A7:J' . $totalCell + 6;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $totalExpense   = $datas['totalExpense'];
        $totalAmount    = $datas['totalAmount'];
        $total          = $datas['total'];

        $sheet->insertNewRowBefore($totalCell + 7, 1);
        // $sheet->setCellValue('A' . $totalCell + 7, "GRAND TOTAL");
        // $sheet->setCellValue('E' . $totalCell + 7, $totalExpense);
        // $sheet->setCellValue('F' . $totalCell + 7, $totalAmount);
        // $sheet->setCellValue('G' . $totalCell + 7, $total);
        // $sheet->mergeCells('A' . $totalCell + 7 . ':' . 'D' . $totalCell + 7);

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

        $sheet->getStyle('A' . $totalCell + 7 . ':' . 'J' . $totalCell + 7)->applyFromArray($styleArrayFooter);

    }
}
