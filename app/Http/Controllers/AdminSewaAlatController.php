<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\SewaAlat;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminSewaAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'title' => 'Sewa Alat',
            'permohonan' => SewaAlat::all(),
        ];

        return view('pages.admin.sewa-alat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alats = Alat::all();

        $data = [
            'title' => 'Buat Permohonan',
            'alats' => $alats,
        ];

        return view('pages.admin.sewa-alat.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'alat_id' => 'required',
            'banyak_unit' => 'required|numeric',
            'sewa_mulai' => 'required|date',
            'sewa_berakhir' => 'required|date|after_or_equal:sewa_mulai',
            // 'surat_permohonan' => 'required|max:2048',
            'keterangan' => 'nullable',
        ]);

        $file = $request->file('surat_permohonan');
        $file_name = 'sewa-alat_user:' . $request->user()->id . '_date:' . Carbon::now() . '.' . $file->getClientOriginalExtension();
        $path_permohonan = $file->storeAs('permohonan/sewa-alat', $file_name);
        $validated['user_id'] = Auth::id();
        $validated['surat_permohonan'] = $path_permohonan;

        try {
            SewaAlat::create($validated);
            return redirect()->route('admin.sewa-alat.create')->with('success', 'Permohonan berhasil dibuat');
        } catch (Exception $error) {
            report($error->getMessage());
            return redirect()->route('admin.sewa-alat.create')->with('error', 'Permohonan gagal dibuat');
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
        $alats = Alat::all();
        $permohonan = SewaAlat::where('id', $id)->first();

        $data = [
            'title' => 'Update Permohonan',
            'alats' => $alats,
            'permohonan' => $permohonan,
        ];

        return view('pages.admin.sewa-alat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SewaAlat $sewa_alat)
    {
        $validated = $request->validate([
            'alat_id' => 'required',
            'banyak_unit' => 'required|numeric',
            'status' => 'required',
            'sewa_mulai' => 'required|date',
            'sewa_berakhir' => 'required|date|after_or_equal:sewa_mulai',
            // 'surat_permohonan' => 'nullable|max:2048',
            'keterangan' => 'nullable',
        ]);

        // $validated['user_id'] = Auth::id();

        if (array_key_exists('surat_permohonan', $validated)) {
            Storage::delete($sewa_alat->surat_permohonan);

            $file = $request->file('surat_permohonan');
            $file_name = 'sewa-alat_user:' . $request->user()->id . '_date:' . Carbon::now() . '.' . $file->getClientOriginalExtension();
            $path_permohonan = $file->storeAs('permohonan/sewa-alat', $file_name);
            $validated['surat_permohonan'] = $path_permohonan;
        }

        try {
            $sewa_alat->update($validated);
            return redirect()->route('admin.sewa-alat.index')->with('success', 'Permohonan berhasil diupdate');
        } catch (Exception $error) {
            report($error->getMessage());
            return redirect()->route('admin.sewa-alat.edit')->with('error', 'Permohonan gagal diupdate');
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
