<?php

namespace App\Http\Controllers\ExportExcel\Process;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportBusinessTripToBSF implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataReport;

    public function __construct($dataReport)
    {
        $this->dataReport = $dataReport;
    }

    public function collection()
    {
        $data = $this->dataReport;

        $totalBusinessTrip = 0;
        $totalBusinessTripPayment = 0;
        $totalBusinessTripBalance = 0;

        $totalBusinessTripSettlement = 0;
        $totalBusinessTripSettlementPayment = 0;
        $totalBusinessTripSettlementBalance = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $totalBusinessTrip += is_numeric($item['brfTotal']) ? $item['brfTotal'] : 0;
            $totalBusinessTripPayment += is_numeric($item['brfPayment']) ? $item['brfPayment'] : 0;
            $totalBusinessTripBalance += is_numeric($item['balanceBrfToPayment']) ? $item['balanceBrfToPayment'] : 0;

            $totalBusinessTripSettlement += is_numeric($item['bsfTotal']) ? $item['bsfTotal'] : 0;
            $totalBusinessTripSettlementPayment += is_numeric($item['bsfPayment']) ? $item['bsfPayment'] : 0;
            $totalBusinessTripSettlementBalance += is_numeric($item['balanceBrfToBsf']) ? $item['balanceBrfToBsf'] : 0;

            $filteredData[] = [
                'No' => $counter++,
                'BRF Number' => $item['brfNumber'] ?? '-',
                'BRF Date' => $item['brfDate'] ?? '-',
                'BRF Requester' => $item['requesterName'] ?? '-',
                'BRF Date Commence Travel' => $item['dateCommenceTravel'] ?? '-',
                'BRF Date End Travel' => $item['dateEndTravel'] ?? '-',
                'BRF Total' => $item['brfTotal'] ?? '-',
                'BRF Payment' => $item['brfPayment'] ?? '-',
                'BRF Balance' => $item['balanceBrfToPayment'] ?? '-',
                'BRF Status' => $item['brfStatus'] ?? '-',
                'BSF Number' => $item['bsfNumber'] ?? '-',
                'BSF Date' => $item['bsfDate'] ?? '-',
                'BSF Total' => $item['bsfTotal'] ?? '-',
                'BSF Payment' => $item['bsfPayment'] ?? '-',
                'BSF Balance' => $item['balanceBrfToBsf'] ?? '-',
                'BSF Status' => $item['bsfStatus'] ?? '-',
            ];
        }

        $filteredData[] = [
            'No' => 'GRAND TOTAL',
            'BRF Number' => '',
            'BRF Date' => '',
            'BRF Requester' => '',
            'BRF Date Commence Travel' => '',
            'BRF Date End Travel' => '',
            'BRF Total' => $totalBusinessTrip,
            'BRF Payment' => $totalBusinessTripPayment,
            'BRF Balance' => $totalBusinessTripBalance,
            'BRF Status' => '',
            'BSF Number' => '',
            'BSF Date' => '',
            'BSF Total' => $totalBusinessTripSettlement,
            'BSF Payment' => $totalBusinessTripSettlementPayment,
            'BSF Balance' => $totalBusinessTripSettlementBalance,
            'BSF Status' => ''
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            [date('F j, Y')],
            ["BUSINESS TRIP TO BUSINESS TRIP SETTLEMENT"],
            [date('h:i A')],
            ["BRF Number", ": -", "Budget", ": -", "Requester", ": -"],
            ["BSF Number", ": -", "Sub Budget", ": -", "Date Range", ": -"],
            [""],
            ["No", "Business Trip", "", "", "", "", "", "", "", "", "Business Trip Settlement", "", "", "", "", ""],
            ["", "BRF Number", "Date", "Requester", "Date Commence Travel", "Date End Travel", "Total", "Payment", "Business Trip to Payment Balance", "BRF Status", "BSF Number", "Date", "Total", "Payment", "Business Trip to Settlement Balance", "BSF Status"]
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $styleArrayHeader0 = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_RIGHT,
            ]
        ];
        $sheet->getStyle('A1:P1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:P1');

        $styleArrayHeader1 = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ]
        ];
        $sheet->getStyle('A2:P2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:P2');

        $styleArrayHeader2 = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_RIGHT,
            ]
        ];
        $sheet->getStyle('A3:P3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:P3');

        $styleArrayHeader3 = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
            ]
        ];
        $sheet->getStyle('A4:P4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:P5')->applyFromArray($styleArrayHeader3);

        $styleArrayHeader4 = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => 'solid',
                'rotation' => 0,
                'color' => [
                    'rgb' => 'E9ECEF',
                ],
            ],
        ];
        $sheet->getStyle('A7:P7')->applyFromArray($styleArrayHeader4);
        $sheet->getStyle('A8:P8')->applyFromArray($styleArrayHeader4);
        $sheet->mergeCells('A7:A8');
        $sheet->mergeCells('B7:J7');
        $sheet->mergeCells('K7:P7');

        $styleArrayContent = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
            ],
        ];
        $datas = $this->dataReport;
        $totalCell = count($datas);
        $lastCell = 'A9:P' . $totalCell + 9;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $styleArrayFooter = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'fill' => [
                'fillType' => 'solid',
                'rotation' => 0,
                'color' => [
                    'rgb' => 'E9ECEF',
                ],
            ],
        ];
        $sheet->getStyle('A' . $totalCell + 9 . ':' . 'P' . $totalCell + 9)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 9 . ':F' . $totalCell + 9);
    }
}