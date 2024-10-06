<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Topbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $user = User::where('username', 'adminvalidasi')->first();
        if ($user == null) {
            $user = User::where('id', 2)->first();
        }
        return view('components.topbar', compact('user'));
    }
}
