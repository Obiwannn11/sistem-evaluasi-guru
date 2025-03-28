<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Evaluasi;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function index()
    {
        // Ambil semua guru
        $gurus = Guru::all();

        // Inisialisasi array untuk menyimpan data guru dan total nilai
        $dataGurus = [];

        foreach ($gurus as $guru) {
            // Ambil semua evaluasi berdasarkan ID guru
            $evaluasi = Evaluasi::where('guru_id', $guru->id)->get();

            // Hitung total nilai dari evaluasi
            $totalNilai = 0;

            foreach ($evaluasi as $e) {
                // nilai kriteria disimpan di kolom 'nilai' di model Evaluasi
                $totalNilai += $e->nilai ?? 0; // Jika nilai null, anggap sebagai 0
            }

            // Simpan data guru dan total nilai ke dalam array
            $dataGurus[] = [
                'guru' => $guru,
                'nilai' => $totalNilai,
            ];

            $jumlahKriteria = Kriteria::all()->count();
        }

        return view('penilaian.index', compact('dataGurus', 'jumlahKriteria'));
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

    public function show($guruId)
    {
      // Ambil data guru
      $guru = Guru::with('evaluasi.kriteria')->findOrFail($guruId);

      // Ambil semua evaluasi berdasarkan ID guru
      $evaluasi = Evaluasi::where('guru_id', $guruId)->get();

      return view('penilaian.show', compact('guru', 'evaluasi'));
    }

}
