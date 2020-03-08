<?php

namespace App\Exports;

use App\Topic;
use Maatwebsite\Excel\Concerns\FromCollection;

class TopicsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Topic::all();
    }
}
