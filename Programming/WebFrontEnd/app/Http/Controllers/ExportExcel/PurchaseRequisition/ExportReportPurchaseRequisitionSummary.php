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
        // return collect($data);
        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $filteredData[] = [
                'No'                                => $counter++,
                'PR Number'                         => $item['documentNumber'] ?? null,
                'Data'                              => null,
                'Sub Budget'                        => null,
                'Delivery From'                     => null,
                'Delivery To'                       => null,
                'Total Idr'                         => $item['total_Idr_WithVat'] ?? null,
                'Total Other Curreny'               => $item['total_Idr_WithoutVat'] ?? null,
                // 'Combine Budget Code'               => $item['combinedBudgetCode'] ?? null,
                // 'Combine Budget Name'               => $item['combinedBudgetName'] ?? null,
                // 'Currency'                          => $item['currency'] ?? null,
                // 'Total Other Currency WithVAT'      => $item['total_Other_Currency_WithVat'] ?? null,
                // 'Total Other Currency WithoutVAT'   => $item['total_Other_Currency_WithoutVat'] ?? null,
                
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            ["", "", "", "", "", "", "", "", "", ""],
            ["No", "PR Number","Date", "Sub Budget", "Delivery From", "Delivery To", "Total IDR", "Total Other Currency"],
            // ["", "", "", "", "","", "With VAT", "Without VAT", "With VAT", "Without VAT", ""],
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

                $sheet->setCellValue('A2', 'Purchase Requisition Summary Report')
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
                $sheet->setCellValue('B4', '');
            },
        ];
    }
}
