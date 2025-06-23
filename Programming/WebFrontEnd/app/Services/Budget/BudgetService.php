<?php

namespace App\Services\Budget;

use Illuminate\Http\Request;

class BudgetService
{
    public function reportModifyBudgetSummaryData(Request $request): array
    {
        $budgetID       = $request->budget_id;
        $budgetCode     = $request->budget;
        $budgetName     = $request->budget_name;
        $subBudgetID    = $request->sub_budget_id;
        $subBudget      = $request->sub_budget;
        $subBudgetName  = $request->sub_budget_name;
        $startDate      = $request->startDate;
        $finishDate     = $request->finishDate;

        $dataDummy = collect([
            [
                'documentNumber'                => 'MB/QDC/2025/0000001',
                'combinedBudget_RefID'          => '46000000000033',
                'combinedBudgetCode'            => 'Q000062',
                'combinedBudgetName'            => 'XL Microcell 2007',
                'combniedBudgetSection_RefID'   => '143000000000307',
                'combniedBudgetSectionCode'     => '240',
                'combniedBudgetSectionName'     => 'Cendana Andalas',
                'pic'                           => 'Abdul Rahman Sitompul',
                'date'                          => '2025-06-23 00:00:00 +07',
                'total'                         => 31232.39,
                'status'                        => 'approved'
            ],
            [
                'documentNumber'                => 'MB/QDC/2025/0000002',
                'combinedBudget_RefID'          => '46000000000033',
                'combinedBudgetCode'            => 'Q000062',
                'combinedBudgetName'            => 'XL Microcell 2007',
                'combniedBudgetSection_RefID'   => '143000000000307',
                'combniedBudgetSectionCode'     => '240',
                'combniedBudgetSectionName'     => 'Cendana Andalas',
                'pic'                           => 'Dewi Kartika',
                'date'                          => '2025-06-26 00:00:00 +07',
                'total'                         => -28750.00,
                'status'                        => 'reject'
            ],
            [
                'documentNumber'                => 'MB/QDC/2025/0000003',
                'combinedBudget_RefID'          => '46000000000033',
                'combinedBudgetCode'            => 'Q000062',
                'combinedBudgetName'            => 'XL Microcell 2007',
                'combniedBudgetSection_RefID'   => '143000000000307',
                'combniedBudgetSectionCode'     => '240',
                'combniedBudgetSectionName'     => 'Cendana Andalas',
                'pic'                           => 'Rizky Hidayat',
                'date'                          => '2025-06-29 00:00:00 +07',
                'total'                         => 35400.75,
                'status'                        => 'approved'
            ],
            [
                'documentNumber'                => 'MB/QDC/2025/0000004',
                'combinedBudget_RefID'          => '46000000000033',
                'combinedBudgetCode'            => 'Q000062',
                'combinedBudgetName'            => 'XL Microcell 2007',
                'combniedBudgetSection_RefID'   => '143000000000307',
                'combniedBudgetSectionCode'     => '240',
                'combniedBudgetSectionName'     => 'Cendana Andalas',
                'pic'                           => 'Siti Marlina',
                'date'                          => '2025-07-02 00:00:00 +07',
                'total'                         => -29999.99,
                'status'                        => 'reject'
            ],
            [
                'documentNumber'                => 'MB/QDC/2025/0000005',
                'combinedBudget_RefID'          => '46000000000033',
                'combinedBudgetCode'            => 'Q000062',
                'combinedBudgetName'            => 'XL Microcell 2007',
                'combniedBudgetSection_RefID'   => '143000000000307',
                'combniedBudgetSectionCode'     => '240',
                'combniedBudgetSectionName'     => 'Cendana Andalas',
                'pic'                           => 'Andi Saputra',
                'date'                          => '2025-07-09 00:00:00 +07',
                'total'                         => 32100.00,
                'status'                        => 'approved'
            ]
        ]);

        $filtered = $dataDummy->filter(function($item) use ($budgetID, $subBudgetID, $startDate, $finishDate) {
            // Filter berdasarkan budgetID dan subBudgetID
            $isBudgetIDMatch = ($item['combinedBudget_RefID'] == $budgetID);
            $isSubBudgetIDMatch = ($item['combniedBudgetSection_RefID'] == $subBudgetID);

            // Filter berdasarkan startDate dan finishDate (opsional)
            $isStartDateMatch = !$startDate || (strtotime($item['date']) >= strtotime($startDate));
            $isFinishDateMatch = !$finishDate || (strtotime($item['date']) <= strtotime($finishDate));

            return $isBudgetIDMatch && $isSubBudgetIDMatch && $isStartDateMatch && $isFinishDateMatch;
        });

        $compact = [
            'dataHeader'            => [
                'budget'            => $budgetCode,
                'budget_id'         => $budgetID,
                'budget_name'       => $budgetName,
                'sub_budget_id'     => $subBudgetID,
                'sub_budget'        => $subBudget,
                'sub_budget_name'   => $subBudgetName,
                'startDate'         => $startDate,
                'finishDate'        => $finishDate
            ],
            'dataDetail'            => $filtered->toArray(),
            'total'                 => $filtered->sum('total'),
        ];

        return $compact;
    }
}