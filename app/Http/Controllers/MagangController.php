<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permohonan = Magang::all();
        $data = [
            'title' => 'Permohonan Magang',
            'permohonan' => $permohonan,
        ];

        return view('pages.layanan.permohonan-magang', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'universitas' => 'nullable',
            'fakultas' => 'nullable',
            'prodi' => 'nullable',
        ]);

        $validated['user_id'] = Auth::id();

        try {
            Magang::create($validated);
            return back()->with('success', 'Permohonan magang berhasil dibuat');
        } catch (Exception $error) {
            report($error->getMessage());
            return back()->with('error', 'Permohonan magang gagal dibuat');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Magang $permohonan_magang)
    {
        if ($permohonan_magang->surat_ijin_magang) {
            Storage::delete($permohonan_magang->surat_ijin_magang);
        }

        try {
            $permohonan_magang->delete();
            return back()->with('success', 'Permohonan magang berhasil dihapus');
        } catch (Exception $error) {
            report($error->getMessage());
            return back()->with('error', 'Permohonan magang gagal dihapus');
        }
    }

    public function download(Magang $permohonan_magang)
    {
        Storage::download($permohonan_magang->surat_ijin_magang);
    }
}
