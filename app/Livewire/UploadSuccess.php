<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.appupload')]
class UploadSuccess extends Component
{
    #[Title('Bukti Bayar Sukses')]

    public function render()
    {
        return view('livewire.upload-success');
    }
}
