<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Evaluasi;
use Illuminate\Http\Request;

class UserPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::all();

        // Inisialisasi array untuk menyimpan data guru dan total nilai
        $dataGurus = [];

        foreach ($gurus as $guru) {
            // Ambil semua evaluasi berdasarkan ID guru
            $evaluasi = Evaluasi::where('guru_id', $guru->id)->get();

            // Hitung total nilai dari evaluasi
            $totalNilai = 0;

            foreach ($evaluasi as $e) {
                // Asumsikan nilai kriteria disimpan di kolom 'nilai' di model Evaluasi
                $totalNilai += $e->nilai ?? 0; // Jika nilai null, anggap sebagai 0
            }

            // Simpan data guru dan total nilai ke dalam array
            $dataGurus[] = [
                'guru' => $guru,
                'nilai' => $totalNilai,
            ];
        }
        return view('penilaian.index', compact('dataGurus'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
