<?php
namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    // Menampilkan daftar kriteria
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriterias.index', compact('kriterias'));
    }

    // Menampilkan form tambah kriteria
    public function create()
    {
        return view('kriterias.create');
    }

    // Menyimpan data kriteria baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kriteria' => 'required|string|max:255',
            'bobot' => 'required|integer|min:0|max:4',
        ]);

        Kriteria::create($validated);

        return redirect()->route('kriterias.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    // Menampilkan detail kriteria
    public function show(Kriteria $kriteria)
    {
        return view('kriterias.show', compact('kriteria'));
    }

    // Menampilkan form edit kriteria
    public function edit(Kriteria $kriteria)
    {
        return view('kriterias.edit', compact('kriteria'));
    }

    // Memperbarui data kriteria
    public function update(Request $request, Kriteria $kriteria)
    {
        $validated = $request->validate([
            'nama_kriteria' => 'required|string|max:255',
            'bobot' => 'required|integer|min:0|max:4',
        ]);

        $kriteria->update($validated);

        return redirect()->route('kriterias.index')->with('success', 'Kriteria berhasil diperbarui.');
    }

    // Menghapus data kriteria
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriterias.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}
