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

class ExportReportMaterialReceiveSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $materialReceiveSummary, $budgetName, $receivedName, $deliveryFromName, $deliveryToName, $mrDate;

    public function __construct($materialReceiveSummary, $budgetName, $receivedName, $deliveryFromName, $deliveryToName, $mrDate)
    {
        $this->materialReceiveSummary   = $materialReceiveSummary;
        $this->budgetName               = $budgetName == null ? '-' : $budgetName;
        $this->receivedName             = $receivedName == null ? '-' : $receivedName;
        $this->deliveryFromName         = $deliveryFromName == null ? '-' : $deliveryFromName;
        $this->deliveryToName           = $deliveryToName == null ? '-' : $deliveryToName;
        $this->mrDate                   = $mrDate == null ? '-' : $mrDate;
    }

    public function collection()
    {
        $data = $this->materialReceiveSummary;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $filteredData[] = [
                'No'                                =>  $counter++,
                'MR Number'                         =>  $item['MR_Number'] ?? null,
                'Date'                              =>  date('Y-m-d', strtotime($item['date'])) ?? null,
                'Budget'                            =>  $item['combinedBudgetName'] ?? '-',
                'Reference Number'                  =>  $item['referenceNumber'] ?? null,
                'Delivery From'                     =>  $item['deliveryFrom_NonRefID']['address']?? '-',
                'Delivery To'                       =>  $item['deliveryTo_NonRefID']['address'] ?? '-',
                'Receive At'                        =>  $item['receiveAt'] ?? '-',
                'Remarks'                           =>  $item['remarks'] ?? '-',
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        $data = $this->materialReceiveSummary;

        return [
            [date('F j, Y')],
            ['Report Material Receive Summary'],
            [date('h:i A')],
            ["Budget", ": " . $this->budgetName, "Delivery From", ": " . $this->deliveryFromName, "Date", ": " . $this->mrDate],
            ["Received At", ": " . $this->receivedName, "Delivery To", ": " . $this->deliveryToName],
            [""],
            ["No", "MR Number","Date", "Budget","Reference Number", "Delivery From", "Delivery To", "Receive At", "Remarks"]
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

        $data       = $this->materialReceiveSummary;
        $totalCell  = count($data);
        $lastCell   = 'A7:I' . $totalCell + 7;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);
    }
}
