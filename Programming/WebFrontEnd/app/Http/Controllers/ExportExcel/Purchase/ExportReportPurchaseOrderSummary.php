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

class ExportReportPurchaseOrderSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $data = Session::get("dataReportPurchaseOrderSummary");
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

                $data = Session::get("dataReportPurchaseOrderSummary");
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

                $sheet->setCellValue('A2', 'Purchase Order Summary Report')
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
            },
        ];
    }
}
