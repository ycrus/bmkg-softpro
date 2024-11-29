<?php

namespace App\Http\Controllers;

use App\Models\Asuransi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminKlaimAsuransiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ['title' => 'Klaim Asuransi',
                'permohonan' => Asuransi::all(),];
        return view('pages.admin.klaim-asuransi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Buat Permohonan',
        ];

        return view('pages.admin.klaim-asuransi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'perusahaan' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'kejadian' => 'required',
            // 'surat_permohonan' => 'nullable|max:2048',
            // 'keterangan' => 'nullable',
        ]);

        $validated['user_id'] = Auth::id();

        if (array_key_exists('surat_permohonan', $validated)) {
            Storage::delete($request->surat_permohonan);

            $file = $request->file('surat_permohonan');
            $file_name = 'klaim-asuransi_user:' . $request->user()->id . '_date:' . Carbon::now() . '.' . $file->getClientOriginalExtension();
            $path_permohonan = $file->storeAs('permohonan/klaim-asuransi', $file_name);
            $validated['surat_permohonan'] = $path_permohonan;
        }

        try {
            Asuransi::create($validated);
            return redirect()->route('admin.klaim-asuransi.create')->with('success', 'Permohonan berhasil dibuat');
        } catch (Exception $error) {
            report($error->getMessage());
            return redirect()->route('admin.klaim-asuransi.create')->with('error', 'Permohonan gagal dibuat');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permohonan = Asuransi::where('id', $id)->first();

        $data = [
            'title' => 'Update Permohonan',
            'permohonan' => $permohonan,
        ];

        // return dd($data);
        return view('pages.admin.klaim-asuransi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asuransi $klaim_asuransi)
    {
        $validated = $request->validate([
            'perusahaan' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'kejadian' => 'required',
            'status' => 'required',
            // 'surat_permohonan' => 'nullable|max:2048',
            // 'keterangan' => 'nullable',
        ]);

        // $validated['user_id'] = Auth::id();
        $validated['status'] = $request->input('status');

        if (array_key_exists('surat_permohonan', $validated)) {
            Storage::delete($klaim_asuransi->surat_permohonan);

            $file = $klaim_asuransi->file('surat_permohonan');
            $file_name = 'klaim-asuransi_user:' . $request->user()->id . '_date:' . Carbon::now() . '.' . $file->getClientOriginalExtension();
            $path_permohonan = $file->storeAs('permohonan/klaim-asuransi', $file_name);
            $validated['surat_permohonan'] = $path_permohonan;
        }

        try {
            $klaim_asuransi->update($validated);
            return redirect()->route('admin.klaim-asuransi.index')->with('success', 'Permohonan berhasil diupdate');
        } catch (Exception $error) {
            report($error->getMessage());
            return redirect()->route('admin.klaim-asuransi.edit')->with('error', 'Permohonan gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
