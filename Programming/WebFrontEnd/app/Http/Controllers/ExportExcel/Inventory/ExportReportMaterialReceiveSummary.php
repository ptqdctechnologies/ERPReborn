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

class ExportReportMaterialReceiveSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $data = Session::get("MaterialReceiveReportSummaryDataExcel");
        // return collect($data);
        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $filteredData[] = [
                'No'                                =>  $counter++,
                'MR Number'                         =>  $item['MR_Number'] ?? null,
                'Date'                              =>  date('Y-m-d', strtotime($item['date'])) ?? null,
                'Budget'                            =>  null,
                'Reference Number'                  =>  $item['referenceNumber'] ?? null,
                'Delivery From'                     =>  $item['deliveryFrom_NonRefID']['address']?? null,
                'Delivery To'                       =>  $item['deliveryTo_NonRefID']['address'] ?? null,
                'Receive At'                        =>  $item['receiveAt'] ?? null,
                'Remarks'                           =>  $item['remarks'] ?? null,
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = Session::get("MaterialReceiveReportSummaryDataExcel");
        return [
            ["Budget", ": " ,"", "", "", "", "", "", "", ""],
            ["", "", "", "", "", "", "", "", "", ""],
            ["No", "MR Number","Date", "Budget","Reference Number", "Delivery From", "Delivery To", "Receive At", "Remarks"],
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $data = Session::get("MaterialReceiveReportSummaryDataExcel");
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

                $sheet->setCellValue('A2', 'Report Material Receive Summary')
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
