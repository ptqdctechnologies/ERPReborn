<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Collection;

class BudgetImport implements ToCollection, WithCalculatedFormulas
{
    public function collection(Collection $rows)
    {
        $data = [];

        foreach ($rows as $key => $row) {
            if ($key === 0) continue;

            $data[] = [
                'sub_budget_code'   => $row[1],
                'sub_budget_name'   => $row[2],
                'work_code'         => $row[3],
                'work_name'         => $row[4],
                'product_code'      => $row[5],
                'product_name'      => $row[6],
                'currency_code'     => $row[7],
                'currency_name'     => $row[8],
                'qty'               => $row[9],
                'price'             => $row[10],
                'total'             => $row[11]
            ];
        }

        return $data;
    }
}
