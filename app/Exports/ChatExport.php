<?php

namespace App\Exports;

use App\Models\Chatlog;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChatExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Chatlog::all();
    }
}
