<?php
namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Guru;
use App\Models\Kriteria;
use Illuminate\Http\Request;

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
            'guru_id' => 'required|exists:guru,id',
            'kriteria_id' => 'required|exists:kriteria,id',
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

    public function destroy($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        unlink(storage_path('app/' . $dokumen->file_path));
        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
