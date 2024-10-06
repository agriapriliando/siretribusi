<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserCreate extends Component
{
    public User $user;
    public $name, $username, $email, $password, $nohp;

    #[Title('Tambah User')]

    public function updated()
    {
        $this->validateOnly('username');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'unique:users,name'],
            'username' => ['required', 'alpha_dash:ascii', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'nohp' => ['required'],
            'password' => ['required'],
        ];
    }

    public function resetForm()
    {
        $this->reset();
    }

    public function messages()
    {
        return [
            'name.unique' => 'Nama Sudah Digunakan.',
            'username.unique' => 'Username Sudah Digunakan.',
            'username.alpha_dash' => 'Username hanya boleh menggunakan Huruf dan Angka Tanpa Spasi',
            'nohp.required' => 'No HP Harus Diisi',
            'email.unique' => 'Email Sudah Digunakan',
        ];
    }

    public function create()
    {
        // dd($dataUser);
        $this->validate();
        $dataUser = [
            'name' => $this->name,
            'username' => strtolower($this->username),
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'nohp' => $this->nohp
        ];
        try {
            User::create($dataUser);
            session()->flash('message', 'Akun ' . $dataUser['name'] . ' Berhasil Ditambahkan');
            $this->redirect('/user/list');
        } catch (\Exception $e) {
            session()->flash('message', $e->getMessage());
        }
        // $user = User::create();
    }

    public function render()
    {
        return view('livewire.user-create');
    }
}
