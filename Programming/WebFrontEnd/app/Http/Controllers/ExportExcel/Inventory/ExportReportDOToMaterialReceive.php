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

class ExportReportDOToMaterialReceive implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $data = Session::get("dotoMRReportSummaryDataExcel");
        // return collect($data);
        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $filteredData[] = [
                'No'                                =>  $counter++,
                'DO Number'                         =>  $item['DO_Number'] ?? null,
                'DO Date'                           =>  date('Y-m-d', strtotime($item['DO_Date'])) ?? null,
                'Budget'                            =>  null,
                'DO Delivery From'                  =>  $item['warehouseSource_DO'] ?? null,
                'DO Delivery To'                    =>  $item['warehouseDestination_DO'] ?? null,
                'Trasnporter'                       =>  $item['transporter_Name'] ?? null,
                'MR Number'                         =>  $item['MR_Number'] ?? null,
                'MR Date'                           =>  $item['MR_Date'] ?? null,
                'MR Delivery From'                  =>  $item['warehouseSource_MR'] ?? null,
                'MR Delivery To'                    =>  $item['warehouseDestination_MR'] ?? null,
                'PIC'                               =>  null,
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = Session::get("dotoMRReportSummaryDataExcel");
        return [

            ["Budget", ": ","", "", " ","","", "", "", "", "", "", "", ""],
            ["", "", "", "", "", "", "", "", "", "", ""],
            ["", "", "", "", "Warehouse", "", "", "", "", "Warehouse","", ""],
            ["No", "DO Number", "DO Date", "Budget", "Delivery From", "Delivery To", "Transporter", "MR Number", "MR Date", "Delivery From","Delivery To", "PIC"],
            
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $data = Session::get("dotoMRReportSummaryDataExcel");
                // $dataHeader = $data['dataHeader'];

                $sheet->setCellValue('A1', date('F j, Y'))
                    ->mergeCells('A1:L1')
                    ->getStyle('A1:L1')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                ]);

                $sheet->setCellValue('A2', 'Report Delivery Order to Material Receive')
                    ->mergeCells('A2:L2')
                    ->getStyle('A2:L2')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_CENTER,
                        ],
                ]);

                $sheet->setCellValue('A3', date('h:L A'))
                    ->mergeCells('A3:L3')
                    ->getStyle('A3:L3')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                ]);

                // $sheet->setCellValue('A4', 'Budget')->getStyle('A4')->applyFromArray([
                //     'font'  => [
                //         'bold'  => true,
                //         'color' => ['rgb' => '000000']
                //     ]
                // ]);
                // $sheet->setCellValue('B4', ': ');
            },
        ];
    }
}
