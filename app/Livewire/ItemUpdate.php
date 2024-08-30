<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

class ItemUpdate extends Component
{
    public $keterangan, $status;
    public Item $item;
    public $nama;
    #[Locked]
    public $id;

    #[Title('Update Objek Sewa')]

    public function mount(Item $item)
    {
        $this->id = $item->id;
        $this->nama = $item->nama;
        $this->keterangan = $item->keterangan;
        $this->status = $item->status;
    }

    protected function rules()
    {
        return [
            'nama' => 'required|unique:items,nama,' . $this->id,
        ];
    }

    public function updated($prop)
    {
        $this->validate();
    }

    public function update()
    {
        // dd($this->item);
        $this->validate();
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
