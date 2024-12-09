<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Evaluasi;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    public function index()
    {
        $evaluasi = Evaluasi::with('guru')->get();
        return view('evaluasi.index', compact('evaluasi'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('evaluasi.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guru_id' => 'required|exists:guru,id',
        ]);

        $evaluasi = Evaluasi::create($validated);

        return redirect()->route('evaluasi.show', $evaluasi->id)->with('success', 'Evaluasi berhasil dibuat.');
    }

    public function show($id)
    {
        $evaluasi = Evaluasi::with('guru', 'penilaian.kriteria')->findOrFail($id);
        return view('evaluasi.show', compact('evaluasi'));
    }

    public function calculateFinalScore($guruId)
    {
    // Ambil data evaluasi guru dan semua kriteria
    $guru = Guru::with('evaluasi')->findOrFail($guruId);
    $kriteria = Kriteria::all();

    $totalScore = 0;

    foreach ($kriteria as $item) {
        // Ambil nilai evaluasi untuk kriteria ini
        $evaluasi = $guru->evaluasi->where('kriteria_id', $item->id)->first();

        if ($evaluasi) {
            $nilaiAwal = $evaluasi->nilai;
            $normalisasi = $nilaiAwal / $item->max_nilai; // Normalisasi nilai
            $totalScore += $normalisasi * $item->bobot;   // Hitung nilai akhir
        }
    }

    // Simpan nilai akhir ke database
    $guru->evaluasi()->update(['nilai_akhir' => round($totalScore, 3)]);

    return round($totalScore, 3);
    }

    public function rekapitulasi()
{
    $guru = Guru::with('evaluasi')->get();
    $kriteria = Kriteria::all();

    return view('evaluasi.rekapitulasi', compact('guru', 'kriteria'));
}

}
