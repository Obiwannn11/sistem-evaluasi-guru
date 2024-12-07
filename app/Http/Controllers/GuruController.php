<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Menampilkan daftar guru
    public function index()
    {
        $gurus = Guru::all();
        return view('gurus.index', compact('gurus'));
    }

    // Menampilkan form tambah guru
    public function create()
    {
        return view('gurus.create');
    }

    // Menyimpan data guru baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:gurus,email',
            'password' => 'required|string|min:6',
        ]);

        Guru::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('gurus.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    // Menampilkan detail guru
    public function show(Guru $guru)
    {
        return view('gurus.show', compact('guru'));
    }

    // Menampilkan form edit guru
    public function edit(Guru $guru)
    {
        return view('gurus.edit', compact('guru'));
    }

    // Memperbarui data guru
    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:gurus,email,' . $guru->id_guru,
            'password' => 'nullable|string|min:6',
        ]);

        $guru->update([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? bcrypt($validated['password']) : $guru->password,
        ]);

        return redirect()->route('gurus.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    // Menghapus data guru
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('gurus.index')->with('success', 'Guru berhasil dihapus.');
    }
}

