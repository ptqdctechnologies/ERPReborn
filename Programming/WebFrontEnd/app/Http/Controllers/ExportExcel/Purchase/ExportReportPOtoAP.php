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
    protected $dataPurchaseOrder;

    public function __construct($dataPurchaseOrder)
    {
        $this->dataPurchaseOrder = $dataPurchaseOrder;
    }

    public function collection()
    {
        $data = $this->dataPurchaseOrder;

        $totalPurchaseOrderIDR           = 0;
        $totalPurchaseOrderOtherCurrency = 0;
        $totalPurchaseOrderEquivalentIDR = 0;

        $totalAccountPayableIDR           = 0;
        $totalAccountPayableOtherCurrency = 0;
        $totalAccountPayableEquivalentIDR = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $totalPurchaseOrderIDR           += 0;
            $totalPurchaseOrderOtherCurrency += 0;
            $totalPurchaseOrderEquivalentIDR += 0;

            $totalAccountPayableIDR           += 0;
            $totalAccountPayableOtherCurrency += 0;
            $totalAccountPayableEquivalentIDR += 0;

            $filteredData[] = [
                'No'                    => $counter++,
                'PO Number'             => '-',
                'PO Budget'             => '-',
                'PO Date'               => '-',
                'PO Supplier'           => '-',
                'PO IDR'                => '-',
                'PO Other Currency'     => '-',
                'PO Equivalent IDR'     => '-',
                'PO Status'             => '-',
                'AP Number'             => '-',
                'AP Date'               => '-',
                'AP IDR'                => '-',
                'AP Other Currency'     => '-',
                'AP Equivalent IDR'     => '-',
                'AP Status'             => '-',
                'Balance PO to AP'      => '-',
                'Balance AP to Payment' => '-',
            ];
        }

        $filteredData[] = [
            'No'                    => 'GRAND TOTAL',
            'PO Number'             => '',
            'PO Budget'             => '',
            'PO Date'               => '',
            'PO Supplier'           => '',
            'PO IDR'                => $totalPurchaseOrderIDR,
            'PO Other Currency'     => $totalPurchaseOrderOtherCurrency,
            'PO Equivalent IDR'     => $totalPurchaseOrderEquivalentIDR,
            'PO Status'             => '',
            'AP Number'             => '',
            'AP Date'               => '',
            'AP IDR'                => $totalAccountPayableIDR,
            'AP Other Currency'     => $totalAccountPayableOtherCurrency,
            'AP Equivalent IDR'     => $totalAccountPayableEquivalentIDR,
            'AP Status'             => '',
            'Balance PO to AP'      => '',
            'Balance AP to Payment' => '',
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = $this->dataPurchaseOrder;

        return [
            [date('F j, Y')],
            ["PURCHASE ORDER TO ACCOUNT PAYABLE"],
            [date('h:i A')],
            ["PO Number", ": -", "Budget", ": -", "Supplier", ": -"],
            ["AP Number", ": -", "Sub Budget", ": -", "Date Range", ": -"],
            [""],
            ["No", "Purchase Order", "", "", "", "", "", "", "", "Account Payable", "", "", "", "", "", "Balance"],
            ["", "Number", "Budget", "Date", "Supplier", "Total IDR", "Total Other Currency", "Total Equivalent IDR", "Status", "Number", "Date", "Total IDR", "Total Other Currency", "Total Equivalent IDR", "Status", "PO to AP", "AP to Payment"]
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
        $sheet->getStyle('A1:Q1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:Q1');

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
        $sheet->getStyle('A2:Q2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:Q2');

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
        $sheet->getStyle('A3:Q3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:Q3');

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
        $sheet->getStyle('A4:Q4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:Q5')->applyFromArray($styleArrayHeader3);

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
        $sheet->getStyle('A7:Q7')->applyFromArray($styleArrayHeader4);
        $sheet->getStyle('A8:Q8')->applyFromArray($styleArrayHeader4);
        $sheet->mergeCells('A7:A8');
        $sheet->mergeCells('B7:I7');
        $sheet->mergeCells('J7:O7');
        $sheet->mergeCells('P7:Q7');

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

        $datas      = $this->dataPurchaseOrder;
        $totalCell  = count($datas);
        $lastCell   = 'A9:Q' . $totalCell + 9;
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
        $sheet->getStyle('A' . $totalCell + 9 . ':' . 'Q' . $totalCell + 9)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 9 . ':E' . $totalCell + 9);
        $sheet->mergeCells('I' . $totalCell + 9 . ':K' . $totalCell + 9);
    }
}