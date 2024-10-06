<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserUpdate extends Component
{
    public User $user;
    public $name;
    public $username;
    public $email;
    public $nohp;
    public $password;

    #[Title('Update User')]

    public function updated()
    {
        $this->validate();
    }

    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('users')->ignore($this->user->id)],
            'username' => ['required', Rule::unique('users')->ignore($this->user->id)],
            'email' => ['required', Rule::unique('users')->ignore($this->user->id)],
            'nohp' => ['required', Rule::unique('users')->ignore($this->user->id)],
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Nama Sudah Digunakan.',
            'username.unique' => 'Username Sudah Digunakan.',
            'email.unique' => 'Email Sudah Digunakan',
            'nohp.unique' => 'No HP Sudah Digunakan',
        ];
    }

    public function mount(User $user)
    {
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->nohp = $user->nohp;
    }

    public function update()
    {
        $this->validate();
        $dataUser = [
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'nohp' => $this->nohp
        ];
        try {
            if ($this->password) {
                $dataUser['password'] = bcrypt($this->password);
                $this->user->update($dataUser);
                session()->flash('message', 'Data Pengguna dan Password Berhasil Diperbaharui');
                $this->reset('password');
            } else {
                $this->user->update($dataUser);
                session()->flash('message', 'Data Pengguna Berhasil Diperbaharui');
            }
        } catch (\Exception $e) {
            session()->flash('message', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.user-update');
    }
}
