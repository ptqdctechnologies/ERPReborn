<?php

namespace App\Http\Controllers\ExportExcel\MasterData;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportSupplier implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $dataReport;

    public function __construct($dataReport)
    {
        $this->dataReport = $dataReport;
    }

    public function collection()
    {
        $data = $this->dataReport;

        $filteredData = [];
        $counter = 1;
        foreach ($data as $item) {
            $filteredData[] = [
                'No' => $counter++,
                'Code' => $item['code'] ?? '-',
                'Name' => $item['name'] ?? '-',
                'Tax ID' => $item['tax_ID'] ?? '-',
                'Phone' => $item['phoneNumber'] ?? '-',
                'Email' => $item['email'] ?? '-',
                'Country' => $item['country'] ?? '-',
                'Province' => $item['province'] ?? '-',
                'City' => $item['city'] ?? '-',
                'Legal Entity' => $item['institutionTypeName'] ?? '-',
                'Contact Person' => $item['contactPerson'] ?? '-',
                'Bank Name' => $item['bankAcronym'] ?? '-',
                'Account Number' => $item['accountNumber'] ?? '-',
                'Account Name' => $item['accountName'] ?? '-',
                'Address' => $item['address'] ?? '-',
                'Category' => '-'
            ];
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            [date('F j, Y')],
            ["SUPPLIER"],
            [date('h:i A')],
            ["Supplier Code", ": -", "Supplier Category", ": -", "Province", ": -"],
            ["Supplier Name", ": -", "Country", ": -", "City", ": -"],
            [""],
            ["No", "Code", "Name", "Tax ID", "Phone", "Email", "Country", "Province", "City", "Legal Entity", "Contact Person", "Bank Name", "Account Number", "Account Name", "Address", "Category"]
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
        $sheet->getStyle('A1:P1')->applyFromArray($styleArrayHeader0);
        $sheet->mergeCells('A1:P1');

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
        $sheet->getStyle('A2:P2')->applyFromArray($styleArrayHeader1);
        $sheet->mergeCells('A2:P2');

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
        $sheet->getStyle('A3:P3')->applyFromArray($styleArrayHeader2);
        $sheet->mergeCells('A3:P3');

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
        $sheet->getStyle('A4:P4')->applyFromArray($styleArrayHeader3);
        $sheet->getStyle('A5:P5')->applyFromArray($styleArrayHeader3);

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
        $sheet->getStyle('A7:P7')->applyFromArray($styleArrayHeader4);

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
        $datas = $this->dataReport;
        $totalCell = count($datas);
        $lastCell = 'A7:P' . $totalCell + 7;
        $sheet->getStyle($lastCell)->applyFromArray($styleArrayContent);
    }
}