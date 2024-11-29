<?php

namespace App\Http\Controllers;

use App\Models\PetaSebaran;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminPetaSebaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ['title' => 'Peta Sebaran',
                'permohonan' => PetaSebaran::all(),];
        return view('pages.admin.peta-sebaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $magangs = PetaSebaran::all();

        $data = [
            'title' => 'Buat Permohonan',
        ];

        return view('pages.admin.peta-sebaran.create', $data);
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
            $file_name = 'peta-sebaran_user:' . $request->user()->id . '_date:' . Carbon::now() . '.' . $file->getClientOriginalExtension();
            $path_permohonan = $file->storeAs('permohonan/peta-sebaran', $file_name);
            $validated['surat_permohonan'] = $path_permohonan;
        }

        try {
            PetaSebaran::create($validated);
            return redirect()->route('admin.peta-sebaran.create')->with('success', 'Permohonan berhasil dibuat');
        } catch (Exception $error) {
            report($error->getMessage());
            return redirect()->route('admin.peta-sebaran.create')->with('error', 'Permohonan gagal dibuat');
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
        $permohonan = PetaSebaran::where('id', $id)->first();

        $data = [
            'title' => 'Update Permohonan',
            'permohonan' => $permohonan,
        ];

        // return dd($data);
        return view('pages.admin.peta-sebaran.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PetaSebaran $peta_sebaran)
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
            Storage::delete($peta_sebaran->surat_permohonan);

            $file = $peta_sebaran->file('surat_permohonan');
            $file_name = 'peta-sebaran_user:' . $request->user()->id . '_date:' . Carbon::now() . '.' . $file->getClientOriginalExtension();
            $path_permohonan = $file->storeAs('permohonan/peta-sebaran', $file_name);
            $validated['surat_permohonan'] = $path_permohonan;
        }

        try {
            $peta_sebaran->update($validated);
            return redirect()->route('admin.peta-sebaran.index')->with('success', 'Permohonan berhasil diupdate');
        } catch (Exception $error) {
            report($error->getMessage());
            return redirect()->route('admin.peta-sebaran.edit')->with('error', 'Permohonan gagal diupdate');
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
