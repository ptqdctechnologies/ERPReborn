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
            $filteredData[] = [
                'No'                            => $counter++,
                'Product ID'                    => $item['entities']['product_RefID'] ?? null,
                'Description & Spesifications'  => $item['entities']['productName'] ?? null,
                'Qty'                           => $item['entities']['quantity'] ?? null,
                'Unit Price'                    => number_format($item['entities']['priceBaseCurrencyValue'], 2, '.', ',') ?? null,
                'Total Advance'                 => number_format($item['entities']['quantity'] * $item['entities']['priceBaseCurrencyValue'], 2, '.', ',') ?? null,
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
            ["BRF Number", ": " . 'BRF-24000201' ?? $data['budgetCode'], "Currency", ": " . $data['dataDetails']['details']['itemList'][0]['entities']['priceCurrencyISOCode'], "", "", "", "", "", "", ""],
            ["Date", ": " . $data['dataHeader']['date'], "Requester", ": " . $data['dataDetails']['general']['involvedPersons'][0]['requesterWorkerFullName'], "", "", "", "", "", "", ""],
            ["Budget", ": " . $data['budgetCode'] . " - " . $data['budgetName'], "Beneficiary", ": " . $data['dataDetails']['general']['involvedPersons'][0]['beneficiaryWorkerFullName'], "", "", "", "", "", "", ""],
            ["Sub Budget", ": " . $data['siteCode'] . " - " . $data['siteName'], "Bank Account", ": " . "(" . $data['dataDetails']['general']['bankAccount']['beneficiary']['bankAcronym'] . ") " . $data['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountNumber'] . " - " . $data['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountName'], "", "", "", "", "", "", ""],
            ["", "", "", "", "", ""],
            ["No", "Product ID", "Description & Spesifications", "Qty", "Unit Price", "Total Advance"]
        ];
    }

    public function styles(Worksheet $sheet)
    {
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

        $sheet->getStyle('A1:F1')->applyFromArray($styleArrayHeader);
        $sheet->mergeCells('A1:F1');

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

        $sheet->getStyle('A2:F2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:F2');

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

        $sheet->getStyle('A3:F3')->applyFromArray($styleArrayHeader3);
        $sheet->mergeCells('A3:F3');

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

        $sheet->getStyle('A9:F9')->applyFromArray($styleArrayHeader2);

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
        $lastCell = 'A9:F' . $totalCell + 9;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);

        $total = $datas['total'];

        $sheet->insertNewRowBefore($totalCell + 10, 1);
        $sheet->setCellValue('A' . $totalCell + 10, "GRAND TOTAL");
        $sheet->setCellValue('F' . $totalCell + 10, $total);
        $sheet->mergeCells('A' . $totalCell + 10 . ':' . 'D' . $totalCell + 10);

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

        $sheet->getStyle('A' . $totalCell + 10 . ':' . 'F' . $totalCell + 10)->applyFromArray($styleArrayFooter);

    }
}
