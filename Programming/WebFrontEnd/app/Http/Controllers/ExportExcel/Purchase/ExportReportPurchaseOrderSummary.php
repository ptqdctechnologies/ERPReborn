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
        $data = Session::get("PurchaseOrderReportSummaryDataExcel");
        // return collect($data);
        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $filteredData[] = [
                'No'                                => $counter++,
                'PR Number'                         => $item['documentNumber'] ?? null,
                'Description & Spesification'       => $item['product_Code'] .'-'. $item['product_Name']  ?? null,
                'Qty'                               => $item['quantity'] ?? null,
                'Unit Price'                        => $item['price'] ?? null,
                'Uom'                               => $item['UOM'] ?? null,
                'Total Idr WithVAT'                 => $item['total_Idr_WithVat'] ?? null,
                'Total Idr WithoutVAT'              => $item['total_Idr_WithoutVat'] ?? null,
                'Total Other Currency WithVAT'      => $item['total_Other_Currency_WithVat'] ?? null,
                'Total Other Currency WithoutVAT'   => $item['total_Other_Currency_WithoutVat'] ?? null,
                'Currency'                          => $item['currency'] ?? null,
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            ["", "", "", "", "", "", "", "", "", ""],
            ["No", "PR Number","Description & Spesification", "Qty", "Unit Price", "Uom", "Total IDR", " ", "Total Other Currency", " ", "Currency"],
            ["", "", "", "", "","", "With VAT", "Without VAT", "With VAT", "Without VAT", ""],
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $data = Session::get("PurchaseOrderReportSummaryDataExcel");
                // $dataHeader = $data['dataHeader'];

                $sheet->setCellValue('A1', date('F j, Y'))
                    ->mergeCells('A1:K1')
                    ->getStyle('A1:K1')
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
                    ->mergeCells('A2:K2')
                    ->getStyle('A2:K2')
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
                    ->mergeCells('A3:K3')
                    ->getStyle('A3:K3')
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
                $sheet->setCellValue('B4', ': ');
            },
        ];
    }
}
