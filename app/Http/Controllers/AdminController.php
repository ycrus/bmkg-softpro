<?php

namespace App\Http\Controllers;

use App\Models\Asuransi;
use App\Models\Magang;
use App\Models\SewaAlat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $sewa_alat = SewaAlat::all();
        $magang = Magang::all();
        $asuransi = Asuransi::all();
        $permohonan = collect([...$sewa_alat, ...$magang, ...$asuransi]);
        $rating = DB::select('select sum(total)/count(question) ::float as percentage ,sum(total) as total, count(question) as user
        from (select question , right(question,1) ::int as total
        from chatlogs c 
        where intent = ?)data', array('Bintang'));

        $data = [
            'title' => 'Dashboard',
            'sewa_alat' => $sewa_alat,
            'magang' => $magang,
            'asuransi' => $asuransi,
            'permohonan' => $permohonan,
            'bintang' => $rating,
        ];

        return view('pages.admin.dashboard', $data);
    }
}
