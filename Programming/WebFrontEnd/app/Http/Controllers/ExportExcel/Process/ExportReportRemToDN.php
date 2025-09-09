<?php

namespace App\Http\Controllers\ExportExcel\Process;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ExportReportRemToDN implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    protected $totals = [];

    public function collection()
    {
        $data = Session::get("RemToDNReportSummaryDataExcel");
        $filteredData = [];
        $counter = 1;

        // init totals
        $this->totals = [
            'REM_Total_IDR' => 0,
            'REM_Total_Other_Currency' => 0,
            'REM_Total_Equivalent_IDR' => 0,
            'DN_Total_IDR' => 0,
            'DN_Total_Other_Currency' => 0,
            'DN_Total_Equivalent_IDR' => 0,
            'REM_ToPayment' => 0,
            'REM_ToDN' => 0,
            'DN_ToPayment' => 0, // selalu 0
        ];

        foreach ($data as $item) {
            $filteredData[] = [
                'No'                                => $counter++,
                'Number'                            => $item['REM_Number'] ?? null,
                'Date'                              => isset($item['REM_Date']) ? date('d-m-Y', strtotime($item['REM_Date'])) : null,
                'Budget'                            => '-',
                'Customer'                          => ($item['REM_CustomerCode'] ?? '') .'-'. ($item['REM_CustomerName'] ?? ''),
                'Total IDR'                         => $item['REM_Total_IDR'] ?? null,
                'Total Other Currency'              => $item['REM_Total_Other_Currency'] ?? null,
                'Total Equivalent IDR'              => $item['REM_Total_Equivalent_IDR'] ?? null,
                'Status'                            => $item['REM_Status'] ?? null,
                'Number2'                           => $item['DN_Number'] ?? null,
                'Date2'                             => isset($item['DN_Date']) ? date('d-m-Y', strtotime($item['DN_Date'])) : null,
                'Total IDR2'                        => $item['DN_Total_IDR'] ?? null,
                'Total Other Currency2'             => $item['DN_Total_Other_Currency'] ?? null,
                'Total Equivalent IDR2'             => $item['DN_Total_Equivalent_IDR'] ?? null,
                'Status2'                           => $item['DN_Status'] ?? null,
                'REM to Payment'                    => $item['balanceREM_ToPayment'] ?? null,
                'REM to DN'                         => $item['balanceREM_ToDN'] ?? null,
                'DN to Payment'                     => 0,
            ];

            // sum totals
            $this->totals['REM_Total_IDR'] += $item['REM_Total_IDR'] ?? 0;
            $this->totals['REM_Total_Other_Currency'] += $item['REM_Total_Other_Currency'] ?? 0;
            $this->totals['REM_Total_Equivalent_IDR'] += $item['REM_Total_Equivalent_IDR'] ?? 0;

            $this->totals['DN_Total_IDR'] += $item['DN_Total_IDR'] ?? 0;
            $this->totals['DN_Total_Other_Currency'] += $item['DN_Total_Other_Currency'] ?? 0;
            $this->totals['DN_Total_Equivalent_IDR'] += $item['DN_Total_Equivalent_IDR'] ?? 0;

            $this->totals['REM_ToPayment'] += $item['balanceREM_ToPayment'] ?? 0;
            $this->totals['REM_ToDN'] += $item['balanceREM_ToDN'] ?? 0;
            // DN_ToPayment tetap 0
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            ["No", "","", "", "REIMBURSEMENT", "", "", "", "","", "", "", "DEBIT NOTE", "","", "", "BALANCE", ""],
            ["", "Number", "Date", "Budget", "Customer",
             "Total IDR", "Total Other Currency", "Total Equivalent IDR", "Status",
             "Number2","Date2",
             "Total IDR2", "Total Other Currency2", "Total Equivalent IDR2", "Status2",
             "REM to Payment", "Rem to DN", "DN to Payment" ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $sheet->setCellValue('A1', date('F j, Y'))
                    ->mergeCells('A1:R1')
                    ->getStyle('A1:R1')
                    ->applyFromArray([
                        'font' => ['bold' => true],
                        'alignment' => ['horizontal' => Alignment::HORIZONTAL_RIGHT],
                ]);

                $sheet->setCellValue('A2', 'Report Reimbursement to Debit Note')
                    ->mergeCells('A2:R2')
                    ->getStyle('A2:R2')
                    ->applyFromArray([
                        'font' => ['bold' => true],
                        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);

                $sheet->setCellValue('A3', date('h:i A'))
                    ->mergeCells('A3:R3')
                    ->getStyle('A3:R3')
                    ->applyFromArray([
                        'font' => ['bold' => true],
                        'alignment' => ['horizontal' => Alignment::HORIZONTAL_RIGHT],
                ]);
            },

            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // cari baris terakhir data
                $lastRow = $sheet->getHighestRow();
                $row = $lastRow + 1;

                // Label Grand Total di kolom Customer (E)
                $sheet->setCellValue("E{$row}", "Grand Total");

                // REM totals (F, G, H)
                $sheet->setCellValue("F{$row}", $this->totals['REM_Total_IDR']);
                $sheet->setCellValue("G{$row}", $this->totals['REM_Total_Other_Currency']);
                $sheet->setCellValue("H{$row}", $this->totals['REM_Total_Equivalent_IDR']);

                // Status kosong (I)
                $sheet->setCellValue("I{$row}", "");

                // DN totals (L, M, N)
                $sheet->setCellValue("L{$row}", $this->totals['DN_Total_IDR']);
                $sheet->setCellValue("M{$row}", $this->totals['DN_Total_Other_Currency']);
                $sheet->setCellValue("N{$row}", $this->totals['DN_Total_Equivalent_IDR']);

                // Status2 kosong (O)
                $sheet->setCellValue("O{$row}", "");

                // Balance (P, Q, R)
                $sheet->setCellValue("P{$row}", $this->totals['REM_ToPayment']);
                $sheet->setCellValue("Q{$row}", $this->totals['REM_ToDN']);
                $sheet->setCellValue("R{$row}", $this->totals['DN_ToPayment']); // 0

                // styling
                $sheet->getStyle("E{$row}:R{$row}")->applyFromArray([
                    'font' => ['bold' => true],
                    'borders' => [
                        'top' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);
            }
        ];
    }
}
