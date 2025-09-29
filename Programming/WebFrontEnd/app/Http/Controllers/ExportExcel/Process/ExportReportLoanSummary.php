<?php

namespace App\Http\Controllers\ExportExcel\Process;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ExportReportLoanSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $data = Session::get("LoanReportSummaryDataExcel");
        $filteredData = [];
        $counter = 1;

        $totalPrinciple = 0;

        foreach ($data as $item) {
            $totalPrinciple += (float) ($item['principleLoan'] ?? 0);

            $filteredData[] = [
                'No'                                => $counter++,
                'Loan Number'                       => $item['loanNumber'] ?? null,
                'Date'                              => date('Y-m-d', strtotime($item['date'])) ?? null,
                'Type'                              => $item['type'] ?? null,
                'Creditor'                          => $item['creditorName'] ?? null,
                'Debitor'                           => $item['debitorName'] ?? null,
                'Principle Loan'                    => $item['principleLoan'] ?? null,
                'Rate'                              => $item['rate'] ?? null,
                'Remarks'                           => $item['notes'] ?? null,
            ];
        }

        $filteredData[] = [
            'No'                                => '',
            'Loan Number'                       => '',
            'Date'                              => '',
            'Type'                              => '',
            'Creditor'                          => 'GRAND TOTAL',
            'Debitor'                           => '',
            'Principle Loan'                    => $totalPrinciple,
            'Rate'                              => '',
            'Remarks'                           => '',
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            ["", "", "", "", "", "", "", "", ""],
            ["No", "Loan Number", "Date", "Type", "Creditor", "Debitor", "Principle Loan", "Rate", "Remarks"],
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

                $sheet->setCellValue('A2', 'Loan Summary Report')
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
