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

class ExportReportCFS implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $data = Session::get("dataReportCFS");
        $dataDetail = $data['dataDetail'];
        
        $collection = collect();
        foreach ($dataDetail as $detail) {
            $collection->push([$detail['title']]);

            foreach ($detail['data'] as $data) {
                $collection->push([
                    $data['site'],
                    $data['name'],
                    $data['originCO'],
                    $data['variationsCO'],
                    $data['revisedCO'],
                    $data['completeProgress'],
                    $data['amountProgress'],
                    $data['invoicedBilling'],
                    $data['receivedBilling'],
                    $data['productIdBudget'],
                    $data['qtyBudget'],
                    $data['costBudget'],
                    $data['uomBudget'],
                    $data['originBudget'],
                    $data['variationsBudget'],
                    $data['revisedBudget'],
                    $data['committedCost'],
                    $data['previousCost'],
                    $data['movementCost'],
                    $data['currentCost'],
                    $data['paidCost'],
                    $data['finalForecast'],
                    $data['currentMargin'],
                    $data['finalMargin'],
                    $data['final%Margin'],
                ]);
            }

            $collection->push(['', $detail['totalText'], $detail['total']]);
        }

        // $collection->push(
        //     [
        //         '',
        //         'Total',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //         '',
        //     ]
        // );

        return $collection;
    }

    public function headings(): array
    {
        return [
            ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
            ["Site/Code", "Name", "Customer Order", " ", " ", "Progress", " ", "Billing", " ", "Budget", " ", " ", " ", " ", " ", " ", "Cost", " ", " ", " ", " ", "Forecast", "", "Final Margin", " "],
            ["", "", "Origin CO", "Variations", "Revised CO", "% Complete", "Amount", "Invoiced", "Received", "Product Id", "Qty", "Cost", "UOM", "Origin Budget", "Variations", "Revised Budget", "Committed Cost", "Previous Month Cost to Date", "Movement this Month Cost", "Current Cost", "Paid Cost", "Forecast Final Cost", "Current Margin", "Final Margin", "Final %"],
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $data = Session::get("dataReportCFS");
                $dataHeader = $data['dataHeader'];

                $sheet->setCellValue('A1', date('F j, Y'))
                    ->mergeCells('A1:Y1')
                    ->getStyle('A1:Y1')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                ]);

                $sheet->setCellValue('A2', 'CFS (CRM Field Service) Report')
                    ->mergeCells('A2:Y2')
                    ->getStyle('A2:Y2')
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
                    ->mergeCells('A3:Y3')
                    ->getStyle('A3:Y3')
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
                $sheet->setCellValue('B4', ': ' . $dataHeader['budgetName']);
            },
        ];
    }
}
