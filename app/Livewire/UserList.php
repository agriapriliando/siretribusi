<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public $search = '';
    public $pagelength;

    public function resetSearch()
    {
        $this->reset('search');
    }

    public function delete($id)
    {
        try {
            $user = User::whereId($id)->first();
            $user->delete();
            session()->flash('message', 'Akun ' . $user->name . ' Berhasil Dihapus');
        } catch (\Exception $e) {
            session()->flash($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.user-list', [
            'users' => User::search($this->search)
                ->orderBy('name')
                ->paginate($this->pagelength)
        ]);
    }
}
