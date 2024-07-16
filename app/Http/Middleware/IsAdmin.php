<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    // public function handle($request, Closure $next, $role)
    // {
    //     if (!Auth::check() || Auth::user()->level != $role) {
    //         return redirect('/')->with('error', 'Anda Tidak Memiliki Akses Ke Halaman ini!');;
    //     }

    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Anda Belum Masuk, Silahkan Masuk Terlebih dahulu');
        }
        if (Auth::user()->level != 1) {
            return redirect('/')->with('error', 'You do not have permission to access.');
        }
        return $next($request);
    }
}