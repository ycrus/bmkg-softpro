<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Storage;

class AdminPermohonanMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ['title' => 'Permohonan Magang',
                'permohonan' => Magang::all(),];
        return view('pages.admin.permohonan-magang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Buat Permohonan',
        ];

        return view('pages.admin.permohonan-magang.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'universitas' => 'required',
            'fakultas' => 'required',
            'prodi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:sewa_mulai',
            // 'surat_permohonan' => 'nullable|max:2048',
            // 'keterangan' => 'nullable',
        ]);

        // $validated['user_id'] = Auth::id();

        if (array_key_exists('surat_permohonan', $validated)) {
            Storage::delete($request->surat_permohonan);

            $file = $request->file('surat_permohonan');
            $file_name = 'permohonan-magang_user:' . $request->user()->id . '_date:' . Carbon::now() . '.' . $file->getClientOriginalExtension();
            $path_permohonan = $file->storeAs('permohonan/permohonan-magang', $file_name);
            $validated['surat_permohonan'] = $path_permohonan;
        }

        try {
            Magang::create($validated);
            return redirect()->route('admin.permohonan-magang.create')->with('success', 'Permohonan berhasil dibuat');
        } catch (Exception $error) {
            report($error->getMessage());
            return redirect()->route('admin.permohonan-magang.create')->with('error', 'Permohonan gagal dibuat');
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
        $permohonan = Magang::where('id', $id)->first();

        $data = [
            'title' => 'Update Permohonan',
            'permohonan' => $permohonan,
        ];

        // return dd($data);
        return view('pages.admin.permohonan-magang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Magang $permohonan_magang)
    {
        $validated = $request->validate([
            'universitas' => 'required',
            'fakultas' => 'required',
            'prodi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:sewa_mulai',
            'status' => 'required',
            // 'surat_permohonan' => 'nullable|max:2048',
            // 'keterangan' => 'nullable',
        ]);

        // $validated['user_id'] = Auth::id();

        if (array_key_exists('surat_permohonan', $validated)) {
            Storage::delete($permohonan_magang->surat_permohonan);

            $file = $permohonan_magang->file('surat_permohonan');
            $file_name = 'permohonan-magang_user:' . $request->user()->id . '_date:' . Carbon::now() . '.' . $file->getClientOriginalExtension();
            $path_permohonan = $file->storeAs('permohonan/permohonan-magang', $file_name);
            $validated['surat_permohonan'] = $path_permohonan;
            $validated['status'] = $request->input('status');
        }

        try {
            $permohonan_magang->update($validated);
            return redirect()->route('admin.permohonan-magang.index')->with('success', 'Permohonan berhasil diupdate');
        } catch (Exception $error) {
            report($error->getMessage());
            return redirect()->route('admin.permohonan-magang.edit')->with('error', 'Permohonan gagal diupdate');
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
