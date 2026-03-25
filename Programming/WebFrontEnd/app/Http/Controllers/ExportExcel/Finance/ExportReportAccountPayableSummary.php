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
    protected $dataAccountPayableSummary, $budgetName, $subBudgetName, $supplierName, $apDate;

    public function __construct($dataAccountPayableSummary, $budgetName, $subBudgetName, $supplierName, $apDate)
    {
        $this->dataAccountPayableSummary    = $dataAccountPayableSummary;
        $this->budgetName                   = $budgetName;
        $this->subBudgetName                = $subBudgetName;
        $this->supplierName                 = $supplierName;
        $this->apDate                       = $apDate;
    }

    public function collection()
    {
        $data = $this->dataAccountPayableSummary;

        $totalIDR           = 0;
        $totalOtherCurrency = 0;
        $totalEquivalentIDR = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $totalIDR           += is_numeric($item['totalIDR']) ? $item['totalIDR'] : 0;
            $totalOtherCurrency += is_numeric($item['totalOtherCurrency']) ? $item['totalOtherCurrency'] : 0;
            $totalEquivalentIDR += is_numeric($item['totalEquivalentIDR']) ? $item['totalEquivalentIDR'] : 0;

            $filteredData[] = [
                'No'                    => $counter++,
                'AP Number'             => $item['documentNumber'] ?? '-',
                'Date'                  => $item['sys_Data_Entry_DateTimeTZ'] ?? '-',
                'Sub Budget'            => ($item['combinedBudgetSectionCode'] ?? '') . ' - ' . ($item['combinedBudgetSectionName'] ?? ''),
                'Supplier'              => ($item['supplierCode'] ?? '') . ' - ' . ($item['supplierName'] ?? ''),
                'Total IDR'             => isset($item['totalIDR']) ? (string)$item['totalIDR'] : '0',
                'Total Other Currency'  => isset($item['totalOtherCurrency']) ? (string)$item['totalOtherCurrency'] : '0',
                'Total Equivalent IDR'  => isset($item['totalEquivalentIDR']) ? (string)$item['totalEquivalentIDR'] : '0',
                'Tax Invoice Number'    => $item['supplierInvoiceNumber'] ?? 0,
                'Submitter'             => $item['requesterName'] ?? '-',
                'Status'                => $item['workflowStatus'] ?? '-',
            ];
        }

        $filteredData[] = [
            'No'                    => 'GRAND TOTAL',
            'AP Number'             => '',
            'Date'                  => '',
            'Sub Budget'            => '',
            'Supplier'              => '',
            'Total IDR'             => isset($item['totalIDR']) ? (string)$item['totalIDR'] : '0',
            'Total Other Currency'  => isset($item['totalOtherCurrency']) ? (string)$item['totalOtherCurrency'] : '0',
            'Total Equivalent IDR'  => isset($item['totalEquivalentIDR']) ? (string)$item['totalEquivalentIDR'] : '0',
            'Tax Invoice Number'    => '',
            'Submitter'             => '',
            'Status'                => '',
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            [date('F j, Y')],
            ["ACCOUNT PAYABLE SUMMARY"],
            [date('h:i A')],
            ["Budget", ": " . ($this->budgetName ?? '-'), "Supplier", ": " . ($this->supplierName) ?? '-'],
            ["Sub Budget", ": " . ($this->subBudgetName ?? '-'), "Date Range", ": " . ($this->apDate) ?? '-'],
            [""],
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

        $datas = $this->dataAccountPayableSummary;
        $totalCell = count($datas);
        $lastCell = 'A7:K' . $totalCell + 7;
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

        $sheet->getStyle('A' . $totalCell + 8 . ':' . 'K' . $totalCell + 8)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 8 . ':E' . $totalCell + 8);
    }
}