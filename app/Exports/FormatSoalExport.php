<?php

namespace App\Exports;

use App\Models\BankSoal;
use Maatwebsite\Excel\Concerns\FromCollection;

class FormatSoalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BankSoal::all();
    }
}
