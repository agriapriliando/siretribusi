<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.appupload')]
class UploadSuccess extends Component
{
    #[Title('Bukti Bayar Sukses')]

    public function render()
    {
        $user = User::where('username', 'adminvalidasi')->first();
        if ($user == null) {
            $user = User::where('id', 2)->first();
        }
        return view('livewire.upload-success', [
            'nohp' => $user->nohp
        ]);
    }
}
