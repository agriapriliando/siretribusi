<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Isi username terlebih dahulu',
                'password.required' => 'Isi password terlebih dahulu',
            ]
        );
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            session()->regenerate();
            session()->flash('message', 'Anda Berhasil login, Selamat Datang ' . Auth::user()->name);
            return redirect('/');
        } else {
            session()->flash('status', 'Username atau Password Salah!!!');
            return redirect('login');
        }
    }
}
