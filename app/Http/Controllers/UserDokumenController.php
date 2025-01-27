<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dokumen = Dokumen::with('guru', 'kriteria')->get();
        // return view('user.dokumen.index', compact('dokumen'));
        $user = Auth::user()->id;

        // Ambil data dokumen yang terdiri dari nama guru dan kriteria
        // yang dimiliki user (Login) menggunakan guru_id untuk mencari di Model Dokumen
        $dokumen = Dokumen::with('guru', 'kriteria')
        ->where('guru_id', $user)
        ->get();
        // $data = Dokumen::findOrFail($dokumen);

        return view('user.dokumen.index', compact('dokumen'));
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
