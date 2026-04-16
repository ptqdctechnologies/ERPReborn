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

class ExportReportPOtoDO implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataPurchaseOrder;

    public function __construct($dataPurchaseOrder)
    {
        $this->dataPurchaseOrder = $dataPurchaseOrder;
    }

    public function collection()
    {
        $data = $this->dataPurchaseOrder;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $filteredData[] = [
                'No' => $counter++,
                'PO Number' => $item['purchaseOrderNumber'] ?? '-',
                'PO Date' => $item['purchaseOrderDate'] ?? '-',
                'Product' => ($item['productCode'] ?? '') . ' - ' . ($item['productName'] ?? ''),
                'PO Qty' => isset($item['purchaseOrderQty']) ? (string) $item['purchaseOrderQty'] : '0',
                'DO Number' => $item['deliveryOrderNumber'] ?? '-',
                'DO Date' => $item['deliveryOrderDate'] ?? '-',
                'From' => isset($item['deliveryFrom']) ? $item['deliveryFrom']['address'] : '-',
                'To' => isset($item['deliveryTo']) ? $item['deliveryTo']['address'] : '-',
                'Transporter' => $item['transporter_Name'] ?? '-',
                'DO Qty' => isset($item['deliveryOrderQty']) ? (string) $item['deliveryOrderQty'] : '0',
            ];
        }

        $filteredData[] = [
            'No' => 'GRAND TOTAL',
            'PO Number' => "",
            'PO Date' => "",
            'Product' => "",
            'PO Qty' => "",
            'DO Number' => "",
            'DO Date' => "",
            'From' => "",
            'To' => "",
            'Transporter' => "",
            'DO Qty' => "",
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            [date('F j, Y')],
            ["PURCHASE ORDER TO DELIVERY ORDER"],
            [date('h:i A')],
            ["Budget", ": -", "Date Range", ": -"],
            ["Sub Budget", ": -"],
            [""],
            ["No", "PO Number", "PO Date", "Product", "PO Qty", "DO Number", "DO Date", "Delivery From", "Delivery To", "Transporter", "DO Qty"],
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
        $sheet->getStyle('A3:K3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:K3');

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
        $sheet->getStyle('A4:K4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:K5')->applyFromArray($styleArrayHeader3);

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
        $sheet->getStyle('A7:K7')->applyFromArray($styleArrayHeader4);

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

        $datas = $this->dataPurchaseOrder;
        $totalCell = count($datas);
        $lastCell = 'A8:K' . $totalCell + 8;
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
        $sheet->mergeCells('A' . $totalCell + 8 . ':D' . $totalCell + 8);
        $sheet->mergeCells('F' . $totalCell + 8 . ':J' . $totalCell + 8);
    }
}