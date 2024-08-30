<?php

namespace App\Livewire;

use App\Models\Item;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ItemList extends Component
{
    use WithPagination;

    public $search = "";
    public $pagelength = 10;
    public $status;

    #[Title('List Objek Sewa')]

    public function hapusItem($id)
    {
        try {
            $item = Item::findOrFail($id);
            if (!$item) {
                session()->flash('message', 'Data Item tidak ditemukan');
            } else {
                $item->delete();
                session()->flash('message', 'Data Item <span class="font-weight-bold">' . $item->nama . '</span> berhasil dihapus');
            }
        } catch (\Exception $ex) {
            session()->flash('message', 'Something goes wrong!!');
        }
    }

    public function render()
    {
        return view('livewire.item-list', [
            'items' => Item::search($this->search)
                ->when($this->status, function ($query) {
                    $query->where('status', $this->status);
                })
                ->orderBy('status')
                ->paginate($this->pagelength)
        ]);
    }
}
