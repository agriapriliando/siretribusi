<?php

namespace App\Livewire;

use App\Models\Rental;
use Livewire\Component;

class RentalList extends Component
{
    public $search = '';
    public $pagelength;
    public function render()
    {
        return view('livewire.rental-list', [
            'rentals' => Rental::with('sector', 'item', 'tenant')->search($this->search)
                // ->when($this->search_namanik, function ($query) {
                //     $query->searchnamanik($this->search_namanik);
                // })
                // ->when($this->search_nohp, function ($query) {
                //     $query->where('nohp', 'like', "%" . $this->search_nohp . "%");
                // })
                // ->orderBy('nama')
                ->paginate($this->pagelength)
        ]);
    }
}
