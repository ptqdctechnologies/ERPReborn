<?php

namespace App\Http\Controllers\ExportExcel\Purchase;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ExportReportPurchaseOrderDetail implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    protected $data;

    public function __construct($data)
    {
        $this->data = collect($data);
    }

    public function collection()
    {
        $dataDetail = $this->data;

        $no = 1;
        $collection = collect();
        foreach ($dataDetail as $detail) {
            $collection->push(
                [
                    $no++,
                    $detail['productCode'] . " - " . $detail['productName'],
                    $detail['quantity'],
                    $detail['productUnitPriceCurrencyValue'],
                    $detail['quantityUnitName'],
                    $detail['totalIDRWithPPN'] ?? 0,
                    $detail['totalIDRWithoutPPN'] ?? 0,
                    $detail['totalOtherCurrencyWithPPN'] ?? 0,
                    $detail['totalOtherCurrencyWithoutPPN'] ?? 0,
                    $detail['productUnitPriceCurrencyISOCode'],
                ]
            );
        }

        $collection->push(
            [
                '',
                'Total',
                $dataDetail[0]['totalQty'] ?? 0,
                '',
                '',
                $dataDetail[0]['totalIDRWithPPN'] ?? 0,
                $dataDetail[0]['totalIDRWithoutPPN'] ?? 0,
                $dataDetail[0]['totalOtherCurrencyWithPPN'] ?? 0,
                $dataDetail[0]['totalOtherCurrencyWithoutPPN'] ?? 0,
                '',
            ]
        );

        return $collection;
    }

    public function headings(): array
    {
        return [
            ["", "", "", "", "", "", "", "", "", ""]
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $sheet->setCellValue('A11', "No")
                ->mergeCells('A11:A12')
                ->getStyle('A11:A12')->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $sheet->setCellValue('B11', "Product")
                ->mergeCells('B11:B12')
                ->getStyle('B11:B12')->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $sheet->setCellValue('C11', "Qty")
                ->mergeCells('C11:C12')
                ->getStyle('C11:C12')->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $sheet->setCellValue('D11', "Price")
                ->mergeCells('D11:D12')
                ->getStyle('D11:D12')->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $sheet->setCellValue('E11', "UOM")
                ->mergeCells('E11:E12')
                ->getStyle('E11:E12')->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $sheet->setCellValue('F11', "Total IDR")
                ->mergeCells('F11:G11')
                ->getStyle('F11:G11')->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $sheet->setCellValue('F12', "With VAT")
                ->getStyle('F12')->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $sheet->setCellValue('G12', "Without VAT")
                ->getStyle('G12')->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $sheet->setCellValue('H11', "Total IDR")
                ->mergeCells('H11:I11')
                ->getStyle('H11:I11')->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $sheet->setCellValue('H12', "With VAT")
                ->getStyle('H12')->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $sheet->setCellValue('I12', "Without VAT")
                ->getStyle('I12')->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $sheet->setCellValue('J11', "Total IDR")
                ->mergeCells('J11:J12')
                ->getStyle('J11:J12')->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $dataHeader = $this->data;

                $sheet->setCellValue('A1', date('F j, Y'))
                    ->mergeCells('A1:J1')
                    ->getStyle('A1:J1')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                ]);

                $sheet->setCellValue('A2', 'Purchase Order')
                    ->mergeCells('A2:J2')
                    ->getStyle('A2:J2')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_CENTER,
                        ],
                ]);

                $sheet->setCellValue('A3', date('h:i A'))
                    ->mergeCells('A3:J3')
                    ->getStyle('A3:J3')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                ]);

                $sheet->setCellValue('A4', 'Budget')->getStyle('A4')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B4', ': ' . $dataHeader[0]['combinedBudgetCode'] . " - " . $dataHeader[0]['combinedBudgetName']);

                $sheet->setCellValue('A5', 'PO Number')->getStyle('A5')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B5', ': ' . $dataHeader[0]['documentNumber']);

                $sheet->setCellValue('A6', 'Date')->getStyle('A6')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B6', ': ' . $dataHeader[0]['date']);

                $sheet->setCellValue('A7', 'Payment Term')->getStyle('A7')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B7', ': ' . $dataHeader[0]['termOfPaymentName']);

                $sheet->setCellValue('A8', 'Revision')->getStyle('A8')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B8', ': ' . '-');

                $sheet->setCellValue('C4', 'Supplier')->getStyle('C4')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D4', ': ' . $dataHeader[0]['supplierCode'] . " - " . $dataHeader[0]['supplierName']);

                $sheet->setCellValue('C5', 'Deliver To')->getStyle('C5')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D5', ': ' . $dataHeader[0]['deliveryTo_NonRefID']['Address']);

                $sheet->setCellValue('C6', 'Invoice To')->getStyle('C6')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D6', ': ' . '-');

                $sheet->setCellValue('C7', 'Currency')->getStyle('C7')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D7', ': ' . $dataHeader[0]['productUnitPriceCurrencyISOCode']);

                $sheet->setCellValue('C8', 'PIC Sourching')->getStyle('C8')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D8', ': ' . '-');

                $sheet->setCellValue('C9', 'Remark')->getStyle('C9')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D9', ': ' . $dataHeader[0]['remarks']);
            },
        ];
    }
}
