<?php

namespace App\Http\Controllers\ExportExcel\Process;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ExportReportLoanSettlementSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $data = Session::get("LoanSettlementReportSummaryDataExcel");
        $filteredData = [];
        $counter = 1;

        $totalIDR = 0;
        $totalOther = 0;
        $totalEqui = 0;

        foreach ($data as $item) {
            $totalIDR += (float) ($item['total_IDR'] ?? 0);
            $totalOther += (float) ($item['total_Other_Currency'] ?? 0);
            $totalEqui += (float) ($item['total_Equivalent_IDR'] ?? 0);

            $filteredData[] = [
                'No'                                => $counter++,
                'Loan Settlement Number'            => $item['loanNumber'] ?? null,
                'Loan Number'                       => $item['loanNumber'] ?? null,
                'Creditor'                          => $item['creditorName'] ?? null,
                'Debitor'                           => $item['debitorName'] ?? null,
                'Total IDR'                         => $item['total_IDR'] ?? null,
                'Total Other Currency'              => $item['total_Other_Currency'] ?? null,
                'Total Equivalent IDR'              => $item['total_Equivalent_IDR'] ?? null,
                'Remarks'                           => $item['notes'] ?? null,
            ];
        }

        $filteredData[] = [
            'No'                                => '',
            'Loan Settlemnt Number'             => '',
            'Loan Number'                       => '',
            'Creditor'                          => 'GRAND TOTAL',
            'Debitor'                           => '',
            'Total IDR'                         => $totalIDR,
            'Total Other Currency'              => $totalOther,
            'Total Equivalent IDR'              => $totalOther,
            'Remarks'                           => '',
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            ["", "", "", "", "", "", "", "", ""],
            ["No", "Loan Settlement Number", "Loan Number", "Creditor", "Debitor", "Total IDR", "Total Other Currency", "Total Equivalent IDR", "Remarks"],
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $sheet->setCellValue('A1', date('F j, Y'))
                    ->mergeCells('A1:I1')
                    ->getStyle('A1:I1')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                ]);

                $sheet->setCellValue('A2', 'Loan Settlement Summary Report')
                    ->mergeCells('A2:I2')
                    ->getStyle('A2:I2')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_CENTER,
                        ],
                ]);

                $sheet->setCellValue('A3', date('h:i A'))
                    ->mergeCells('A3:I3')
                    ->getStyle('A3:I3')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                ]);
            },
        ];
    }
}
