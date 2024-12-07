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
        $validated = $request->validate([
            'id_guru' => 'required|exists:gurus,id_guru',
            'id_kriteria' => 'required|exists:kriterias,id_kriteria',
            'nilai' => 'required|integer|min:0|max:4',
        ]);

        Skor::create($validated);

        return redirect()->route('skors.index')->with('success', 'Skor berhasil ditambahkan.');
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
