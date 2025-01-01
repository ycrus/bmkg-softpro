<?php

namespace App\Http\Controllers;

use App\Models\Asuransi;
use App\Models\Magang;
use App\Models\SewaAlat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        group by value order by value DESC', array('Bintang'));

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

    public function getChartData(Request $request)
    {
        // Get the current month and year
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Get query parameters, default to the current month and year if not provided
        $month = $request->query('month', $currentMonth);
        $year = $request->query('year', $currentYear);

        // Build the query
        $query = DB::table('chatlogs as c')
            ->selectRaw("
            CASE 
                WHEN intent = '02 Alat' THEN 'Sewa Alat' 
                WHEN intent = '01 Layanan' THEN 'Pelayanan Jasa'
                WHEN intent = '05 Kunjungan' THEN 'Permohonan Kunjungan'
            END as label,
            COUNT(intent) as value,
            EXTRACT(MONTH FROM created_at) as month,
            EXTRACT(YEAR FROM created_at) as year
        ")
            ->whereIn('intent', ['02 Alat', '01 Layanan', '05 Kunjungan'])
            ->whereRaw('EXTRACT(MONTH FROM created_at) = ?', [$month])
            ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [$year])
            ->groupBy('intent', 'month', 'year');

        // Execute the query
        $results = $query->get();

        // Calculate max value
        $maxValue = $results->max('value');

        // Return response
        return response()->json([
            'data' => $results,
            'maxValue' => $maxValue,
            'currentMonth' => $month,
            'currentYear' => $year
        ]);
    }
}
