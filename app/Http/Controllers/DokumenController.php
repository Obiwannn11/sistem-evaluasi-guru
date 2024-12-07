<?php
namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Guru;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    // Menampilkan daftar dokumen
    public function index()
    {
        $dokumens = Dokumen::with('guru', 'kriteria')->get();
        return view('dokumens.index', compact('dokumens'));
    }

    // Menampilkan form tambah dokumen
    public function create()
    {
        $gurus = Guru::all();
        $kriterias = Kriteria::all();
        return view('dokumens.create', compact('gurus', 'kriterias'));
    }

    // Menyimpan dokumen baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_guru' => 'required|exists:gurus,id_guru',
            'id_kriteria' => 'required|exists:kriterias,id_kriteria',
            'file_path' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $path = $request->file('file_path')->store('uploads/dokumen', 'public');

        Dokumen::create([
            'id_guru' => $validated['id_guru'],
            'id_kriteria' => $validated['id_kriteria'],
            'file_path' => $path,
        ]);

        return redirect()->route('dokumens.index')->with('success', 'Dokumen berhasil diunggah.');
    }

    // Menampilkan detail dokumen
    public function show(Dokumen $dokumen)
    {
        return view('dokumens.show', compact('dokumen'));
    }

    // Menghapus dokumen
    public function destroy(Dokumen $dokumen)
    {
        $dokumen->delete();
        return redirect()->route('dokumens.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
