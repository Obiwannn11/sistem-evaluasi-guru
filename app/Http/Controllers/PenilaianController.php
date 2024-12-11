<?php
namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $evaluasi = Evaluasi::with('guru')->get();
        $kriteria = Evaluasi::with('kriteria')->get();
        return view('penilaian.index', compact('evaluasi', 'kriteria'));
    }

    public function edit($id)
    {
        $evaluasi = Evaluasi::with('penilaian.kriteria')->findOrFail($id);
        return view('penilaian.edit', compact('evaluasi'));
    }

    public function update(Request $request, $id)
    {
        $evaluasi = Evaluasi::findOrFail($id);

        foreach ($request->input('penilaian', []) as $penilaianData) {
            Penilaian::updateOrCreate(
                ['evaluasi_id' => $id, 'kriteria_id' => $penilaianData['kriteria_id']],
                ['nilai' => $penilaianData['nilai'], 'komentar' => $penilaianData['komentar']]
            );
        }

        return redirect()->route('evaluasi.show', $id)->with('success', 'Penilaian berhasil disimpan.');
    }
}
