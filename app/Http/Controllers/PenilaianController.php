<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Guru;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    // Tampilkan daftar penilaian
    public function index()
    {
        $penilaians = Penilaian::with(['guru', 'kriteria'])->get();
        return view('penilaians.index', compact('penilaians'));
    }

    // Tampilkan form tambah penilaian
    public function create()
    {
        $gurus = Guru::all();
        $kriterias = Kriteria::all();
        return view('penilaians.create', compact('gurus', 'kriterias'));
    }

    // Simpan data penilaian baru
    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        Penilaian::create($request->all());

        return redirect()->route('penilaians.index')->with('success', 'Penilaian berhasil ditambahkan!');
    }

    // Tampilkan detail penilaian
    public function show(Penilaian $penilaian)
    {
        return view('penilaians.show', compact('penilaian'));
    }

    // Tampilkan form edit penilaian
    public function edit(Penilaian $penilaian)
    {
        $gurus = Guru::all();
        $kriterias = Kriteria::all();
        return view('penilaians.edit', compact('penilaian', 'gurus', 'kriterias'));
    }

    // Update data penilaian
    public function update(Request $request, Penilaian $penilaian)
    {
        $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        $penilaian->update($request->all());

        return redirect()->route('penilaians.index')->with('success', 'Penilaian berhasil diperbarui!');
    }

    // Hapus data penilaian
    public function destroy(Penilaian $penilaian)
    {
        $penilaian->delete();

        return redirect()->route('penilaians.index')->with('success', 'Penilaian berhasil dihapus!');
    }
}
