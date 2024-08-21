<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.appupload')]
class UploadBukti extends Component
{
    public function render()
    {
        return view('livewire.upload-bukti');
    }
}
