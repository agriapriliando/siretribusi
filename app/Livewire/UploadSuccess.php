<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.appupload')]
class UploadSuccess extends Component
{
    public function render()
    {
        return view('livewire.upload-success');
    }
}
