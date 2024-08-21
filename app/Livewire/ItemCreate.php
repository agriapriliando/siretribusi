<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class ItemCreate extends Component
{
    public $nama, $status, $keterangan;

    public function resetform()
    {
        $this->nama = '';
        $this->keterangan = '';
    }

    public function create()
    {
        Item::insert([
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,
            'status' => 'Non Aktif',
        ]);

        session()->flash('message', 'Item Sewa Berhasil Ditambahkan');
        $this->resetform();
    }

    public function render()
    {
        return view('livewire.item-create');
    }
}
