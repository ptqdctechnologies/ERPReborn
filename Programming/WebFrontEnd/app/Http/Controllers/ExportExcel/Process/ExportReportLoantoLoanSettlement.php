<?php

namespace App\Http\Controllers\ExportExcel\Process;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ExportReportLoantoLoanSettlement implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $data = Session::get("LoanSettlementReportSummaryDataExcel");
        $filteredData = [];
        $counter = 1;

        $grand_totalIDRSettle = 0;
        $grand_totalOtherSettle = 0;
        $grand_totalEquiSettle = 0;

        $grand_totalloantoPay = 0;
        $grand_totalLoantoSettle = 0;
        $grand_totalSettletoPay = 0;

        foreach ($data as $item) {
            $grand_totalIDRSettle += (float) ($item['loanSettle_Total_IDR'] ?? 0);
            $grand_totalOtherSettle += (float) ($item['loanSettle_Total_Other_Currency'] ?? 0);
            $grand_totalEquiSettle += (float) ($item['loanSettle_Total_Equivalent_IDR'] ?? 0);
            
            $grand_totalloantoPay += (float) ($item['loanToPaymnet'] ?? 0);
            $grand_totalLoantoSettle += (float) ($item['loanToSettlement'] ?? 0);
            $grand_totalSettletoPay += (float) ($item['settlementToPayment'] ?? 0);

            $filteredData[] = [
                'No'                                => $counter++,
                'Loan Number'                       => $item['loanNumber'] ?? null,
                'Loan Date'                         => date('Y-m-d', strtotime($item['loanDate'])) ?? null,
                'Loan Creditor'                     => $item['loanCreditorName'] ?? null,
                'Loan Debitor'                      => $item['loanDebitorName'] ?? null,
                'Loan Total IDR'                    => null,
                'Loan Total Other Currency'         => null,
                'Loan Total Equivalent IDR'         => null,

                'Loan Settle Number'                => $item['loanSettleNumber'] ?? null,
                'Loan Settle Date'                  => date('Y-m-d', strtotime($item['loanSettleDate'])) ?? null,
                'Loan Settle Total IDR'             => $item['loanSettle_Total_IDR'] ?? null,
                'Loan Settle Total Other Currency'  => $item['loanSettle_Total_Other_Currency'] ?? null,
                'Loan Settle Total Equivalent IDR'  => $item['loanSettle_Total_Equivalent_IDR'] ?? null,

                'Loan to Payment'                   => $item['loanToPaymnet'] ?? null,
                'Loan to Settlement'                => $item['loanToSettlement'] ?? null,
                'Settlement to Payment'             => $item['settlementToPayment'] ?? null,


            ];
        }

        $filteredData[] = [
            'No'                                => '',
            'Loan Number'                       => 'Grand Total',
            'Loan Date'                         => '',
            'Loan Creditor'                     => '',
            'Loan Debitor'                      => '',
            'Loan Total IDR'                    => '',
            'Loan Total Other Currency'         => '',
            'Loan Total Equivalent IDR'         => '',

            'Loan Settle Number'                => '',
            'Loan Settle Date'                  => '',
            'Loan Settle Total IDR'             => $grand_totalIDRSettle,
            'Loan Settle Total Other Currency'  => $grand_totalOtherSettle,
            'Loan Settle Total Equivalent IDR'  => $grand_totalEquiSettle,

            'Loan to Payment'                   => $grand_totalloantoPay,
            'Loan to Settlement'                => $grand_totalLoantoSettle,
            'Settlement to Payment'             => $grand_totalSettletoPay,
        ];

        return collect($filteredData);
    }

    public function headings(): array
    {
        return [
            ["", "", "", "", "", "", "", "", ""],
            ["No", "Loan Number", "Loan Date", "Loan Creditor", "Loan Debitor", "Loan Total IDR", "Loan Total Other Currency", "Loan Total Equivalent IDR",
            "Loan Settle Number", "Loan Settle Date", "Loan Settle Total IDR", "Loan Settle Total Other Currency", "Loan Settle Total Equivalent IDR",
            "Loan to Payment", "Loan to Settlement", "Settlement to Payment"
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $sheet->setCellValue('A1', date('F j, Y'))
                    ->mergeCells('A1:P1')
                    ->getStyle('A1:P1')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => '000000'],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_RIGHT,
                        ],
                ]);

                $sheet->setCellValue('A2', 'Loan to Loan Settlement Report')
                    ->mergeCells('A2:P2')
                    ->getStyle('A2:P2')
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
                    ->mergeCells('A3:P3')
                    ->getStyle('A3:P3')
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
