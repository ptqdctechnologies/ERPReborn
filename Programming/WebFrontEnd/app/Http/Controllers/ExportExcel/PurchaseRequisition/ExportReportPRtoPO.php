<?php

namespace App\Http\Controllers\ExportExcel\PurchaseRequisition;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportPRtoPO implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataPrToPo;

    public function __construct($dataPrToPo)
    {
        $this->dataPrToPo = $dataPrToPo;
    }

    public function collection()
    {
        $data = $this->dataPrToPo;

        $totalPurchaseRequestIDR = 0;
        $totalPurchaseRequestOtherCurrency = 0;
        $totalPurchaseRequestEquivalentIDR = 0;

        $totalPurchaseOrderIDR = 0;
        $totalPurchaseOrderOtherCurrency = 0;
        $totalPurchaseOrderEquivalentIDR = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $totalPurchaseRequestIDR += is_numeric($item['PR_Total']) ? $item['PR_Total'] : 0;
            $totalPurchaseRequestOtherCurrency += 0;
            $totalPurchaseRequestEquivalentIDR += 0;

            $totalPurchaseOrderIDR += is_numeric($item['PO_Total']) ? $item['PO_Total'] : 0;
            $totalPurchaseOrderOtherCurrency += 0;
            $totalPurchaseOrderEquivalentIDR += 0;

            $filteredData[] = [
                'No' => $counter++,
                'PR Number' => $item['PR_Number'] ?? '-',
                'PR Date' => isset($item['PR_Date']) ? date('d-m-Y', strtotime($item['PR_Date'])) : '-',
                'PR Product' => ($item['product_Code'] ?? '') . ' - ' . ($item['product_Name'] ?? ''),
                'PR IDR' => isset($item['PR_Total']) ? (string) $item['PR_Total'] : '0',
                'PR Other Currency' => '0',
                'PR Equivalent IDR' => '0',
                'PR Status' => '0',
                'PO Number' => $item['PO_Number'] ?? '-',
                'PO Date' => $item['PO_Date'] ? date('d-m-Y', strtotime($item['PO_Date'])) : '-',
                'PO QTY' => isset($item['PO_Qty']) ? (string) $item['PO_Qty'] : '0',
                'PO IDR' => isset($item['PO_Total']) ? (string) $item['PO_Total'] : '0',
                'PO Other Currency' => '0',
                'PO Equivalent IDR' => '0',
                'PR to PO Balance' => '0',
                'PO Status' => '-'
            ];
        }

        $filteredData[] = [
            'No' => 'GRAND TOTAL',
            'PR Number' => '',
            'PR Date' => '',
            'PR Product' => '',
            'PR IDR' => $totalPurchaseRequestIDR,
            'PR Other Currency' => $totalPurchaseRequestOtherCurrency,
            'PR Equivalent IDR' => $totalPurchaseRequestEquivalentIDR,
            'PR Status' => '',
            'PO Number' => '',
            'PO Date' => '',
            'PO QTY' => '',
            'PO IDR' => $totalPurchaseOrderIDR,
            'PO Other Currency' => $totalPurchaseOrderOtherCurrency,
            'PO Equivalent IDR' => $totalPurchaseOrderEquivalentIDR,
            'PR to PO Balance' => '',
            'PO Status' => '',
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            [date('F j, Y')],
            ["PURCHASE REQUISITION TO PURCHASE ORDER"],
            [date('h:i A')],
            ["PR Number", ": -", "Budget", ": -", "Supplier", ": -"],
            ["PO Number", ": -", "Sub Budget", ": -", "Date Range", ": -"],
            [""],
            ["No", "Purchase Requisition", "", "", "", "", "", "", "Purchase Order", "", "", "", "", "", ""],
            ["", "Number", "Date", "Product", "Total IDR", "Total Other Currency", "Total Equivalent IDR", "PR Status", "Number", "Date", "Qty", "Total IDR", "Total Other Currency", "Total Equivalent IDR", "PR to PO Balance", "PO Status"]
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
        $sheet->getStyle('A1:P1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:P1');

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
        $sheet->getStyle('A2:P2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:P2');

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
        $sheet->getStyle('A3:P3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:P3');

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
        $sheet->getStyle('A4:P4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:P5')->applyFromArray($styleArrayHeader3);

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
        $sheet->getStyle('A7:P7')->applyFromArray($styleArrayHeader4);
        $sheet->getStyle('A8:P8')->applyFromArray($styleArrayHeader4);
        $sheet->mergeCells('A7:A8');
        $sheet->mergeCells('B7:H7');
        $sheet->mergeCells('I7:P7');

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
        $datas = $this->dataPrToPo;
        $totalCell = count($datas);
        $lastCell = 'A9:P' . $totalCell + 9;
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
        $sheet->getStyle('A' . $totalCell + 9 . ':' . 'P' . $totalCell + 9)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 9 . ':E' . $totalCell + 9);
        $sheet->mergeCells('I' . $totalCell + 9 . ':K' . $totalCell + 9);
    }
}