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
        // $permohonan = collect([...$sewa_alat, ...$magang, ...$asuransi]);
        $rating = DB::select('select round(cast((sum(total)/count(question)::float) as numeric),1) as percentage ,sum(total) as total, count(question) as user
        from (select question , right(question,1) ::int as total
        from chatlogs c 
        where intent = ?)data', array('Bintang'));

        $bintang = DB::select(' select  right(question,1) ::int as value, count(question) ::int as total
        from chatlogs c 
        where intent = ?
        group by question order by value DESC', array('Bintang'));

        $data = [
            'title' => 'Dashboard',
            'sewa_alat' => $sewa_alat,
            'magang' => $magang,
            'asuransi' => $asuransi,
            // 'permohonan' => $permohonan,
            'bintang' => $rating,
            'rating' => $bintang,
        ];

        return view('pages.admin.dashboard', $data);
    }
}
