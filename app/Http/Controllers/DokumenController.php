<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Dokumen;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::with('guru', 'kriteria')->get();
        return view('dokumen.index', compact('dokumen'));
    }

    public function create()
    {
        $guru = Guru::all();
        $kriteria = Kriteria::all();
        return view('dokumen.create', compact('guru', 'kriteria'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'file_path' => 'required|file|mimes:pdf,doc,docx|max:5210',
        ]);

        // mengatur penyimpanan file
        // variabel = kolom file_path -> di masukkan ke dalam path storage/app/public/dokumen di dalam disk public
        $filePath = $request->file('file_path')->store('dokumen', 'public');

        // $validated['file_path'] = basename($filePath); // digunakan jika hanya simpan nama file tanpa nama path di database
        $validated['file_path'] = $filePath; // digunakan jika simpan nama beserta path di database

        Dokumen::create($validated);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diunggah.');
    }


    public function show($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        return view('dokumen.show', compact('dokumen'));
    }

    public function update(Request $request, Dokumen $dokumen)
{
    $request->validate([
        'file_path' => 'required|file|mimes:pdf,doc,docx|max:4096',
    ]);

    // Hapus file lama jika ada
    if ($dokumen->file_path) {
        Storage::delete($dokumen->file_path);
    }

    // Simpan file baru
    $filePath = $request->file('file_path')->store('dokumen');

    $dokumen->update([
        'file_path' => $filePath,
    ]);

    return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui!');
}


    public function destroy($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        dd($dokumen);
         // 1. Hapus file terkait dari storage
         if (Storage::disk('public')->exists($dokumen->file_path)) { // Cek apakah file ada di storage sebelum dihapus
            Storage::disk('public')->delete($dokumen->file_path);
        }

        
        // 2. Hapus record Dokumen dari database
        $dokumen->delete();

        //FIXME 
        //3, jika file di hapus, maka penilaian yang terkait dengan file ini juga harus di hapus

        // 3. Redirect ke route index dengan pesan sukses
        return redirect()->route('user.dokumen.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
