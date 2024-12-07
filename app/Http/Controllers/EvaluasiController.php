<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Evaluasi;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    // Menampilkan daftar evaluasi
    public function index()
{
    // Ambil semua data guru
    $gurus = Guru::with(['dokumens', 'skors'])->get();

    // Variabel untuk menyimpan hasil evaluasi
    $evaluasiResults = [];

    // Total skor maksimal
    $totalSkorMaksimal = Kriteria::count() * 4; // Misal: 12 kriteria x skor 4 = 48

    foreach ($gurus as $guru) {
        // Hitung jumlah skor yang diperoleh
        $totalSkorDiperoleh = $guru->skors->sum('nilai');

        // Hitung persentase nilai akhir
        $persentase = ($totalSkorDiperoleh / $totalSkorMaksimal) * 100;

        // Simpan hasil evaluasi
        $evaluasiResults[] = [
            'guru' => $guru,
            'total_skor' => $totalSkorDiperoleh,
            'persentase' => number_format($persentase, 2), // Format dua desimal
        ];
    }

    return view('evaluasis.index', compact('evaluasiResults'));
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
