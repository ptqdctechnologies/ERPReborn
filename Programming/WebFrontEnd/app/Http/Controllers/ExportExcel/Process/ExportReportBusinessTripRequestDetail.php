<?php

namespace App\Http\Controllers\ExportExcel\Process;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ExportReportBusinessTripRequestDetail implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        return collect([]);
    }

    public function headings(): array
    {
        return [];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $data = Session::get("dataReportBusinessTripRequestDetail");

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

                $sheet->setCellValue('A2', 'BUSINESS TRIP REQUEST DETAIL REPORT')
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

                $sheet->setCellValue('A4', 'BRF Number')->getStyle('A4')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B4', ': ' . $data['dataHeaderOne']['brfNumber']);

                $sheet->setCellValue('A5', 'Budget')->getStyle('A5')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B5', ': ' . $data['dataHeaderOne']['budgetCode']);

                $sheet->setCellValue('A6', 'Sub Budget')->getStyle('A6')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B6', ': ' . $data['dataHeaderOne']['siteCode']);

                $sheet->setCellValue('A7', 'Product')->getStyle('A7')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B7', ': ' . $data['dataHeaderOne']['productID'] . ' (' . $data['dataHeaderOne']['productName'] . ')');

                $sheet->setCellValue('C4', 'Date Commence Travel')->getStyle('C4')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D4', ': ' . $data['dataHeaderOne']['dateCommence']);

                $sheet->setCellValue('C5', 'Date End Travel')->getStyle('C5')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D5', ': ' . $data['dataHeaderOne']['dateEnd']);

                $sheet->setCellValue('C6', 'BRF Date')->getStyle('C6')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D6', ': ' . $data['dataHeaderOne']['dateBRF']);

                $sheet->setCellValue('C7', 'Contact Phone')->getStyle('C7')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D7', ': ' . $data['dataHeaderOne']['contactPhone']);

                $sheet->setCellValue('C8', 'Bank Account')->getStyle('C8')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D8', ': ' . '(' . $data['dataHeaderOne']['bankType'] . ') ' . $data['dataHeaderOne']['bankAccountNumber'] . ' - ' . $data['dataHeaderOne']['bankAccountName']);

                $sheet->setCellValue('E4', 'Requester')->getStyle('E4')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('F4', ': ' . $data['dataHeaderOne']['requester']);

                $sheet->setCellValue('E5', 'Beneficiary')->getStyle('E5')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('F5', ': ' . $data['dataHeaderOne']['beneficiary']);

                $sheet->setCellValue('E6', 'Departing From')->getStyle('E6')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('F6', ': ' . $data['dataHeaderOne']['departingFrom']);

                $sheet->setCellValue('E7', 'Destination To')->getStyle('E7')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('F7', ': ' . $data['dataHeaderOne']['destinationTo']);

                $sheet->setCellValue('A10', 'Total Allowance')->getStyle('A10')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B10', ': ' . number_format($data['dataHeaderTwo']['totalAllowance'], 2, '.', ','));

                $sheet->setCellValue('C10', 'Total Entertainment')->getStyle('C10')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D10', ': ' . number_format($data['dataHeaderTwo']['totalEntertainment'], 2, '.', ','));

                $sheet->setCellValue('E10', 'Total Other')->getStyle('E10')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('F10', ': ' . number_format($data['dataHeaderTwo']['totalOther'], 2, '.', ','));

                $sheet->setCellValue('A11', 'Total Transport')->getStyle('A11')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('B11', ': ' . number_format($data['dataHeaderTwo']['totalTransport'], 2, '.', ','));

                $sheet->setCellValue('C11', 'Total Accommodation')->getStyle('C11')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('D11', ': ' . number_format($data['dataHeaderTwo']['totalAccommodation'], 2, '.', ','));

                $sheet->setCellValue('E12', 'Total Business Trip')->getStyle('E12')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->setCellValue('F12', ': ' . number_format($data['dataHeaderTwo']['totalBusinessTrip'], 2, '.', ','));

                $sheet->setCellValue('A14', 'Reason to Travel')->getStyle('A14')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                        'color' => ['rgb' => '000000']
                    ]
                ]);
                $sheet->mergeCells('A15:F15');
                $sheet->setCellValue('A15', $data['dataHeaderThree']['reason']);
                $sheet->getStyle('A15:F15')->getAlignment()->setWrapText(true);
            },
        ];
    }
}
