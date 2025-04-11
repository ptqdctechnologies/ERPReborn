<?php

namespace App\Http\Controllers\ExportExcel\AdvanceToASF;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportAdvanceToASF implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Session::get("dataReportAdvanceToASF");

        $filteredData = [];
        $counter = 1;
        foreach ($data['dataDetail'] as $item) {
            $filteredData[] = [
                'No'                    => $counter++,
                'ARF Number'            => $item['DocumentNumber'] ?? null,
                'Date'                  => date('d-m-Y', strtotime($item['DocumentDateTimeTZ'])) ?? null,
                'Requester'             => $item['RequesterWorkerName'] ?? null,
                'Total'                 => $item['TotalAdvance'] ?? null,
                'Payment'               => $item['TotalPayment'] ?? null,
                'Status'                => $item['Status'] ?? null,
                'ASF Number'            => $item['DocumentASFNumber'] ?? null,
                'ASF Date'              => date('d-m-Y', strtotime($item['DocumentASFDateTimeTZ'])) ?? null,
                'Total ASF'             => $item['TotalSettlement'] ?? null,
                'Expense Claim'         => $item['TotalExpenseClaim'] ?? null,
                'Amount to the Company' => $item['TotalAmountCompany'] ?? null,
                // 'Description'           => $item['Description'] ?? null,
                'Status ASF'            => $item['StatusASF'] ?? null,
                'Advance to Payment'    => $item['TotalAdvancePayment'] ?? null,
                'Advance to Settlement' => $item['TotalAdvanceSettlement'] ?? null,
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = Session::get("dataReportAdvanceToASF");
        return [
            [date('F j, Y')],
            ["ADVANCE TO ASF"],
            [date('h:i A')],
            ["Budget", ": " . $data['project']['code'] . ' - ' . $data['project']['name'], "Requester", ": " . $data['requester']['name'], "", "", "", "", "", "", ""],
            ["Sub Budget", ": " . $data['site']['code'] . ' - ' . $data['site']['name']],
            ["", "", "", "", "", "", "", "", "", "", ""],
            ["No", "Advance", "", "", "", "", "", "Settlement", "", "", "", "", "", "Balance", ""],
            ["", "ARF Number", "Date", "Requester", "Total", "Payment", "Status", "ASF Number", "Date", "Total", "Expense Claim", "Amount to the Company", "Status", "Advance to Payment", "Advance to Settlement"],
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
        $sheet->getStyle('A1:O1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:O1');

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

        $sheet->getStyle('A2:O2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:O2');

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
        $sheet->getStyle('A3:O3')->applyFromArray($styleArrayHeader);
        $sheet->mergeCells('A3:O3');

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
        $sheet->getStyle('A4:O4')->applyFromArray($styleArrayHeader4);

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
        $sheet->getStyle('A5:O5')->applyFromArray($styleArrayHeader5);

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

        $sheet->getStyle('A7:O7')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A7:A8');
        $sheet->mergeCells('B7:G7');
        $sheet->mergeCells('H7:M7');
        $sheet->mergeCells('N7:O7');
        $sheet->getStyle('A8:O8')->applyFromArray($styleArrayHeader2);

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

        $datas = Session::get("dataReportAdvanceToASF");
        $totalCell = count($datas['dataDetail']);
        $lastCell = 'A8:O' . $totalCell + 8;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $total                  = $datas['totalAdvance'];
        $totalPayment           = $datas['totalPayment'];
        $totalSettlement        = $datas['totalSettlement'];
        $totalExpenseClaim      = $datas['totalExpenseClaim'];
        $totalAmountCompany     = $datas['totalAmountCompany'];
        $totalAdvancePayment    = $datas['totalAdvancePayment'];
        $totalAdvanceSettlement = $datas['totalAdvanceSettlement'];

        $sheet->insertNewRowBefore($totalCell + 9, 1);
        $sheet->setCellValue('A' . $totalCell + 9, "GRAND TOTAL");
        $sheet->setCellValue('E' . $totalCell + 9, $total);
        $sheet->setCellValue('F' . $totalCell + 9, $totalPayment);
        $sheet->setCellValue('J' . $totalCell + 9, $totalSettlement);
        $sheet->setCellValue('K' . $totalCell + 9, $totalExpenseClaim);
        $sheet->setCellValue('L' . $totalCell + 9, $totalAmountCompany);
        $sheet->setCellValue('O' . $totalCell + 9, $totalAdvancePayment);
        $sheet->setCellValue('P' . $totalCell + 9, $totalAdvanceSettlement);
        $sheet->mergeCells('A' . $totalCell + 9 . ':' . 'D' . $totalCell + 9);
        $sheet->mergeCells('G' . $totalCell + 9 . ':' . 'I' . $totalCell + 9);
        $sheet->mergeCells('M' . $totalCell + 9 . ':' . 'N' . $totalCell + 9);

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

        $sheet->getStyle('A' . $totalCell + 9 . ':' . 'O' . $totalCell + 9)->applyFromArray($styleArrayFooter);

    }
}
