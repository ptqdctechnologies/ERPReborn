<?php

namespace App\Http\Controllers\ExportExcel\Inventory;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportReportDeliveryOrderSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataDeliveryOrderSummary, $budgetName, $subBudgetName, $warehouseName, $doDate;
    
    public function __construct($dataDeliveryOrderSummary, $budgetName, $subBudgetName, $warehouseName, $doDate)
    {
        $this->dataDeliveryOrderSummary = $dataDeliveryOrderSummary;
        $this->budgetName               = $budgetName == null ? '-' : $budgetName;
        $this->subBudgetName            = $subBudgetName == null ? '-' : $subBudgetName;
        $this->warehouseName            = $warehouseName == null ? '-' : $warehouseName;
        $this->doDate                   = $doDate == null ? '-' : $doDate;
    }

    public function collection()
    {
        $data = $this->dataDeliveryOrderSummary;

        $totalQuantity = 0;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $totalQuantity += is_numeric($item['quantity']) ? $item['quantity'] : 0;

            $dateOrigin   = new \DateTime($item['date']);
            $displayDate  = $dateOrigin->format('Y-m-d');

            $filteredData[] = [
                'No'            => $counter++,
                'DO Number'     => $item['documentNumber'] ?? null,
                'Date'          => date('Y-m-d', strtotime($item['date'])) ?? null,
                'Type'          => $item['type'] ?? null,
                'Quantity'      => $item['quantity'] != 0 ? $item['quantity'] : '0',
                'Delivery From' => $item['deliveryFrom_NonRefID']['address'] ?? '-',
                'Delivery To'   => $item['deliveryTo_NonRefID']['address'] ?? '-',
                'Transporter'   => ($item['transporter_Code'] ?? '') . ($item['transporter_Code'] && $item['transporter_Name'] ? ' - ' : '') . ($item['transporter_Name'] ?? '')
            ];
        }

        $filteredData[] = [
            'No'            => 'GRAND TOTAL',
            'DO Number'     => '',
            'Date'          => '',
            'Type'          => '',
            'Quantity'      => $totalQuantity != 0 ? $totalQuantity : '0',
            'Delivery From' => '',
            'Delivery To'   => '',
            'Transporter'   => ''
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = $this->dataDeliveryOrderSummary;

        return [
            [date('F j, Y')],
            ['Delivery Order Summary'],
            [date('h:i A')],
            ["Budget", ": " . $this->budgetName, "Warehouse", ": " . $this->warehouseName],
            ["Sub Budget", ": " . $this->subBudgetName, "Date", ": " . $this->doDate],
            [""],
            ["No", "DO Number", "Date", "Type", "Quantity", "Delivery From", "Delivery To", "Transporter"],
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

        $sheet->getStyle('A1:H1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:H1');

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

        $sheet->getStyle('A2:H2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:H2');

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

        $sheet->getStyle('A3:H3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:H3');

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

        $sheet->getStyle('A4:H4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:H5')->applyFromArray($styleArrayHeader3);

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

        $sheet->getStyle('A7:H7')->applyFromArray($styleArrayHeader4);

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

        $data = $this->dataDeliveryOrderSummary;
        $totalCell = count($data);
        $lastCell   = 'A7:H' . $totalCell + 7;
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
        $sheet->getStyle('A' . $totalCell + 8 . ':' . 'H' . $totalCell + 8)->applyFromArray($styleArrayFooter);
        $sheet->mergeCells('A' . $totalCell + 8 . ':D' . $totalCell + 8);
    }
}
