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

class ExportReportPRtoPO implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Session::get("dataReportPRtoPO");

        $filteredData = [];
        $counter = 1;
        foreach ($data['dataDetail'] as $item) {
            $filteredData[] = [
                'No'                                => $counter++,
                'PR Number'                         => $item['DocumentNumber'] ?? null,
                'PR Date'                           => date('d-m-Y', strtotime($item['DocumentDateTimeTZ'])) ?? null,
                'Product Id'                        => $item['Product_ID'] ?? null,
                'Description'                       => $item['Description'] ?? null,
                'PR Total'                          => $item['TotalAdvance'] ?? null,
                'Valuta'                            => $item['CurrencyName'] ?? null,
                'PO Number'                         => $item['DepartingFrom'] ?? null,
                'PO Date'                           => $item['DestinationTo'] ?? null,
                'PO Qty'                            => $item['TotalExpenseClaimCart'] ?? null,
                'PO Total'                          => $item['TotalAmountDueToCompanyCart'] ?? null,
                'Balance'                           => $item['remark'] ?? null,
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = Session::get("dataReportPRtoPO");

        return [
            [date('F j, Y')],
            ["Report Purchase Requisition to Purchase Order", " ", " ", " ", " ", " ", " "," ", " ", " "],
            [date('h:i A')],
            ["Budget", ": " . $data[0]['combinedBudgetCode'] . ' - ' . $data[0]['combinedBudgetName'], "", "", "", "", "", "", "", "", ""],
            ["", "", "", "", "", "", "", "", "", "", "",""],
            ["No","PR Number","PR Date","Product Id","Description","PO Total","Valuta","PO Number","PO Date","PO Qty","PO Total","Balance"]
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

        $sheet->getStyle('A1:L1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:L1');

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

        $sheet->getStyle('A2:L2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:L2');

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

        $sheet->getStyle('A3:L3')->applyFromArray($styleArrayHeader);
        $sheet->mergeCells('A3:L3');

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

        $sheet->getStyle('A4:L4')->applyFromArray($styleArrayHeader2);

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

        $sheet->getStyle('A6:L6')->applyFromArray($styleArrayHeader4);

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

        $datas = Session::get("dataReportPRtoPO");
        $totalCell = count($datas['dataDetail']);
        $lastCell = 'A7:L' . $totalCell + 6;
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

        $sheet->getStyle('A' . $totalCell + 7 . ':' . 'L' . $totalCell + 7)->applyFromArray($styleArrayFooter);

    }
}
