<?php

namespace App\Http\Controllers\ExportExcel\Purchase;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportPurchaseOrderSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataPurchaseOrderSummary;

    public function __construct($dataPurchaseOrderSummary)
    {
        $this->dataPurchaseOrderSummary = $dataPurchaseOrderSummary;
    }

    public function collection()
    {
        $data = $this->dataPurchaseOrderSummary;

        $totalPOValue               = 0;
        $totalPOVAT                 = 0;
        $totalPOOtherCurrencyValue  = 0;
        $totalPOOtherCurrencyVAT    = 0;
        $totalPOEquivalentIDRValue  = 0;
        $totalPOEquivalentIDRVAT    = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $totalPOValue               += is_numeric($item['total_Idr_WithoutVat']) ? $item['total_Idr_WithoutVat'] : 0;
            $totalPOVAT                 += is_numeric($item['total_Vat_IDR']) ? $item['total_Vat_IDR'] : 0;
            $totalPOOtherCurrencyValue  += is_numeric($item['total_Other_Currency_WithoutVat']) ? $item['total_Other_Currency_WithoutVat'] : 0;
            $totalPOOtherCurrencyVAT    += is_numeric($item['total_Vat_Other_Currency']) ? $item['total_Vat_Other_Currency'] : 0;
            $totalPOEquivalentIDRValue  += is_numeric($item['total_Equivalent_Value']) ? $item['total_Equivalent_Value'] : 0;
            $totalPOEquivalentIDRVAT    += is_numeric($item['total_Equivalent_Vat']) ? $item['total_Equivalent_Vat'] : 0;
            
            $filteredData[] = [
                'No'                        => $counter++,
                'PO Number'                 => $item['documentNumber'] ?? '-',
                'Supplier'                  => ($item['supplier_Code'] ?? '') . ' - ' . ($item['supplier_Name'] ?? ''),
                'totalPOValue'              => $item['total_Idr_WithoutVat'] != 0 ? $item['total_Idr_WithoutVat'] : '0',
                'totalPOVAT'                => $item['total_Vat_IDR'] != 0 ? $item['total_Vat_IDR'] : '0',
                'totalPOOtherCurrencyValue' => $item['total_Other_Currency_WithoutVat'] != 0 ? $item['total_Other_Currency_WithoutVat'] : '0',
                'totalPOOtherCurrencyVAT'   => $item['total_Vat_Other_Currency'] != 0 ? $item['total_Vat_Other_Currency'] : '0',
                'totalPOEquivalentIDRValue' => $item['total_Equivalent_Value'] != 0 ? $item['total_Equivalent_Value'] : '0',
                'totalPOEquivalentIDRVAT'   => $item['total_Equivalent_Vat'] != 0 ? $item['total_Equivalent_Vat'] : '0'
            ];
        }

        $filteredData[] = [
            'No'                        => 'GRAND TOTAL',
            'PO Number'                 => '',
            'Supplier'                  => '',
            'totalPOValue'              => $totalPOValue != 0 ? $totalPOValue : '0',
            'totalPOVAT'                => $totalPOVAT != 0 ? $totalPOVAT : '0',
            'totalPOOtherCurrencyValue' => $totalPOOtherCurrencyValue != 0 ? $totalPOOtherCurrencyValue : '0',
            'totalPOOtherCurrencyVAT'   => $totalPOOtherCurrencyVAT != 0 ? $totalPOOtherCurrencyVAT : '0',
            'totalPOEquivalentIDRValue' => $totalPOEquivalentIDRValue != 0 ? $totalPOEquivalentIDRValue : '0',
            'totalPOEquivalentIDRVAT'   => $totalPOEquivalentIDRVAT != 0 ? $totalPOEquivalentIDRVAT : '0',
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = $this->dataPurchaseOrderSummary;

        return [
            [date('F j, Y')],
            ["PURCHASE ORDER SUMMARY", " ", " ", " ", " ", " ", " ", " ", " "],
            [date('h:i A')],
            ["Budget", ": -", "Supplier", ": -", "", "", "", "", ""],
            ["Sub Budget", ": -", "Date", ": -", "", "", "", "", ""],
            ["", "", "", "", "", "", "", "", ""],
            ["No", "PO Number", "Supplier", "PO", "", "PO Other Currency", "", "PO Equivalent IDR"],
            ["", "", "", "Value", "VAT", "Value", "VAT", "Value", "VAT"]
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
        $sheet->mergeCells('A7:A8');
        $sheet->mergeCells('B7:B8');
        $sheet->mergeCells('C7:C8');
        $sheet->mergeCells('D7:E7');
        $sheet->mergeCells('F7:G7');
        $sheet->mergeCells('H7:I7');
        $sheet->getStyle('A8:I8')->applyFromArray($styleArrayHeader4);

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
        $datas      = $this->dataPurchaseOrderSummary;
        $totalCell  = count($datas);
        $lastCell   = 'A9:I' . $totalCell + 9;
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
        $sheet->getStyle('A' . $totalCell + 9 . ':' . 'I' . $totalCell + 9)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 9 . ':C' . $totalCell + 9);
    }
}
