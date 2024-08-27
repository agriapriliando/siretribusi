<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\Attributes\Locked;

class ItemUpdate extends Component
{
    public $nama, $keterangan, $status;
    #[Locked]
    public $id;
    public Item $item;

    public function mount(Item $item)
    {
        $this->id = $item->id;
        $this->nama = $item->nama;
        $this->keterangan = $item->keterangan;
        $this->status = $item->status;
    }

    public function update()
    {
        // dd($this->item);
        Item::whereId($this->id)->update([
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Item Berhasil Diperbaharui');
        return $this->redirect('/item', navigate: true);
    }

    public function render()
    {
        return view('livewire.item-update', [
            'status' => $this->status,
        ]);
    }
}
