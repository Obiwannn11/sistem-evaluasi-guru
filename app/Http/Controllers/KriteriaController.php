<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    // Tampilkan daftar kriteria
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriterias.index', compact('kriterias'));
    }

    // Tampilkan form tambah kriteria baru
    public function create()
    {
        return view('kriterias.create');
    }

    // Simpan kriteria baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bobot' => 'required|numeric|min:0|max:5', // Bobot antara 0 dan 5
        ]);

        Kriteria::create($request->all());

        return redirect()->route('kriterias.index')->with('success', 'Kriteria berhasil ditambahkan!');
    }

    // Tampilkan detail kriteria
    public function show(Kriteria $kriteria)
    {
        return view('kriterias.show', compact('kriteria'));
    }

    // Tampilkan form edit kriteria
    public function edit(Kriteria $kriteria)
    {
        return view('kriterias.edit', compact('kriteria'));
    }

    // Update data kriteria
    public function update(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bobot' => 'required|numeric|min:0|max:1',
        ]);

        $kriteria->update($request->all());

        return redirect()->route('kriterias.index')->with('success', 'Kriteria berhasil diperbarui!');
    }

    // Hapus kriteria
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();

        return redirect()->route('kriterias.index')->with('success', 'Kriteria berhasil dihapus!');
    }
}
