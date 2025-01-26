<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // dd($request); // Validasi input
        $req = $request->only('email', 'password');

        if (Auth::attempt($req)) {
            $request->session()->regenerate();
            // Mendapatkan pengguna yang sedang login

            // dd(Auth::User()->is_admin );
            // buat percabangan jika login adalah admin atau user
            // Auth::User()->is_admin == true ?  redirect()->route('dashboard') : redirect()->route('user.dashboard');

            if(Auth::User()->is_admin == true){
                redirect()->route('dashboard');
            }else{
                redirect()->route('user.dashboard');
            }
            // return redirect('/dashboard', compact('email', 'name'));
            // return redirect('/dashboard')->with('name', $name)->with('email', $email);
           // return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

}
