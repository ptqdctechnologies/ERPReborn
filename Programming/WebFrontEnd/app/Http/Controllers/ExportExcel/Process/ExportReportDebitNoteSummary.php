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

class ExportReportDebitNoteSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataDebitNoteSummary;

    public function __construct($dataDebitNoteSummary)
    {
        $this->dataDebitNoteSummary = $dataDebitNoteSummary;
    }

    public function collection()
    {
        $data = $this->dataDebitNoteSummary;

        $totalIDR           = 0;
        $vatIDR             = 0;
        $totalOtherCurrency = 0;
        $vatOtherCurrency   = 0;
        $totalEquivalentIDR = 0;
        $vatEquivalentIDR   = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $totalIDR           += is_numeric($item['DN_Total_IDR']) ? $item['DN_Total_IDR'] : 0;
            $vatIDR             += is_numeric($item['DN_Tax_IDR']) ? $item['DN_Tax_IDR'] : 0;
            $totalOtherCurrency += is_numeric($item['DN_Total_Other_Currency']) ? $item['DN_Total_Other_Currency'] : 0;
            $vatOtherCurrency   += is_numeric($item['DN_Tax_OtherCurrency']) ? $item['DN_Tax_OtherCurrency'] : 0;
            $totalEquivalentIDR += is_numeric($item['DN_Total_Equivalent_IDR']) ? $item['DN_Total_Equivalent_IDR'] : 0;
            $vatEquivalentIDR   += is_numeric($item['DN_Tax_Equivalent']) ? $item['DN_Tax_Equivalent'] : 0;

            $filteredData[] = [
                'No'                    => $counter++,
                'DN Number'             => $item['DN_Number'] ?? '-',
                'Budget'                => ($item['combinedBudgetCode'] ?? '') . ' - ' . ($item['combinedBudgetName'] ?? ''),
                'Sub Budget'            => ($item['combinedBudgetSectionCode'] ?? '') . ' - ' . ($item['combinedBudgetSectionName'] ?? ''),
                'Date'                  => $item['date'] ?? '-',
                'Customer'              => ($item['supplierCode'] ?? '') . ' - ' . ($item['supplierName'] ?? ''),
                'totalIDR'              => $item['DN_Total_IDR'] != 0 ? $item['DN_Total_IDR'] : '0',
                'vatIDR'                => $item['DN_Tax_IDR'] != 0 ? $item['DN_Tax_IDR'] : '0',
                'totalOtherCurrency'    => $item['DN_Total_Other_Currency'] != 0 ? $item['DN_Total_Other_Currency'] : '0',
                'vatOtherCurrency'      => $item['DN_Tax_OtherCurrency'] != 0 ? $item['DN_Tax_OtherCurrency'] : '0',
                'totalEquivalentIDR'    => $item['DN_Total_Equivalent_IDR'] != 0 ? $item['DN_Total_Equivalent_IDR'] : '0',
                'vatEquivalentIDR'      => $item['DN_Tax_Equivalent'] != 0 ? $item['DN_Tax_Equivalent'] : '0'
            ];
        }

        $filteredData[] = [
            'No'                    => 'GRAND TOTAL',
            'DN Number'             => '',
            'Budget'                => '',
            'Sub Budget'            => '',
            'Date'                  => '',
            'Customer'              => '',
            'totalIDR'              => $totalIDR != 0 ? $totalIDR : '0',
            'vatIDR'                => $vatIDR != 0 ? $vatIDR : '0',
            'totalOtherCurrency'    => $totalOtherCurrency != 0 ? $totalOtherCurrency : '0',
            'vatOtherCurrency'      => $vatOtherCurrency != 0 ? $vatOtherCurrency : '0',
            'totalEquivalentIDR'    => $totalEquivalentIDR != 0 ? $totalEquivalentIDR : '0',
            'vatEquivalentIDR'      => $vatEquivalentIDR != 0 ? $vatEquivalentIDR : '0'
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = $this->dataDebitNoteSummary;

        return [
            [date('F j, Y')],
            ["DEBIT NOTE SUMMARY"],
            [date('h:i A')],
            ["Budget", ": ", "Customer", ": -"],
            ["Sub Budget", ": ", "Date", ": -"],
            [""],
            ["No", "DN Number", "Budget", "Sub Budget", "Date", "Customer", "DN IDR", "", "DN Other Currency", "", "DN Equivalent IDR", ""],
            ["", "", "", "", "", "", "Total", "VAT", "Total", "VAT", "Total", "VAT"]
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
        $sheet->getStyle('A3:L3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:L3');

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
        $sheet->getStyle('A4:L4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:L5')->applyFromArray($styleArrayHeader3);

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
        $sheet->getStyle('A7:L7')->applyFromArray($styleArrayHeader4);
        $sheet->mergeCells('A7:A8');
        $sheet->mergeCells('B7:B8');
        $sheet->mergeCells('C7:C8');
        $sheet->mergeCells('D7:D8');
        $sheet->mergeCells('E7:E8');
        $sheet->mergeCells('F7:F8');
        $sheet->mergeCells('G7:H7');
        $sheet->mergeCells('I7:J7');
        $sheet->mergeCells('K7:L7');
        $sheet->getStyle('A8:L8')->applyFromArray($styleArrayHeader4);

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

        $datas      = $this->dataDebitNoteSummary;
        $totalCell  = count($datas);
        $lastCell   = 'A7:L' . $totalCell + 8;
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
        $sheet->getStyle('A' . $totalCell + 9 . ':' . 'L' . $totalCell + 9)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 9 . ':F' . $totalCell + 9);
    }
}
