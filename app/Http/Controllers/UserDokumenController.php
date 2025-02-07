<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Dokumen;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dokumen = Dokumen::with('guru', 'kriteria')->get();
        // return view('user.dokumen.index', compact('dokumen'));
        $user = Auth::user()->id;

        // Ambil data dokumen yang terdiri dari nama guru dan kriteria
        // yang dimiliki user (Login) menggunakan guru_id untuk mencari di Model Dokumen
        $dokumen = Dokumen::with('guru', 'kriteria')
        ->where('guru_id', $user)
        ->get();
        // $data = Dokumen::findOrFail($dokumen);

        return view('user.dokumen.index', compact('dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user()->id;
        $guru = Guru::find($user);
        $kriteria = Kriteria::all();
        return view('user.dokumen.create', compact('guru', 'kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        $validated = $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'file_path' => 'required|file|mimes:pdf,doc,docx|max:5210',
        ]);

        dd($validated);
        // mengatur penyimpanan file
        // variabel = kolom file_path -> di masukkan ke dalam path storage/app/public/dokumen di dalam disk public
        $filePath = $request->file('file_path')->store('dokumen', 'public');

        // $validated['file_path'] = basename($filePath); // digunakan jika hanya simpan nama file tanpa nama path di database
        $validated['file_path'] = $filePath; // digunakan jika simpan nama beserta path di database

        Dokumen::create($validated);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diunggah.');

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
    public function destroy(string $id)
    {
        //
    }
}
