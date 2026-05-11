<?php

namespace App\Http\Controllers\ExportExcel\AdvanceToASF;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportAdvanceToASF implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $advanceRequestToASF, $budgetName, $subBudgetName, $requesterName, $date;

    public function __construct($advanceRequestToASF, $budgetName, $subBudgetName, $requesterName, $date)
    {
        $this->advanceRequestToASF = $advanceRequestToASF;
        $this->budgetName = $budgetName;
        $this->subBudgetName = $subBudgetName;
        $this->requesterName = $requesterName;
        $this->date = $date;
    }

    public function collection()
    {
        $data = $this->advanceRequestToASF;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $filteredData[] = [
                'No' => $counter++,
                'ARF Number' => $item['ARF_Number'] ?? null,
                'Date' => date('d-m-Y', strtotime($item['ARF_Date'])) ?? null,
                'Requester' => $item['ARF_Requester'] ?? null,
                'Total' => $item['ARF_Total_IDR'] ?? null,
                'Payment' => $item['advance_ToPayment'] ?? null,
                'Advance to Payment' => $item['advance_ToPayment'] ?? null,
                'Status' => $item['Status'] ?? null,
                'ASF Number' => $item['ASF_Number'] ?? null,
                'ASF Date' => date('d-m-Y', strtotime($item['ASF_Date'])) ?? null,
                'Expense Claim' => $item['expense_Claim_IDR'] ?? null,
                'Amount to the Company' => $item['amount_Due_Company_IDR'] ?? null,
                'Total ASF' => $item['ASF_Total'] ?? null,
                // 'Description'           => $item['Description'] ?? null,
                'Advance to Settlement' => $item['advance_ToSettlement'] ?? null,
                'Status ASF' => $item['StatusASF'] ?? null,
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        $budgetName = $this->budgetName;
        $subBudgetName = $this->subBudgetName;
        $requesterName = $this->requesterName;
        $date = $this->date;

        return [
            [date('F j, Y')],
            ["ADVANCE TO ASF"],
            [date('h:i A')],
            ["Budget", ": " . $budgetName, "Requester", ": " . $requesterName],
            ["Sub Budget", ": " . $subBudgetName, "Date Range", ": " . $date],
            [""],
            ["No", "Advance", "", "", "", "", "", "", "Settlement", "", "", "", "", "", ""],
            ["", "ARF Number", "Date", "Requester", "Total", "Payment", "Balance", "Status", "ASF Number", "Date", "Expense Claim", "Amount to the Company", "Total", "ARF to ASF", "Status"]
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
        $sheet->getStyle('A3:O3')->applyFromArray($styleArrayHeader);
        $sheet->mergeCells('A3:O3');

        $styleArrayHeader4 = [
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
        $sheet->getStyle('A4:O4')->applyFromArray($styleArrayHeader4);

        $styleArrayHeader5 = [
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
        $sheet->getStyle('A5:O5')->applyFromArray($styleArrayHeader5);

        $styleArrayHeader2 = [
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

        $sheet->getStyle('A7:O7')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A7:A8');
        $sheet->mergeCells('B7:H7');
        $sheet->mergeCells('I7:O7');
        // $sheet->mergeCells('N7:O7');
        $sheet->getStyle('A8:O8')->applyFromArray($styleArrayHeader2);

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

        $datas = $this->advanceRequestToASF;
        $totalCell = count($datas);
        $lastCell = 'A8:O' . $totalCell + 8;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $total = $datas[0]['expense_Claim_IDR'];
        $totalPayment = $datas[0]['advance_ToPayment'];
        $totalSettlement = $datas[0]['ASF_Total'];
        $totalExpenseClaim = $datas[0]['expense_Claim_IDR'];
        $totalAmountCompany = $datas[0]['amount_Due_Company_IDR'];
        $totalAdvancePayment = $datas[0]['advance_ToPayment'];
        $totalAdvanceSettlement = $datas[0]['advance_ToSettlement'];

        $sheet->insertNewRowBefore($totalCell + 9, 1);
        $sheet->setCellValue('A' . $totalCell + 9, "GRAND TOTAL");
        $sheet->setCellValue('E' . $totalCell + 9, $total);
        $sheet->setCellValue('F' . $totalCell + 9, $totalPayment);
        $sheet->setCellValue('J' . $totalCell + 9, $totalSettlement);
        $sheet->setCellValue('K' . $totalCell + 9, $totalExpenseClaim);
        $sheet->setCellValue('L' . $totalCell + 9, $totalAmountCompany);
        $sheet->setCellValue('O' . $totalCell + 9, $totalAdvancePayment);
        $sheet->setCellValue('P' . $totalCell + 9, $totalAdvanceSettlement);
        $sheet->mergeCells('A' . $totalCell + 9 . ':' . 'D' . $totalCell + 9);
        $sheet->mergeCells('G' . $totalCell + 9 . ':' . 'I' . $totalCell + 9);
        $sheet->mergeCells('M' . $totalCell + 9 . ':' . 'N' . $totalCell + 9);

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

        $sheet->getStyle('A' . $totalCell + 9 . ':' . 'O' . $totalCell + 9)->applyFromArray($styleArrayFooter);

    }
}