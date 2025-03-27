<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Dokumen;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $selectKriteria = Kriteria::whereNotIn('id', function ($query) { //menampilkan data yang tidak ada dari ....
            $query->select('kriteria_id') // kolom kriteria id
            ->from('dokumens') //dari tabel dokumen
            ->where('guru_id', Auth::user()->id); //di mana guru_id = user yang login
        })
        ->get();

        // dd($selectKriteria);
        
        return view('user.dokumen.create', compact('guru', 'selectKriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'file_path' => 'required|file|mimes:pdf,doc,docx|max:5210',
        ]);


        // Check if a document with the same guru_id and kriteria_id already exists
        $existingDocument = Dokumen::where('guru_id', $validated['guru_id'])
        ->where('kriteria_id', $validated['kriteria_id'])
        ->exists();

        if ($existingDocument) {
        // If a document exists, return an error
        return redirect()->route('user.dokumen.index')->withErrors(['unique_dokumen' => 'Dokumen dengan Kriteria ini sudah diupload, silahkan hapus file sebelumnya']);
        // return redirect()->route('user.dokumen.index');
        }

        // mengatur penyimpanan file
        // variabel = kolom file_path -> di masukkan ke dalam path storage/app/public/dokumen di dalam disk public
        $filePath = $request->file('file_path')->store('dokumen', 'public');

        // $validated['file_path'] = basename($filePath); // digunakan jika hanya simpan nama file tanpa nama path di database
        $validated['file_path'] = $filePath; // digunakan jika simpan nama beserta path di database

        Dokumen::create($validated);

        return redirect()->route('user.dokumen.index')->with('success', 'Dokumen berhasil diunggah.');

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

        $dokumen = Dokumen::findOrFail($id);
        // dd($dokumen);
        //  1. Hapus file terkait dari storage
         if (Storage::disk('public')->exists($dokumen->file_path)) { // Cek apakah file ada di storage sebelum dihapus
            // dd($dokumen->file_path);
            Storage::disk('public')->delete($dokumen->file_path);
        }

        // 2. Hapus record Dokumen dari database
        $dokumen->delete();

        // 3. Redirect ke route index dengan pesan sukses
        return redirect()->route('user.dokumen.index')->with('success', 'Dokumen berhasil dihapus.');

        // $dokumen = Dokumen::findOrFail($id);
        // unlink(storage_path('app/' . $dokumen->file_path));
        // $dokumen->delete();

        // return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus.');

    }
}
