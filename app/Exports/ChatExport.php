<?php

namespace App\Exports;

use App\Models\Chatlog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ChatExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Chatlog::select('id', 'question', 'session_id', 'intent', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['ID', 'MESSAGE RECEIVED', 'SESSION ID', 'INTENT RESPONSE', 'CREATED DATE'];
    }
}
