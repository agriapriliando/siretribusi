<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class ItemList extends Component
{
    public $items, $item, $nama, $keterangan;

    public function resetform()
    {
        $this->nama = '';
        $this->keterangan = '';
    }

    public function hapusItem($id)
    {
        try {
            $item = Item::findOrFail($id);
            if (!$item) {
                session()->flash('message', 'Item tidak ditemukan');
            } else {
                $item->delete();
                session()->flash('message', 'Item berhasil dihapus');
                $this->js('window.location.reload()');
            }
        } catch (\Exception $ex) {
            session()->flash('message', 'Something goes wrong!!');
        }
    }

    public function render()
    {
        $this->items = Item::orderBy('id', 'DESC')->get();
        return view('livewire.item-list');
    }
}
