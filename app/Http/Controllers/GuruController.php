<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Tampilkan daftar guru
    public function index()
    {
        $gurus = Guru::all();
        return view('gurus.index', compact('gurus'));
    }

    // Tampilkan form tambah guru
    public function create()
    {
        return view('gurus.create');
    }

    // Simpan data guru baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'bidangStudi' => 'required|string|max:255',
        ]);

        Guru::create($request->all());

        return redirect()->route('gurus.index')->with('success', 'Guru berhasil ditambahkan!');
    }

    // Tampilkan detail guru
    public function show(Guru $guru)
    {
        return view('gurus.show', compact('guru'));
    }

    // Tampilkan form edit guru
    public function edit(Guru $guru)
    {
        return view('gurus.edit', compact('guru'));
    }

    // Update data guru
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $guru->update($request->all());

        return redirect()->route('gurus.index')->with('success', 'Guru berhasil diperbarui!');
    }

    // Hapus data guru
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('gurus.index')->with('success', 'Guru berhasil dihapus!');
    }
}
