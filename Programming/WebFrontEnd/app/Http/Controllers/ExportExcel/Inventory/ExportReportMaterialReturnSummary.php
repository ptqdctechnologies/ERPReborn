<?php

namespace App\Http\Controllers\ExportExcel\Inventory;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ExportReportMaterialReturnSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $data = Session::get("dataReportMaterialReturn");
        $dataDetail = $data['dataDetail'];
        
        $collection = collect();
        foreach ($dataDetail as $detail) {
            $collection->push(
                [
                    $detail['no'],
                    $detail['documentNumber'],
                    $detail['productCode'] . ' - ' . $detail['productName'],
                    $detail['sourceCode'] . ' - ' . $detail['sourceName'],
                    $detail['destinationCode'] . ' - ' . $detail['destinationName'],
                    $detail['total'],
                    $detail['uom'],
                    $detail['remark'],
                ]
            );
        }

        $collection->push(
            [
                '',
                '',
                '',
                '',
                'Total',
                $data['total'],
                '',
                '',
            ]
        );

        return $collection;
    }

    public function headings(): array
    {
        return [
            ["", "", "", "", "", "", "", ""],
            ["No", "MR Number", "Product", "Source Warehouse", "Destination Warehouse", "Qty", "UOM", "Remark"]
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $data = Session::get("dataReportMaterialReturn");
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

                $sheet->setCellValue('A2', 'Material Receive Summary Report')
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

                $sheet->setCellValue('A4', 'Budget')->getStyle('A4')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B4', ': ' . $dataHeader['budget']);
            },
        ];
    }
}
