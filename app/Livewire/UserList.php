<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserList extends Component
{
    public $search = '';
    public $pagelength;

    #[Title('List User')]

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
            if ($e->getCode() == 23000) {
                session()->flash('message', 'Akun tidak bisa dihapus, terhubung dengan data validasi bukti pembayaran');
            } else {
                session()->flash('message', $e->getMessage());
            }
        }
    }

    public function render()
    {
        return view('livewire.user-list', [
            'users' => User::withCount('rentals')->where('id', '!=', 6)->where('username', '!=', 'adminvalidasi')->search($this->search)
                ->orderBy('name')
                ->paginate($this->pagelength),
            'adminvalidasi' => User::where('username', 'adminvalidasi')->first()
        ]);
    }
}
