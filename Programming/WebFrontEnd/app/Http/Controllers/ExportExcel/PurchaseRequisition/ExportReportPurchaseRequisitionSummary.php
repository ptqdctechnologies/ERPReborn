<?php

namespace App\Http\Controllers\ExportExcel\PurchaseRequisition;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ExportReportPurchaseRequisitionSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $data = Session::get("PurchaseRequisitionReportSummaryDataExcel");
        $filteredData = [];
        $counter = 1;

        $grandTotalIDR = 0;
        $grandTotalOtherCurrency = 0;

        foreach ($data as $item) {
            $idr = $item['total_IDR'] ?? 0;
            $other = $item['total_Other_Currency'] ?? 0;

            $grandTotalIDR += $idr;
            $grandTotalOtherCurrency += $other;

            $filteredData[] = [
                'No'                                => $counter++,
                'PR Number'                         => $item['documentNumber'] ?? null,
                'Date'                              => date('Y-m-d', strtotime($item['date'])) ?? null,
                'Sub Budget'                        => null,
                'Delivery From'                     => null,
                'Delivery To'                       => null,
                'Total Idr'                         => $idr,
                'Total Other Currency'              => $other,
                'Total Equivalent IDR'              => null,
            ];
        }

        // Tambahkan baris grand total
        $filteredData[] = [
            'No'                                => '',
            'PR Number'                         => 'Grand Total:',
            'Date'                              => '',
            'Sub Budget'                        => '',
            'Delivery From'                     => '',
            'Delivery To'                       => '',
            'Total Idr'                         => $grandTotalIDR,
            'Total Other Currency'              => $grandTotalOtherCurrency,
            'Total Equivalent IDR'              => '',
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = Session::get("PurchaseRequisitionReportSummaryDataExcel");

        return [
            ["Budget", ": " . $data[0]['combinedBudgetCode'] . ' - ' . $data[0]['combinedBudgetName'], "", "", "", "", "", "", ""],
            ["", "", "", "", "", "", "", "", "", "", ""],
            ["No", "PR Number","Date", "Sub Budget", "Delivery From", "Delivery To", "Total IDR", "Total Other Currency", "Total Equivalent IDR"],
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $data = Session::get("PurchaseRequisitionReportSummaryDataExcel");
                // $dataHeader = $data['dataHeader'];

                $sheet->setCellValue('A1', date('F j, Y'))
                    ->mergeCells('A1:I1')
                    ->getStyle('A1:I1')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                ]);

                $sheet->setCellValue('A2', 'Purchase Requisition Summary Report')
                    ->mergeCells('A2:I2')
                    ->getStyle('A2:I2')
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
                    ->mergeCells('A3:I3')
                    ->getStyle('A3:I3')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                ]);
            },
        ];
    }
}
