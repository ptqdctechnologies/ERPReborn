<?php

namespace App\Http\Controllers\ExportExcel\Budget;

use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ExportReportModifyBudgetDetail implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $data = Cache::get('dataReportModifyBudgetDetail');
        $dataDetail = $data['dataDetail'];
        
        $index = 1;
        $collection = collect();
        foreach ($dataDetail as $detail) {
            $collection->push(
                [
                    $index,
                    $detail['productCode'],
                    $detail['productName'],
                    $detail['origin'],
                    $detail['previous'],
                    $detail['qty'],
                    $detail['addSubt'],
                    $detail['total']
                ]
            );

            $index++;
        }

        $collection->push(
            [
                'Grand Total',
                '',
                '',
                '',
                '',
                '',
                '',
                $data['total'],
            ]
        );

        return $collection;
    }

    public function headings(): array
    {
        return [
            ["", "", "", "", "", ""],
            ["No", "Product Code", "Product Name", "Origin", "Previous", "Qty(+/-)", "Add(subt)", "Total(+/-)"],
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $data = Cache::get('dataReportModifyBudgetDetail');
                $dataHeader = $data['dataHeader'];

                $sheet->setCellValue('A1', date('F j, Y'))
                    ->mergeCells('A1:H1')
                    ->getStyle('A1:H1')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                ]);

                $sheet->setCellValue('A2', 'Modify Budget Detail Report')
                    ->mergeCells('A2:H2')
                    ->getStyle('A2:H2')
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
                    ->mergeCells('A3:H3')
                    ->getStyle('A3:H3')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                ]);

                $sheet->setCellValue('A4', 'Modify Number')->getStyle('A4')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B4', ': ' . $dataHeader['modifyNumber']);

                $sheet->setCellValue('A5', 'Budget')->getStyle('A5')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B5', ': ' . $dataHeader['budget_code'] . " - " . $dataHeader['budget_name']);

                $sheet->setCellValue('A6', 'Sub Budget')->getStyle('A6')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B6', ': ' . $dataHeader['sub_budget_code'] . " - " . $dataHeader['sub_budget_name']);

                $sheet->setCellValue('A7', 'Date')->getStyle('A7')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B7', ': ' . $dataHeader['date']);

                $sheet->setCellValue('C4', 'Transporter')->getStyle('C4')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D4', ': ' . $dataHeader['transporterCode']  . " - " . $dataHeader['transporterName']);

                $sheet->setCellValue('C5', 'Delivery From')->getStyle('C5')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D5', ': ' . $dataHeader['deliveryFrom']);

                $sheet->setCellValue('C6', 'Delivery To')->getStyle('C6')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D6', ': ' . $dataHeader['deliveryTo']);

                $sheet->setCellValue('C7', 'PIC')->getStyle('C7')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D7', ': ' . $dataHeader['PIC']);
            },
        ];
    }
}
