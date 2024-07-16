<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class IsSalesTo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Anda Belum Masuk, Silahkan Masuk Terlebih dahulu');
        }
        if (Auth::user()->level == 1 || Auth::user()->level == 2) {
            return $next($request);
        }
        return redirect('/')->with('error', 'You do not have permission to access.');
    }
}
