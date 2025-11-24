<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class CustomerOrderImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $data = [];

        foreach ($rows as $key => $row) {
            if ($key === 0) continue;

            $data[] = [
                'sub_budget' => $row[0],
                'value'      => $row[1],
                'notes'      => $row[2],
            ];
        }

        return $data;
    }
}
