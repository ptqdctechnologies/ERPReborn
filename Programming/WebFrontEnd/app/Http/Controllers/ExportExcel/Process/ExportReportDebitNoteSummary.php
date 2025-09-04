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

class ExportReportDebitNoteSummary implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    protected $totals = [];

    public function collection()
    {
        $data = Session::get("DebitNoteReportSummaryDataExcel");
        $filteredData = [];
        $counter = 1;

        // init totals
        $this->totals = [
            'DN_Total_IDR' => 0,
            'DN_Tax_IDR' => 0,
            'DN_Total_Other_Currency' => 0,
            'DN_Tax_OtherCurrency' => 0,
            'DN_Total_Equivalent_IDR' => 0,
            'DN_Tax_Equivalent' => 0,
        ];

        foreach ($data as $item) {
            $filteredData[] = [
                'No'                                => $counter++,
                'DN Number'                         => $item['DN_Number'] ?? null,
                'Budget'                            => ($item['combinedBudgetCode'] ?? '') .'-'. ($item['combinedBudgetName'] ?? ''),
                'Sub Budget'                        => ($item['combinedBudgetSectionCode'] ?? '') .'-'. ($item['combinedBudgetSectionName'] ?? ''),
                'Date'                              => isset($item['date']) ? date('d-m-Y', strtotime($item['date'])) : null,
                'Supplier'                          => ($item['customerCode'] ?? '') .'-'. ($item['customerName'] ?? ''),
                'DN IDR Total'                      => $item['DN_Total_IDR'] ?? 0,
                'DN IDR VAT'                        => $item['DN_Tax_IDR'] ?? 0,
                'DN Other Currency Total'           => $item['DN_Total_Other_Currency'] ?? 0,
                'DN Other Currency VAT'             => $item['DN_Tax_OtherCurrency'] ?? 0,
                'DN Equivalent IDR Total'           => $item['DN_Total_Equivalent_IDR'] ?? 0,
                'DN Equivalent IDR VAT'             => $item['DN_Tax_Equivalent'] ?? 0,
            ];

            // sum totals
            $this->totals['DN_Total_IDR'] += $item['DN_Total_IDR'] ?? 0;
            $this->totals['DN_Tax_IDR'] += $item['DN_Tax_IDR'] ?? 0;
            $this->totals['DN_Total_Other_Currency'] += $item['DN_Total_Other_Currency'] ?? 0;
            $this->totals['DN_Tax_OtherCurrency'] += $item['DN_Tax_OtherCurrency'] ?? 0;
            $this->totals['DN_Total_Equivalent_IDR'] += $item['DN_Total_Equivalent_IDR'] ?? 0;
            $this->totals['DN_Tax_Equivalent'] += $item['DN_Tax_Equivalent'] ?? 0;
        }

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            ["No", "DN Number","Budget", "Sub Budget", "Date", "Supplier/Customer", "DN IDR", " ", "DN Other Currency", " ","DN Equivalent IDR", " "],
            ["", "", "", "", "","", "Total", "VAT", "Total", "VAT","Total", "VAT"],
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $sheet->setCellValue('A1', date('F j, Y'))
                    ->mergeCells('A1:L1')
                    ->getStyle('A1:L1')
                    ->applyFromArray([
                        'font' => ['bold' => true],
                        'alignment' => ['horizontal' => Alignment::HORIZONTAL_RIGHT],
                ]);

                $sheet->setCellValue('A2', 'Report Debit Note Summary')
                    ->mergeCells('A2:L2')
                    ->getStyle('A2:L2')
                    ->applyFromArray([
                        'font' => ['bold' => true],
                        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);

                $sheet->setCellValue('A3', date('h:i A'))
                    ->mergeCells('A3:L3')
                    ->getStyle('A3:L3')
                    ->applyFromArray([
                        'font' => ['bold' => true],
                        'alignment' => ['horizontal' => Alignment::HORIZONTAL_RIGHT],
                ]);
            },

            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // cari baris terakhir data
                $lastRow = $sheet->getHighestRow();

                // tulis Grand Total
                $sheet->setCellValue("F".($lastRow+1), "Grand Total");
                $sheet->setCellValue("G".($lastRow+1), $this->totals['DN_Total_IDR']);
                $sheet->setCellValue("H".($lastRow+1), $this->totals['DN_Tax_IDR']);
                $sheet->setCellValue("I".($lastRow+1), $this->totals['DN_Total_Other_Currency']);
                $sheet->setCellValue("J".($lastRow+1), $this->totals['DN_Tax_OtherCurrency']);
                $sheet->setCellValue("K".($lastRow+1), $this->totals['DN_Total_Equivalent_IDR']);
                $sheet->setCellValue("L".($lastRow+1), $this->totals['DN_Tax_Equivalent']);

                // styling
                $sheet->getStyle("F".($lastRow+1).":L".($lastRow+1))->applyFromArray([
                    'font' => ['bold' => true],
                    'borders' => [
                        'top' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);
            }
        ];
    }
}
