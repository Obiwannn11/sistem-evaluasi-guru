<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
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
        ]);

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
            'nip' => 'required|unique:guru,nip,' . $id,
            'email' => 'required|email|unique:guru,email,' . $id,
            'telepon' => 'required',
        ]);

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
