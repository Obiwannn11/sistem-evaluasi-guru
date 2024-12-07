<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Helpers\SAWHelper;

class EvaluasiController extends Controller
{
    public function index()
{
    try {
        $gurus = Guru::with('penilaian.kriteria')->get();
        $kriterias = Kriteria::all();

        // Ubah struktur data menjadi array yang sesuai
        $data = [];
        foreach ($gurus as $guru) {
            $nilaiKriteria = [];
            foreach ($kriterias as $kriteria) {
                $nilai = $guru->penilaian
                    ->where('kriteria_id', $kriteria->id)
                    ->first();
                $nilaiKriteria[$kriteria->nama] = $nilai ? $nilai->nilai : 0;
            }

            $data[] = [
                'nama' => $guru->nama,
                'kriteria' => $nilaiKriteria
            ];
        }

        // Dapatkan nilai maksimum untuk setiap kriteria
        $maxValues = [];
        foreach ($kriterias as $kriteria) {
            $maxValues[$kriteria->nama] = $guru->penilaian
                ->where('kriteria_id', $kriteria->id)
                ->max('nilai') ?? 0;
        }

        $weights = $kriterias->pluck('bobot', 'nama')->toArray();

        $normalizedData = SAWHelper::normalize($data, $maxValues);
        $scoredData = SAWHelper::calculateScore($normalizedData, $weights);

        return view('evaluasi.index', compact('scoredData'));

    } catch (\Exception $e) {
        // Log::error('Error in evaluation calculation: ' . $e->getMessage());
        return back()->with('error', 'Terjadi kesalahan dalam perhitungan evaluasi');
    }
}
}
