<?php

namespace App\Http\Controllers\ExportExcel\AdvanceSettlement;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportAdvanceSettlementSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataAdvanceSettlementSummary;

    public function __construct($dataAdvanceSettlementSummary)
    {
        $this->dataAdvanceSettlementSummary = $dataAdvanceSettlementSummary;
    }

    public function collection()
    {
        $data = $this->dataAdvanceSettlementSummary;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $filteredData[] = [
                'No'                                => $counter++,
                'BSF Number'                        => $item['documentNumber'] ?? null,
                'Description'                       => $item['product_Name'] ?? null,
                // 'Sub Budget'                        => $item['CombinedBudgetSectionName'] ?? null,
                // 'Departing From'                    => $item['DepartingFrom'] ?? null,
                // 'Destination To'                    => $item['DestinationTo'] ?? null,
                'Date'                              => date('d-m-Y', strtotime($item['date'])) ?? null,
                'Total Expense Claim Cart'          => $item['total_Expense_Claim'] ?? null,
                'Total Amount Due to Company Cart'  => $item['total_Amount_Due_Company'] ?? null,
                'Total BSF'                         => $item['total_Advance_Settlement'] ?? null,
                // 'Currency'                          => $item['CurrencyName'] ?? null,
                'Requester'                         => $item['requester'] ?? null,
                // 'Beneficiary'                       => $item['BeneficiaryWorkerName'] ?? null,
                'Remark'                            => $item['remarks'] ?? null,
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = $this->dataAdvanceSettlementSummary;

        return [
            [date('F j, Y')],
            ["ADVANCE SETTLEMENT SUMMARY", " ", " ", " ", " ", " ", " "],
            [date('h:i A')],
            ["Budget", ": " . $data[0]['combinedBudgetCode'] . ' - ' . $data[0]['combinedBudgetName'], "", "", "", "", "", "", "", "", ""],
            ["", "", "", "", "", "", "", "", "", "", ""],
            ["No", "ASF Number", "Description", "Date", "Total Expense Claim Cart", "Total Amount Due to Company Cart", "Total Advance", "Requester", "Remark"]
            // ["No", "BSF Number", "Sub Budget", "Departing From", "Destination To", "Date", "Total Expense Claim Cart", "Total Amount Due to Company Cart", "Total BSF", "Currency", "Requester", "Beneficiary", "Remark"]
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

        $sheet->getStyle('A1:I1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:I1');

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

        $sheet->getStyle('A2:I2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:I2');

        $styleArrayHeader = [
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

        $sheet->getStyle('A3:I3')->applyFromArray($styleArrayHeader);
        $sheet->mergeCells('A3:I3');

        $styleArrayHeader2 = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
            ],
        ];

        $sheet->getStyle('A4:I4')->applyFromArray($styleArrayHeader2);

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

        $sheet->getStyle('A6:I6')->applyFromArray($styleArrayHeader4);

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

        $datas      = $this->dataAdvanceSettlementSummary;
        $totalCell  = count($datas);
        $lastCell   = 'A7:I' . $totalCell + 6;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $totalExpense   = 0;
        $totalAmount    = 0;
        $total          = 0;

        $sheet->insertNewRowBefore($totalCell + 7, 1);
        $sheet->setCellValue('A' . $totalCell + 7, "GRAND TOTAL");
        $sheet->setCellValue('E' . $totalCell + 7, $totalExpense);
        $sheet->setCellValue('F' . $totalCell + 7, $totalAmount);
        $sheet->setCellValue('G' . $totalCell + 7, $total);
        $sheet->mergeCells('A' . $totalCell + 7 . ':' . 'D' . $totalCell + 7);

        $styleArrayFooter = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
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

        $sheet->getStyle('A' . $totalCell + 7 . ':' . 'I' . $totalCell + 7)->applyFromArray($styleArrayFooter);
    }
}
