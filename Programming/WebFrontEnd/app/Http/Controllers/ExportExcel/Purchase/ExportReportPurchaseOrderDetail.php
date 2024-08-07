<?php

namespace App\Http\Controllers\ExportExcel\Purchase;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ExportReportPurchaseOrderDetail implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $data = Session::get("dataReportPODetail");
        $dataDetail = $data['dataDetail'];
        
        $collection = collect();
        foreach ($dataDetail as $detail) {
            $collection->push(
                [
                    $detail['no'],
                    $detail['productId'] . " - " . $detail['productName'],
                    $detail['qty'],
                    $detail['price'],
                    $detail['uom'],
                    $detail['totalIDRWithPPN'],
                    $detail['totalIDRWithoutPPN'],
                    $detail['totalOtherCurrencyWithPPN'],
                    $detail['totalOtherCurrencyWithoutPPN'],
                    $detail['currency'],
                ]
            );
        }

        $collection->push(
            [
                '',
                'Total',
                $data['totalQty'],
                '',
                '',
                $data['totalIDRWithPPN'],
                $data['totalIDRWithoutPPN'],
                $data['totalOtherCurrencyWithPPN'],
                $data['totalOtherCurrencyWithoutPPN'],
                '',
            ]
        );

        return $collection;
    }

    public function headings(): array
    {
        return [
            ["", "", "", "", "", "", "", "", "", ""],
            ["No", "Product Id", "Qty", "Price", "UOM", "Total IDR", " ", "Total Other Currency", " ", "Currency"],
            ["", "", "", "", "", "With PPN", "Without PPN", "With PPN", "Without PPN", ""],
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $data = Session::get("dataReportPODetail");
                $dataHeader = $data['dataHeader'];

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

                $sheet->setCellValue('A2', 'Purchase Order Detail Report')
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
                $sheet->setCellValue('B4', ': ' . $dataHeader['budget'] . " - " . $dataHeader['budgetName']);

                $sheet->setCellValue('A5', 'PO Number')->getStyle('A5')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B5', ': ' . $dataHeader['poNumber']);

                $sheet->setCellValue('A6', 'Date')->getStyle('A6')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B6', ': ' . $dataHeader['date']);

                $sheet->setCellValue('A7', 'Payment Term')->getStyle('A7')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B7', ': ' . $dataHeader['paymentTerm']);

                $sheet->setCellValue('A8', 'Revision')->getStyle('A8')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B8', ': ' . $dataHeader['revision']);

                $sheet->setCellValue('C4', 'Vendor')->getStyle('C4')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D4', ': ' . $dataHeader['vendor']);

                $sheet->setCellValue('C5', 'Deliver To')->getStyle('C5')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D5', ': ' . $dataHeader['deliver']);

                $sheet->setCellValue('C6', 'Invoice To')->getStyle('C6')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D6', ': ' . $dataHeader['invoice']);

                $sheet->setCellValue('C7', 'Currency')->getStyle('C7')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D7', ': ' . $dataHeader['currency']);

                $sheet->setCellValue('C8', 'PIC Sourching')->getStyle('C8')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D8', ': ' . $dataHeader['PIC']);

                $sheet->setCellValue('C9', 'Remark')->getStyle('C9')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D9', ': ' . $dataHeader['remark']);
            },
        ];
    }
}
