<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FunctionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends FunctionController
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $cekAbsen = $this->cekAbsen();
            if ($cekAbsen['status']) {
                Session::put('id_absent', $cekAbsen['dataAbsen']->id);
                Session::put('id_store', $cekAbsen['dataAbsen']->id_store);
                Session::put('name_store', $cekAbsen['dataAbsen']->name);
                Session::put('status', $cekAbsen['dataAbsen']->status);
            }   
            Session::put('role', $user->level);  // Menyimpan role ke session
            return redirect()->intended('/dashboard');
        }

        return redirect('loginform')->withErrors('Login details are not valid');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginform');
    }
}
