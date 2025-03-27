<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokumen;
use App\Models\Evaluasi;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showUploadedFile(){
        //AMBIL Semua Kriteria
        $totalKriteria = Kriteria::all()->count();
        // dd($totalKriteria);

        //Mengambil JUMLAH File Yang Seharusnya di upload Guru
        $total_file = Dokumen::where('guru_id', Auth::user()->id)->get()->count();

        
        // Menampilkan JUMLAH file yang yang sudah di NILAI
        $total_dinilai = Evaluasi::where('guru_id', Auth::user()->id)->where('nilai', '!=', null)->get()->count();
        // dd($total_dinilai);
        
        //Mengirimkan data JUMLAH data file yang sudah di upload dan data yang belum di upload
        return view('user.dashboard.index', compact( 'total_file', 'totalKriteria', 'total_dinilai'));
    }
    /**
     * Display a listing of the resource.
     */
    public function home(){
        $users = User::all();
        return view('dashboard.index', compact('users'));
    }
    public function index(){
        $users = User::all();
        return view('dashboard.user.index', compact('users'));
    }
    public function profil(){
        $users = User::all();
        return view('dashboard.profil', compact('users'));
    }
    public function ubah(){
        $users = User::all();
        return view('dashboard.edit', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'email.unique' => 'Email sudah terdaftar.',
            'password.min' => 'Password minimal 8 karakter.',
        ];

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:guru,super_guru',
        ]);
        User::create($request->all());

        return redirect()->route('dashboard.index')->with('success', 'User Berhasil Dibuat!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        // show the edit form and pass the user
        return view('dashboard.user.edit')->with('user', $user);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            // aturan validasi
            'name' => 'string|max:255',
            'email' => 'string|email|unique:users',
            'password' => 'string|min:8|confirmed',
            'role' => 'in:guru,super_guru',
        ]);

        $request->update($validatedData);

        return redirect()->route('user.index')->with('success', 'Berhasil Update User.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $user->delete();

        // return redirect()->route('dashboard.index')->with('success', 'User Berhasil Dihapus.');
    }
}
