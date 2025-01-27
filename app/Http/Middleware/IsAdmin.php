<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna adalah admin
        if (Auth::User()->is_admin == true) {
            return $next($request);
        }

        // Jika bukan admin, redirect atau lakukan tindakan lainnya
        return redirect(route('user.dashboard'));
    }
}
