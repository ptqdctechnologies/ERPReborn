<?php

namespace App\Http\Controllers\ExportExcel\Budget;

use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ExportReportModifyBudgetSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $data = Cache::get('dataReportModifyBudgetSummary');
        $dataDetail = $data['dataDetail'];
        
        $collection = collect();
        $index = 1;
        foreach ($dataDetail as $detail) {
            $collection->push(
                [
                    $index,
                    $detail['documentNumber'],
                    date('d-m-Y', strtotime($detail['date'])),
                    number_format($detail['total'], 2, '.', ','),
                    $detail['pic'],
                    ucwords($detail['status'])
                ]
            );
            $index++;
        }

        $collection->push(
            [
                'Grand Total',
                '',
                '',
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
            ["", "", "", "", "", ""],
            ["No", "Transaction Number", "Date", "Total(+/-)", "PIC", "Status Approval"]
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $data = Cache::get('dataReportModifyBudgetSummary');
                $dataHeader = $data['dataHeader'];

                $sheet->setCellValue('A1', date('F j, Y'))
                    ->mergeCells('A1:F1')
                    ->getStyle('A1:F1')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                ]);

                $sheet->setCellValue('A2', 'Modify Budget Summary Report')
                    ->mergeCells('A2:F2')
                    ->getStyle('A2:F2')
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
                    ->mergeCells('A3:F3')
                    ->getStyle('A3:F3')
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
                $sheet->setCellValue('B4', ': ' . $dataHeader['budget'] . " - " . $dataHeader['budget_name']);
            },
        ];
    }
}
