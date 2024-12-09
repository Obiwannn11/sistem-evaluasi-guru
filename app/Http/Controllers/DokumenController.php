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
            'file_path' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $validated['file_path'] = $request->file('file_path')->store('dokumen');
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
        unlink(storage_path('app/' . $dokumen->file_path));
        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
