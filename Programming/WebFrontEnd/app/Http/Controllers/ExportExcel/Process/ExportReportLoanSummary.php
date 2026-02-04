<?php

namespace App\Http\Controllers\ExportExcel\Process;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportLoanSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataLoanSummary;

    public function __construct($dataLoanSummary)
    {
        $this->dataLoanSummary = $dataLoanSummary;
    }

    public function collection()
    {
        $data = $this->dataLoanSummary;

        $principalLoanIDR           = 0;
        $principalLoanOtherCurrency = 0;
        $principalLoanEquivalentIDR = 0;

        $totalLoanIDR           = 0;
        $totalLoanOtherCurrency = 0;
        $totalLoanEquivalentIDR = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $principalLoanIDR           += 0; // is_numeric($item['total_IDR']) ? $item['total_IDR'] : 0;
            $principalLoanOtherCurrency += 0;
            $principalLoanEquivalentIDR += 0;

            $totalLoanIDR           += 0;
            $totalLoanOtherCurrency += 0;
            $totalLoanEquivalentIDR += 0;

            $filteredData[] = [
                'No'                                    => $counter++,
                'Loan Number'                           => $item['loanNumber'] ?? '-',
                'Date'                                  => isset($item['date']) ? date('d-m-Y', strtotime($item['date'])) : '-',
                'Type'                                  => $item['type'] ?? '-',
                'Creditor'                              => $item['creditorName'] ?? '-',
                'Debitor'                               => $item['debitorName'] ?? '-',
                'Principal Loan Total IDR'              => $item['total_Other_Currency'] ?? '-',
                'Principal Loan Total Other Currency'   => $item['total_Equivalent_IDR'] ?? '-',
                'Principal Loan Total Equivalent IDR'   => $item['total_Equivalent_IDR'] ?? '-',
                'Rate'                                  => $item['rate'] ?? '-',
                'Term'                                  => $item['term'] ?? '-',
                'Total Loan IDR'                        => $item['total_Other_Currency'] ?? '-',
                'Total Loan Other Currency'             => $item['total_Equivalent_IDR'] ?? '-',
                'Total Loan Equivalent IDR'             => $item['total_Equivalent_IDR'] ?? '-',
                'Remark'                                => $item['notes'] ?? '-',
            ];
        }

        $filteredData[] = [
            'No'                                    => 'GRAND TOTAL',
            'Loan Number'                           => '',
            'Date'                                  => '',
            'Type'                                  => '',
            'Creditor'                              => '',
            'Debitor'                               => '',
            'Principal Loan Total IDR'              => $item['total_Other_Currency'] ?? '-',
            'Principal Loan Total Other Currency'   => $item['total_Equivalent_IDR'] ?? '-',
            'Principal Loan Total Equivalent IDR'   => $item['total_Equivalent_IDR'] ?? '-',
            'Rate'                                  => '',
            'Term'                                  => '',
            'Total Loan IDR'                        => $item['total_Other_Currency'] ?? '-',
            'Total Loan Other Currency'             => $item['total_Equivalent_IDR'] ?? '-',
            'Total Loan Equivalent IDR'             => $item['total_Equivalent_IDR'] ?? '-',
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = $this->dataLoanSummary;

        return [
            [date('F j, Y')],
            ["LOAN SUMMARY", " ", " ", " ", " ", " ", " "],
            [date('h:i A')],
            ["Budget", ": -", "Creditor", ": -", "", "", ""],
            ["Date", ": -", "Debitor", ": -", "", "", ""],
            [""],
            ["No", "Loan Number", "Date", "Type", "Creditor", "Debitor", "Principal Loan", "", "", "Rate (%)", "Term", "Total Loan", "", "", "Remark"],
            ["", "", "", "", "", "", "Total IDR", "Total Other Currency", "Total Equivalent IDR", "", "", "Total IDR", "Total Other Currency", "Total Equivalent IDR"]
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

        $sheet->getStyle('A1:O1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:O1');

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

        $sheet->getStyle('A2:O2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:O2');

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

        $sheet->getStyle('A3:O3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:O3');

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

        $sheet->getStyle('A4:O4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:O5')->applyFromArray($styleArrayHeader3);

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

        $sheet->getStyle('A7:O7')->applyFromArray($styleArrayHeader4);
        $sheet->mergeCells('A7:A8');
        $sheet->mergeCells('B7:B8');
        $sheet->mergeCells('C7:C8');
        $sheet->mergeCells('D7:D8');
        $sheet->mergeCells('E7:E8');
        $sheet->mergeCells('F7:F8');
        $sheet->mergeCells('G7:I7');
        $sheet->mergeCells('J7:J8');
        $sheet->mergeCells('K7:K8');
        $sheet->mergeCells('L7:N7');
        $sheet->mergeCells('O7:O8');
        $sheet->getStyle('A8:O8')->applyFromArray($styleArrayHeader4);

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

        $datas      = $this->dataLoanSummary;
        $totalCell  = count($datas);
        $lastCell   = 'A8:O' . $totalCell + 8;
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

        $sheet->getStyle('A' . $totalCell + 9 . ':' . 'O' . $totalCell + 9)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 9 . ':F' . $totalCell + 9);
    }
}