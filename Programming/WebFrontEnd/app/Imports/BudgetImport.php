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
                'sub_budget'    => $row[0],
                'work_id'       => $row[1],
                'product'       => $row[2],
                'currency'      => $row[3],
                'qty'           => $row[4],
                'price'         => $row[5],
                'total'         => $row[6],
            ];
        }

        return $data;
    }
}
