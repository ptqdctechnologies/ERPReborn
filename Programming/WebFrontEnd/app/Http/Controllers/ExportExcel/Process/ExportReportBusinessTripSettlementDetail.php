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

class ExportReportBusinessTripSettlementDetail implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Session::get("dataReportBusinessTripSettlementDetail");

        $filteredData = [];
        $counter = 1;
        foreach ($data['dataDetails']['details']['itemList'] as $item) {
            $totalRowValue = $item['entities']['transport'] + $item['entities']['allowance'] + $item['entities']['entertainment'] + $item['entities']['other'] + $item['entities']['transport_company'] + $item['entities']['allowance_company'] + $item['entities']['entertainment_company'] + $item['entities']['other_company'];

            $filteredData[] = [
                'No'                            => $counter++,
                'Product ID'                    => $item['entities']['product_RefID'],
                'Description & Spesifications'  => $item['entities']['productName'],
                'Travel & Fares'                => $item['entities']['transport'] ?? null,
                'Allowance'                     => $item['entities']['allowance'] ?? null,
                'Entertainment'                 => $item['entities']['entertainment'] ?? null,
                'Other'                         => $item['entities']['other'] ?? null,
                'Travel & Fares Company'        => $item['entities']['transport_company'] ?? null,
                'Allowance Company'             => $item['entities']['allowance_company'] ?? null,
                'Entertainment Company'         => $item['entities']['entertainment_company'] ?? null,
                'Other Company'                 => $item['entities']['other_company'] ?? null,
                'Total'                         => $totalRowValue
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = Session::get("dataReportBusinessTripSettlementDetail");

        return [
            [date('F j, Y')],
            ["BUSINESS TRIP SETTLEMENT DETAIL"],
            [date('h:i A')],
            ["BRF Number", ": " . $data['dataHeader']['brfNumber'], "BSF Number", ": " . $data['bsfNumber'], "Currency", ": " . $data['dataDetails']['details']['itemList'][0]['entities']['priceCurrencyISOCode'], "", "", "", "", "", "", ""],
            ["BRF Date", ": " . $data['dataHeader']['brfDate'], "Date", ": " . $data['dataHeader']['date'], "Requester", ": " . $data['dataDetails']['general']['involvedPersons'][0]['requesterWorkerFullName'], "", "", "", "", "", "", ""],
            ["BRF Total", ": " . $data['totalBSF'], "Budget", ": " . $data['budgetCode'] . " - " . $data['budgetName'], "Beneficiary", ": " . $data['dataDetails']['general']['involvedPersons'][0]['beneficiaryWorkerName'], "", "", "", "", "", "", ""],
            ["", "", "Sub Budget", ": " . $data['siteCode'] . " - " . $data['siteName'], "Bank Account", ": " . "(" . $data['dataDetails']['general']['bankAccount']['beneficiary']['bankAcronym'] . ") " . $data['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountNumber'] . " - " . $data['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountName'], "", "", "", "", "", "", ""],
            ["", "", "", "", "", ""],
            ["No", "Product ID", "Description & Spesifications", "Expense Claim", "", "", "", "Amount Due to Company", "", "", "", "Total"],
            ["", "", "", "Travel & Fares", "Allowance", "Entertainment", "Other", "Travel & Fares", "Allowance", "Entertainment", "Other"]
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A9:A10');
        $sheet->mergeCells('B9:B10');
        $sheet->mergeCells('C9:C10');
        $sheet->mergeCells('D9:G9');
        $sheet->mergeCells('H9:J9');
        $sheet->mergeCells('L9:L10');

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

        $sheet->getStyle('A4:A6')->applyFromArray($styleArrayHeader4);
        $sheet->getStyle('C4:C7')->applyFromArray($styleArrayHeader4);
        $sheet->getStyle('E4:E7')->applyFromArray($styleArrayHeader4);
        
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

        $sheet->getStyle('A1:L1')->applyFromArray($styleArrayHeader);
        $sheet->mergeCells('A1:L1');

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

        $sheet->getStyle('A2:L2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:L2');

        $styleArrayHeader3 = [
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

        $sheet->getStyle('A3:L3')->applyFromArray($styleArrayHeader3);
        $sheet->mergeCells('A3:L3');

        $styleArrayHeader2 = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => 'center'
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

        $sheet->getStyle('A9:L9')->applyFromArray($styleArrayHeader2);
        $sheet->getStyle('D10:K10')->applyFromArray($styleArrayHeader2);

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

        $datas = Session::get("dataReportBusinessTripSettlementDetail");
        $totalCell = count($datas['dataDetails']['details']['itemList']);
        $lastCell = 'A11:L' . $totalCell + 11;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $totalBsf = $datas['totalBSF'];

        $sheet->setCellValue('A' . $totalCell + 11, "GRAND TOTAL BSF");
        $sheet->setCellValue('L' . $totalCell + 11, $totalBsf);
        $sheet->mergeCells('A' . $totalCell + 11 . ':' . 'K' . $totalCell + 11);

        $styleArrayFooter = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => '000000',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
            ],
            'fill' => [
                'fillType' => 'solid',
                'rotation' => 0,
                'color' => [
                    'rgb' => 'E9ECEF',
                ],
            ],
        ];

        $sheet->getStyle('A' . $totalCell + 11 . ':' . 'L' . $totalCell + 11)->applyFromArray($styleArrayFooter);
    }
}
