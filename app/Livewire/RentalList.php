<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Rental;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class RentalList extends Component
{
    use WithPagination;
    public $search = '';
    public $pagelength;

    #[Title('List Sewa')]

    public function updateSearch()
    {
        $this->reset($this->search);
        $this->goToPage(1);
    }

    public function delete($id)
    {
        // $rental = Rental::whereId($id)->first();
        // dd($rental);
        try {
            $rental = Rental::whereId($id)->first();
            $item = Item::whereId($rental->item_id)->first();
            $item->update([
                'status' => 'Non Aktif'
            ]);
            $rental->delete();
            session()->flash('message', 'Data Penyewaan Berhasil Dihapus, ' . $item->nama . ' dapat disewakan.');
        } catch (\Exception $e) {
            session()->flash('message', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.rental-list', [
            'rentals' => Rental::with('sector', 'item', 'tenant', 'user')
                ->when($this->search, function ($query) {
                    $query->search($this->search);
                })
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
