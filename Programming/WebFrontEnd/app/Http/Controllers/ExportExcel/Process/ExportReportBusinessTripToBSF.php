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

class ExportReportBusinessTripToBSF implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Session::get("dataReportBusinessTripToBSF");

        $filteredData = [];
        $counter = 1;
        foreach ($data['dataDetail'] as $item) {
            $filteredData[] = [
                'No'                                    => $counter++,
                'BRF Number'                            => $item['DocumentNumber'] ?? null,
                'Date'                                  => date('d-m-Y', strtotime($item['DocumentDateTimeTZ'])) ?? null,
                'Requester'                             => $item['RequesterWorkerName'] ?? null,
                'Total Travel'                          => $item['TotalTravel'] ?? null,
                'Total Allowance'                       => $item['TotalAllowance'] ?? null,
                'Total Entertainment'                   => $item['TotalEntertainment'] ?? null,
                'Total Other'                           => $item['TotalOther'] ?? null,
                'Payment'                               => $item['TotalPayment'] ?? null,
                'Status'                                => $item['Status'] ?? null,
                'Date Commence Travel'                  => date('d-m-Y', strtotime($item['DateCommenceTravel'])) ?? null,
                'Date End Travel'                       => date('d-m-Y', strtotime($item['DateEndTravel'])) ?? null,
                'Document BSF Number'                   => $item['DocumentBSFNumber'] ?? null,
                'BSF Date'                              => date('d-m-Y', strtotime($item['DocumentBSFDateTimeTZ'])) ?? null,
                'Total BSF Travel'                      => $item['TotalBSFTravel'] ?? null,
                'Total BSF Allowance'                   => $item['TotalBSFAllowance'] ?? null,
                'Total BSF Entertainment'               => $item['TotalBSFEntertainment'] ?? null,
                'Total BSF Other'                       => $item['TotalBSFOther'] ?? null,
                'Total Expense Claim Travel'            => $item['TotalExpenseClaimTravel'] ?? null,
                'Total Expense Claim Allowance'         => $item['TotalExpenseClaimAllowance'] ?? null,
                'Total Expense Claim Entertainment'     => $item['TotalExpenseClaimEntertainment'] ?? null,
                'Total Expense Claim Other'             => $item['TotalExpenseClaimOther'] ?? null,
                'Total Amount To Company Travel'        => $item['TotalAmountToCompanyTravel'] ?? null,
                'Total Amount To Company Allowance'     => $item['TotalAmountToCompanyAllowance'] ?? null,
                'Total Amount To Company Entertainment' => $item['TotalAmountToCompanyEntertainment'] ?? null,
                'Total Amount To Company Other'         => $item['TotalAmountToCompanyOther'] ?? null,
                'Description'                           => $item['Description'] ?? null,
                'Status BSF'                            => $item['StatusBSF'] ?? null,
                'Total Business Trip Payment'           => $item['TotalBusinessTripPayment'] ?? null,
                'Total Business Trip Settlement'        => $item['TotalBusinessTripSettlement'] ?? null,
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = Session::get("dataReportBusinessTripToBSF");
        $requester_name = $data['requester']['name'] ?? '-';

        return [
            [date('F j, Y')],
            ["BUSINESS TRIP TO BSF"],
            [date('h:i A')],
            ["Budget", ": " . $data['project']['code'] . ' - ' . $data['project']['name'], "Requester", ": " . $requester_name, "", "", "", "", "", "", ""],
            ["Sub Budget", ": " . $data['site']['code'] . ' - ' . $data['site']['name']],
            ["", "", "", "", "", "", "", "", "", "", ""],
            ["No", "Business Trip", "", "", "", "", "", "", "", "", "", "", "Settlement", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "Balance", ""],
            ["", "BRF Number", "Date", "Requester", "Total Travel", "Total Allowance", "Total Entertainment", "Total Other", "Payment", "Status", "Date Commence Travel", "Date End Travel", "BSF Number", "Date", "Total Travel", "Total Allowance", "Total Entertainment", "Total Other", "Expense Claim", "", "", "", "Amount to the Company", "", "", "", "Description", "Status", "Business Trip To Payment", "Business Trip To Settlement"],
            ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "","", "", "", "Travel", "Allowance", "Entertainment", "Other", "Travel", "Allowance", "Entertainment", "Other", "", "", "", ""],
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
        $sheet->getStyle('A1:AD1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:AD1');

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
        $sheet->getStyle('A2:AD2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:AD2');

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
        $sheet->getStyle('A3:AD3')->applyFromArray($styleArrayHeader);
        $sheet->mergeCells('A3:AD3');

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
        $sheet->getStyle('A4:AD4')->applyFromArray($styleArrayHeader4);

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
        $sheet->getStyle('A5:AD5')->applyFromArray($styleArrayHeader5);

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
        $sheet->getStyle('A7:AD7')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A7:A9');
        $sheet->getStyle('A8:AD8')->applyFromArray($styleArrayHeader2);
        $sheet->getStyle('A9:AD9')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('B7:L7');
        $sheet->mergeCells('B8:B9');
        $sheet->mergeCells('C8:C9');
        $sheet->mergeCells('D8:D9');
        $sheet->mergeCells('E8:E9');
        $sheet->mergeCells('F8:F9');
        $sheet->mergeCells('G8:G9');
        $sheet->mergeCells('H8:H9');
        $sheet->mergeCells('I8:I9');
        $sheet->mergeCells('J8:J9');
        $sheet->mergeCells('K8:K9');
        $sheet->mergeCells('L8:L9');
        $sheet->mergeCells('M8:M9');
        $sheet->mergeCells('N8:N9');
        $sheet->mergeCells('O8:O9');
        $sheet->mergeCells('P8:P9');
        $sheet->mergeCells('Q8:Q9');
        $sheet->mergeCells('R8:R9');
        $sheet->mergeCells('S8:V8');
        $sheet->mergeCells('W8:Z8');
        $sheet->mergeCells('M7:AB7');
        $sheet->mergeCells('AA8:AA9');
        $sheet->mergeCells('AB8:AB9');
        $sheet->mergeCells('AC8:AC9');
        $sheet->mergeCells('AD8:AD9');
        $sheet->mergeCells('AC7:AD7');

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

        $datas = Session::get("dataReportBusinessTripToBSF");
        $totalCell = count($datas['dataDetail']);
        $lastCell = 'A9:AD' . $totalCell + 9;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $totalTravel                        = $datas['totalTravel'];
        $totalAllowance                     = $datas['totalAllowance'];
        $totalEntertainment                 = $datas['totalEntertainment'];
        $totalOther                         = $datas['totalOther'];
        $totalPayment                       = $datas['totalPayment'];
        $totalBSFTravel                     = $datas['totalBSFTravel'];
        $totalBSFAllowance                  = $datas['totalBSFAllowance'];
        $totalBSFEntertainment              = $datas['totalBSFEntertainment'];
        $totalBSFOther                      = $datas['totalBSFOther'];
        $totalExpenseClaimTravel            = $datas['totalExpenseClaimTravel'];
        $totalExpenseClaimAllowance         = $datas['totalExpenseClaimAllowance'];
        $totalExpenseClaimEntertainment     = $datas['totalExpenseClaimEntertainment'];
        $totalExpenseClaimOther             = $datas['totalExpenseClaimOther'];
        $totalAmountToCompanyTravel         = $datas['totalAmountToCompanyTravel'];
        $totalAmountToCompanyAllowance      = $datas['totalAmountToCompanyAllowance'];
        $totalAmountToCompanyEntertainment  = $datas['totalAmountToCompanyEntertainment'];
        $totalAmountToCompanyOther          = $datas['totalAmountToCompanyOther'];
        $totalBusinessTripPayment           = $datas['totalBusinessTripPayment'];
        $totalBusinessTripSettlement        = $datas['totalBusinessTripSettlement'];

        $sheet->insertNewRowBefore($totalCell + 10, 1);
        $sheet->setCellValue('A' . $totalCell + 10, "GRAND TOTAL");
        $sheet->setCellValue('E' . $totalCell + 10, $totalTravel);
        $sheet->setCellValue('F' . $totalCell + 10, $totalAllowance);
        $sheet->setCellValue('G' . $totalCell + 10, $totalEntertainment);
        $sheet->setCellValue('H' . $totalCell + 10, $totalOther);
        $sheet->setCellValue('I' . $totalCell + 10, $totalPayment);
        $sheet->setCellValue('O' . $totalCell + 10, $totalBSFTravel);
        $sheet->setCellValue('P' . $totalCell + 10, $totalBSFAllowance);
        $sheet->setCellValue('Q' . $totalCell + 10, $totalBSFEntertainment);
        $sheet->setCellValue('R' . $totalCell + 10, $totalBSFOther);
        $sheet->setCellValue('S' . $totalCell + 10, $totalExpenseClaimTravel);
        $sheet->setCellValue('T' . $totalCell + 10, $totalExpenseClaimAllowance);
        $sheet->setCellValue('U' . $totalCell + 10, $totalExpenseClaimEntertainment);
        $sheet->setCellValue('V' . $totalCell + 10, $totalExpenseClaimOther);
        $sheet->setCellValue('W' . $totalCell + 10, $totalAmountToCompanyTravel);
        $sheet->setCellValue('X' . $totalCell + 10, $totalAmountToCompanyAllowance);
        $sheet->setCellValue('Y' . $totalCell + 10, $totalAmountToCompanyEntertainment);
        $sheet->setCellValue('Z' . $totalCell + 10, $totalAmountToCompanyOther);
        $sheet->setCellValue('AC' . $totalCell + 10, $totalBusinessTripPayment);
        $sheet->setCellValue('AD' . $totalCell + 10, $totalBusinessTripSettlement);
        $sheet->mergeCells('A' . $totalCell + 10 . ':' . 'D' . $totalCell + 10);
        $sheet->mergeCells('J' . $totalCell + 10 . ':' . 'N' . $totalCell + 10);
        $sheet->mergeCells('AA' . $totalCell + 10 . ':' . 'AB' . $totalCell + 10);

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

        $sheet->getStyle('A' . $totalCell + 10 . ':' . 'AD' . $totalCell + 10)->applyFromArray($styleArrayFooter);
    }
}
