<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required')]
    public $username;
    #[Validate('required')]
    public $password;

    public function login()
    {
        $this->validate();
        $credentials = [
            'username' => $this->username,
            'password' => $this->password
        ];
        if (Auth::attempt($credentials)) {
            session()->regenerate();
            session()->flash('message', 'Anda Berhasil login, Selamat Datang');
            $this->redirect('/');
        } else {
            session()->flash('message', 'Username atau Password Salah!!!');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
