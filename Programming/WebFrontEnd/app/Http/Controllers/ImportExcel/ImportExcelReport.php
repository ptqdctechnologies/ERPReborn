<?php

namespace App\Http\Controllers\ImportExcel;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportExcelReport implements ToModel
{
    public function model(array $row)
    {
        return new User([
            'name'     => $row[0],
            'email'    => $row[1],
        ]);
    }
}
