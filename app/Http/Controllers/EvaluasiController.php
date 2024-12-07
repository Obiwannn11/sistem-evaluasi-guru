<?php
namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\Guru;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    // Menampilkan daftar evaluasi
    public function index()
    {
        $evaluasis = Evaluasi::with('guru')->get();
        return view('evaluasis.index', compact('evaluasis'));
    }

    // Menyimpan evaluasi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_guru' => 'required|exists:gurus,id_guru',
            'tanggal_evaluasi' => 'required|date',
            'total_skor' => 'required|integer|min:0',
            'nilai_akhir' => 'required|numeric|min:0|max:100',
        ]);

        Evaluasi::create($validated);

        return redirect()->route('evaluasis.index')->with('success', 'Evaluasi berhasil disimpan.');
    }
}
