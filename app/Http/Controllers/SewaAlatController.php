<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\SewaAlat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SewaAlatController extends Controller
{
    public function index()
    {
        $alats = Alat::all();
        $permohonan = SewaAlat::where('user_id', Auth::id())->get();
        return view('pages.layanan.sewa-alat.index', ['permohonan' => $permohonan, 'alats' => $alats]);
    }

    public function create(Alat $alat)
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alat_id' => 'required',
            'sewa_mulai' => 'required|date',
            'sewa_berakhir' => 'required|date|after_or_equal:sewa_mulai',
            'surat_permohonan' => 'required|max:2048',
            'keterangan' => 'nullable',
            'syarat' => 'required',
        ]);

        $file = $request->file('surat_permohonan');
        $file_name = 'sewa-alat_user:' . $request->user()->id . '_date:' . Carbon::now() . '.' . $file->getClientOriginalExtension();
        $path_permohonan = $file->storeAs('permohonan/sewa-alat', $file_name);
        $validated['user_id'] = Auth::id();
        $validated['surat_permohonan'] = $path_permohonan;

        // $alat_id = $validated['alat_id'];
        // $sewa_mulai = $validated['sewa_mulai'];
        // $sewa_berakhir = $validated['sewa_berakhir'];

        // // Check if there is any existing rental for the same barang and overlapping dates
        // $ada_sewa = SewaAlat::where('alat_id', $alat_id)
        //     ->where(function ($query) use ($sewa_mulai, $sewa_berakhir) {
        //         $query->where(function ($q) use ($sewa_mulai, $sewa_berakhir) {
        //             $q->where('sewa_mulai', '>=', $sewa_mulai)
        //                 ->where('sewa_mulai', '<', $sewa_berakhir);
        //         })
        //             ->orWhere(function ($q) use ($sewa_mulai, $sewa_berakhir) {
        //                 $q->where('sewa_berakhir', '>', $sewa_mulai)
        //                     ->where('sewa_berakhir', '<=', $sewa_berakhir);
        //             });
        //     })
        //     ->first();

        // // If there is an existing rental, return a response indicating unavailability
        // if ($ada_sewa && $alat->unit < $validated['banyak_unit']) {
        //     return back()->with('error', 'Barang tidak tersedia pada tanggal tersebut.');
        // }

        try {
            SewaAlat::create($validated);
            return back()->with('success', 'Permohonan berhasil dibuat');
        } catch (Exception $error) {
            report($error->getMessage());
            return back()->with('error', 'Permohonan gagal dibuat');
        }
    }

    public function destroy(SewaAlat $sewa_alat)
    {
        try {
            Storage::delete($sewa_alat->surat_permohonan);
            $sewa_alat->delete();
            return back()->with('success', 'Permohonan berhasil dibatalkan');
        } catch (Exception $error) {
            return back()->with('error', 'Permohonan gagal dibatalkan');
        }
    }

    public function download(SewaAlat $sewa_alat)
    {
        return Storage::download($sewa_alat->surat_permohonan, 'surat-permohonan');
    }
}
