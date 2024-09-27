<?php

namespace App\Http\Controllers;

use App\Models\PlanMateri;
use Illuminate\Http\Request;

class PlanMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.plan.materi.index');
    }
    public function index2()
    {
        return view('dashboard.plan.materi.index2');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.plan.materi.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_plan' => 'required|string|max:255|',
            'jenis' => 'required|in:metode,materi,indikator',
            'dokumen_plan' => 'required|mimes:pdf|max:10240',
        ]);

        // Upload gambar dan simpan path-nya
        $filePath = $request->file('file')->store('file/plan', 'public');
        $FileName = basename($filePath);

        PlanMateri::create([
            'judul_plan' => $validatedData['name'],
            'dokumen_plan' => $FileName,
            // 'dokumen_plan' => $validatedData['category_id'],
            'jenis' => $validatedData['price'],
            // 'stock' => $validatedData['stock'],
        ]);


        // Alert::success('Successful!', 'Product created successfully.');
        return redirect()->route('products.index');
        // return redirect()->route('products.index')->with('alert-success', 'Product created successfully.');
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
        $materi = PlanMateri::find($id);

        // show the edit form and pass the user
        return view('dashboard.plan.materi.edit')->with('materi', $materi);

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
