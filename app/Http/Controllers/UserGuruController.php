<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $guru = Guru::all();
        // return view('guru.index', compact('guru'));

        // Mengambil data pengguna yang sedang login
        $user = Auth::user();

        // Mengambil atribut yang diinginkan
        $data = [
            'id' => $user->id,
            'nama' => $user->nama,
            'nip' => $user->nip, // Pastikan kolom ini ada di tabel users
            'email' => $user->email,
            'telepon' => $user->telepon,
            'is_admin' => $user->is_admin,
        ];

        // Mengembalikan data ke view atau respons JSON
        return view('user.guru.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $guru = Guru::findOrFail($id);

        // return view('user.guru.index', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Guru::findOrFail($id);
        return view('user.guru.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
        return redirect()->route('user.guru.index')->with('success', 'Data Kamu berhasil diperbarui.');
        // return view('user.guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
