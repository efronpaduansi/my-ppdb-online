<?php

namespace App\Imports;

use App\Models\BankSoal;
use Maatwebsite\Excel\Concerns\ToModel;

class BankSoalImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BankSoal([
            'number' => $row[1],
            'question' => $row[2],
            'option_a' => $row[3],
            'option_b' => $row[4],
            'option_c' => $row[5],
            'option_d' => $row[6],
            'answer' => $row[7],
        ]);
    }
}
