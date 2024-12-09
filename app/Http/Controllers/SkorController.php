<?php
namespace App\Http\Controllers;

use App\Models\Skor;
use App\Models\Guru;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SkorController extends Controller
{
    // Menampilkan daftar skor
    public function index()
    {
        $skors = Skor::with('guru', 'kriteria')->get();
        return view('skors.index', compact('skors'));

        // Alternatif query builder tanpa Eloquent Model jika mengambil kolom spesifik dari tabel lain
        // $skors = Skor::with(['guru' => function ($query) {
        //     $query->select('id', 'nama', 'email');
        // }, 'kriteria' => function ($query) {
        //     $query->select('id', 'nama_kriteria');
        // }])->get();
    }

    // Menampilkan form tambah skor
    public function create()
    {
        $gurus = Guru::all();
        $kriterias = Kriteria::all();
        return view('skors.create', compact('gurus', 'kriterias'));
    }

    // Menyimpan skor baru
    public function store(Request $request)
    {
    $request->validate([
        'id_guru' => 'required|exists:gurus,id',
        'skors' => 'required|array',
    ]);

    // Ambil ID guru
    $idGuru = $request->id_guru;

    // Loop setiap kriteria dan simpan skor
    foreach ($request->skors as $idKriteria => $nilai) {
        Skor::updateOrCreate(
            [
                'id_guru' => $idGuru,
                'id_kriteria' => $idKriteria,
            ],
            [
                'nilai' => $nilai,
            ]
        );
    }

    return redirect()->route('skors.index')->with('success', 'Nilai berhasil disimpan!');
    }


    // Menampilkan detail skor
    public function show(Skor $skor)
    {
        return view('skors.show', compact('skor'));
    }

    // Menghapus skor
    public function destroy(Skor $skor)
    {
        $skor->delete();
        return redirect()->route('skors.index')->with('success', 'Skor berhasil dihapus.');
    }
}
