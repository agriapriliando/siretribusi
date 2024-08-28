<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ItemCreate extends Component
{
    public $status, $keterangan;
    #[Validate('required|unique:items,nama')]
    public $nama = '';

    public function resetform()
    {
        $this->nama = '';
        $this->keterangan = '';
    }

    public function updated($property)
    {
        if ($property == 'nama') {
            $this->keterangan = $this->nama;
        }
    }

    public function create()
    {
        $this->validate();
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
