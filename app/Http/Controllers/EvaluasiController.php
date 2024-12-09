<?php
namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\Guru;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    public function index()
    {
        $evaluasi = Evaluasi::with('guru')->get();
        return view('evaluasi.index', compact('evaluasi'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('evaluasi.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guru_id' => 'required|exists:guru,id',
        ]);

        $evaluasi = Evaluasi::create($validated);

        return redirect()->route('evaluasi.show', $evaluasi->id)->with('success', 'Evaluasi berhasil dibuat.');
    }

    public function show($id)
    {
        $evaluasi = Evaluasi::with('guru', 'penilaian.kriteria')->findOrFail($id);
        return view('evaluasi.show', compact('evaluasi'));
    }
}
