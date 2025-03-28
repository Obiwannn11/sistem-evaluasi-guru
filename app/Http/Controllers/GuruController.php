<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::where('is_admin', 0)->get();

        // dd($guru);
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:gurus',
            'email' => 'required|email|unique:gurus',
            'telepon' => 'required',
            'password' => 'required',
        ]);
        // Hash password sebelum menyimpan
        $validated['password'] = Hash::make($validated['password']);

        Guru::create($validated);
        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:gurus,nip,' . $id,
            'email' => 'required|email|unique:gurus,email,' . $id,
            'telepon' => 'required',
            'password' => 'nullable',
        ]);
        // Jika password diisi, hash dan simpan
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            // Jika password tidak diisi, hapus dari array validated
            unset($validated['password']);
    }

        Guru::findOrFail($id)->update($validated);
        return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    public function show($id)
    {

    }

    public function destroy($id)
    {
        Guru::findOrFail($id)->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}
