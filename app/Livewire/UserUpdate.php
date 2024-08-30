<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserUpdate extends Component
{
    public User $user;
    public $name;
    public $username;
    public $email;
    public $password;

    public function mount(User $user)
    {
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
    }

    public function update()
    {
        $dataUser = [
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
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
