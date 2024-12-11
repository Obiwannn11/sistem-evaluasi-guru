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
        $guru = Guru::with(['dokumen', 'evaluasi'])->get();
        return view('evaluasi.index', compact('guru'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('evaluasi.create', compact('guru'));
    }

    public function store(Request $request)
    {
    // Validasi Input
    $request->validate([
        'guru_id' => 'required|exists:gurus,id',
        'nilai' => 'required|array',
        'nilai.*' => 'nullable|numeric|min:0|max:100',
        'komentar' => 'nullable|array',
        'komentar.*' => 'nullable|string|max:255',
    ]);

    $guruId = $request->input('guru_id');
    $nilaiData = $request->input('nilai');
    $komentarData = $request->input('komentar');

    foreach ($nilaiData as $kriteriaId => $nilai) {
        Evaluasi::updateOrCreate(
            [
                'guru_id' => $guruId,
                'kriteria_id' => $kriteriaId
            ],
            [
                'nilai' => $nilai,
                'komentar' => $komentarData[$kriteriaId] ?? null
            ]
        );
    }
    return redirect()->route('evaluasi.index')
        ->with('success', 'Penilaian berhasil disimpan.');
    }

    public function show($id)
    {
        $guru = Guru::with('dokumen')->findOrFail($id);
        $kriteria = Kriteria::all();
        $evaluasi = Evaluasi::where('guru_id', $id)->get()->keyBy('kriteria_id');
        return view('evaluasi.show', compact('guru', 'kriteria', 'evaluasi'));
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
    $guru = Guru::with(['evaluasi.kriteria'])->get(); // Memuat data guru beserta evaluasinya
    return view('evaluasi.rekapitulasi', compact('guru'));
    }

}
