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

class ExportReportCreditNoteSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataCreditNoteSummary;

    public function __construct($dataCreditNoteSummary)
    {
        $this->dataCreditNoteSummary = $dataCreditNoteSummary;
    }

    public function collection()
    {
        $data = $this->dataCreditNoteSummary;

        $totalIDR               = 0;
        $totalVAT               = 0;
        $totalOtherCurrencyIDR  = 0;
        $totalOtherCurrencyVAT  = 0;
        $totalEquivalentIDR     = 0;
        $totalEquivalentVAT     = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $totalIDR               += is_numeric($item['CN_Total_IDR']) ? $item['CN_Total_IDR'] : 0;
            $totalVAT               += is_numeric($item['CN_Tax_IDR']) ? $item['CN_Tax_IDR'] : 0;
            $totalOtherCurrencyIDR  += is_numeric($item['CN_Total_Other_Currency']) ? $item['CN_Total_Other_Currency'] : 0;
            $totalOtherCurrencyVAT  += is_numeric($item['CN_Tax_OtherCurrency']) ? $item['CN_Tax_OtherCurrency'] : 0;
            $totalEquivalentIDR     += is_numeric($item['CN_Total_Equivalent_IDR']) ? $item['CN_Total_Equivalent_IDR'] : 0;
            $totalEquivalentVAT     += is_numeric($item['CN_Tax_Equivalent']) ? $item['CN_Tax_Equivalent'] : 0;

            $filteredData[] = [
                'No'                    => $counter++,
                'CN Number'             => $item['CN_Number'] ?? '-',
                'Budget'                => ($item['combinedBudgetCode'] ?? '') . ' - ' . ($item['combinedBudgetName'] ?? ''),
                'Sub Budget'            => ($item['combinedBudgetSectionCode'] ?? '') . ' - ' . ($item['combinedBudgetSectionName'] ?? ''),
                'Date'                  => $item['date'] ?? '-',
                'Customer'              => ($item['customerCode'] ?? '') . ' - ' . ($item['customerName'] ?? ''),
                'Total IDR'             => $item['CN_Total_IDR'] != 0 ? $item['CN_Total_IDR'] : '0',
                'VAT IDR'               => $item['CN_Tax_IDR'] != 0 ? $item['CN_Tax_IDR'] : '0',
                'Total Other Currency'  => $item['CN_Total_Other_Currency'] != 0 ? $item['CN_Total_Other_Currency'] : '0',
                'VAT Other Currency'    => $item['CN_Tax_OtherCurrency'] != 0 ? $item['CN_Tax_OtherCurrency'] : '0',
                'Total Equivalent IDR'  => $item['CN_Total_Equivalent_IDR'] != 0 ? $item['CN_Total_Equivalent_IDR'] : '0',
                'VAT Equivalent IDR'    => $item['CN_Tax_Equivalent'] != 0 ? $item['CN_Tax_Equivalent'] : '0'
            ];
        }

        $filteredData[] = [
            'No'                    => 'GRAND TOTAL',
            'CN Number'             => '',
            'Budget'                => '',
            'Sub Budget'            => '',
            'Date'                  => '',
            'Customer'              => '',
            'Total IDR'             => $totalIDR != 0 ? $totalIDR : '0',
            'VAT IDR'               => $totalVAT != 0 ? $totalVAT : '0',
            'Total Other Currency'  => $totalOtherCurrencyIDR != 0 ? $totalOtherCurrencyIDR : '0',
            'VAT Other Currency'    => $totalOtherCurrencyVAT != 0 ? $totalOtherCurrencyVAT : '0',
            'Total Equivalent IDR'  => $totalEquivalentIDR != 0 ? $totalEquivalentIDR : '0',
            'VAT Equivalent IDR'    => $totalEquivalentVAT != 0 ? $totalEquivalentVAT : '0'
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = $this->dataCreditNoteSummary;

        return [
            [date('F j, Y')],
            ["CREDIT NOTE SUMMARY"],
            [date('h:i A')],
            ["Budget", ": ", "Customer", ": -"],
            ["Sub Budget", ": ", "Date", ": -"],
            [""],
            ["No", "CN Number", "Budget", "Sub Budget", "Date", "Customer", "CN IDR", "", "CN Other Currency", "", "CN Equivalent", ""],
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
        $datas      = $this->dataCreditNoteSummary;
        $totalCell  = count($datas);
        $lastCell   = 'A9:L' . $totalCell + 9;
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
