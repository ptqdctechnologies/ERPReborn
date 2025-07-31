<?php

namespace App\Http\Controllers\ExportExcel\Finance;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportAccountPayableSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Session::get("dataReportAccountPayableSummary");

        $filteredData = [];
        $counter = 1;
        foreach ($data['data'] as $item) {
            $filteredData[] = [
                'No'                    => $counter++,
                'AP Number'             => $item['number'] ?? null,
                'Date'                  => $item['date'] ?? null,
                'Sub Budget'            => $item['sub_budget'] ?? null,
                'Supplier'              => $item['supplier'] ?? null,
                'Total IDR'             => $item['total_idr'] ?? null,
                'Total Other Currency'  => $item['total_other_currency'] ?? null,
                'Total Equivalent IDR'  => $item['total_equivalent_idr'] ?? null,
                'Tax Invoice Number'    => $item['tax_invoice_number'] ?? null,
                'Submitter'             => $item['submitter'] ?? null,
                'Status'                => $item['status'] ?? null,
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = Session::get("dataReportAccountPayableSummary");

        $savingData = [
            'budget'    => [
                'code'  => $data['project']['code'] ?? '',
                'name'  => $data['project']['name'] ?? ''
            ],
            'subBudget' => [
                'code'  => $data['site']['code'] ?? '',
                'name'  => $data['site']['name'] ?? ''
            ],
            'supplier'  => $data['supplier']['code'] ?? '-',
            'date'      => $data['date'] ?? '-'
        ];

        return [
            [date('F j, Y')],
            ["ACCOUNT PAYABLE SUMMARY"],
            [date('h:i A')],
            ["Budget", ": " . $savingData['budget']['code'] . ' - ' . $savingData['budget']['name'], "Sub Budget", ": " . $savingData['subBudget']['code'] . ' - ' . $savingData['subBudget']['name'], "", "", "", "", "", "", ""],
            ["Supplier", ": " . $savingData['supplier'], "Date", ": " . $savingData['date'], "", "", "", "", "", "", ""],
            ["", "", "", "", "", "", "", "", "", "", ""],
            ["No", "AP Number", "Date", "Sub Budget", "Supplier", "Total IDR", "Total Other Currency", "Total Equivalent IDR", "Tax Invoice Number", "Submitter", "Status"]
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

        $datas = Session::get("dataReportAccountPayableSummary");
        $totalCell = count($datas['data']);
        $lastCell = 'A7:K' . $totalCell + 7;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $sheet->insertNewRowBefore($totalCell + 8, 1);
        $sheet->setCellValue('A' . $totalCell + 8, "GRAND TOTAL");
        $sheet->setCellValue('F' . $totalCell + 8, $datas['totalIDR']);
        $sheet->setCellValue('G' . $totalCell + 8, $datas['totalOtherCurrency']);
        $sheet->setCellValue('H' . $totalCell + 8, $datas['totalEquivalentIDR']);
        $sheet->mergeCells('A' . $totalCell + 8 . ':' . 'E' . $totalCell + 8);
        $sheet->mergeCells('I' . $totalCell + 8 . ':' . 'K' . $totalCell + 8);
    }
}