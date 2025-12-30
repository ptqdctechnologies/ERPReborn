<?php

namespace App\Http\Controllers\ExportExcel\PurchaseRequisition;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportPurchaseRequisitionSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataPurchaseRequestSummary;

    public function __construct($dataPurchaseRequestSummary)
    {
        $this->dataPurchaseRequestSummary = $dataPurchaseRequestSummary;
    }

    public function collection()
    {
        $data = $this->dataPurchaseRequestSummary;

        $totalIDR           = 0;
        $totalOtherCurrency = 0;
        $totalEquivalentIDR = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $totalIDR           += is_numeric($item['total_IDR']) ? $item['total_IDR'] : 0;
            $totalOtherCurrency += is_numeric($item['total_Other_Currency']) ? $item['total_Other_Currency'] : 0;
            $totalEquivalentIDR += is_numeric($item['total_Equivalent_IDR']) ? $item['total_Equivalent_IDR'] : 0;

            $dateOrigin     = new \DateTime($item['date']);
            $resultOrigin   = $dateOrigin->format('Y-m-d');
            $dateDelivery   = new \DateTime($item['dateOfDelivery']);
            $resultDelivery = $dateDelivery->format('Y-m-d');

            $filteredData[] = [
                'No'                    => $counter++,
                'PR Number'             => $item['documentNumber'] ?? '-',
                'Date'                  => $resultOrigin,
                'Budget'                => ($item['combinedBudgetCode'] ?? '') . ' - ' . ($item['combinedBudgetName'] ?? ''),
                'Date Of Delivery'      => $resultDelivery,
                'Delivery To'           => $item['deliveryTo_NonRefID']['address'] ?? '-',
                'Total IDR'             => $item['total_IDR'] != 0 ? $item['total_IDR'] : '0',
                'Total Other Currency'  => $item['total_Other_Currency'] != 0 ? $item['total_Other_Currency'] : '0',
                'Total Equivalent IDR'  => $item['total_Equivalent_IDR'] != 0 ? $item['total_Equivalent_IDR'] : '0',
            ];
        }

        $filteredData[] = [
            'No'                    => 'GRAND TOTAL',
            'PR Number'             => '',
            'Date'                  => '',
            'Budget'                => '',
            'Date Of Delivery'      => '',
            'Delivery To'           => '',
            'Total IDR'             => $totalIDR != 0 ? $totalIDR : '0',
            'Total Other Currency'  => $totalOtherCurrency != 0 ? $totalOtherCurrency : '0',
            'Total Equivalent IDR'  => $totalEquivalentIDR != 0 ? $totalEquivalentIDR : '0'
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = $this->dataPurchaseRequestSummary;

        return [
            [date('F j, Y')],
            ["PURCHASE REQUEST SUMMARY", " ", " ", " ", " ", " ", " "],
            [date('h:i A')],
            ["Budget", ": " . $data[0]['combinedBudgetCode'] . ' - ' . $data[0]['combinedBudgetName'], "", "Date", ": -", "", "", "", ""],
            ["Sub Budget", ": -", "", "", "", "", "", "", "", "", ""],
            ["", "", "", "", "", "", "", "", "", "", ""],
            ["No", "PR Number","Date", "Budget", "Date Of Delivery", "Delivery To", "Total IDR", "Total Other Currency", "Total Equivalent IDR"],
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

        $sheet->getStyle('A3:I3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:I3');

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

        $sheet->getStyle('A4:I4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:I5')->applyFromArray($styleArrayHeader3);

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

        $sheet->getStyle('A7:I7')->applyFromArray($styleArrayHeader4);

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

        $datas      = $this->dataPurchaseRequestSummary;
        $totalCell  = count($datas);
        $lastCell   = 'A7:I' . $totalCell + 7;
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
        $sheet->getStyle('A' . $totalCell + 8 . ':' . 'I' . $totalCell + 8)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 8 . ':F' . $totalCell + 8);
    }
}
