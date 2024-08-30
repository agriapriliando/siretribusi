<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Rental;
use App\Models\Sector;
use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

class RentalUpdate extends Component
{
    public Rental $rental;
    #[Locked]
    public $id;
    public $user_id = 1, $sector_id, $item_id, $tenant_id, $merk_usaha;
    public $tgl_mulai, $tgl_selesai, $nominal, $jenis_bayar = 'Tahunan', $status_rental, $keterangan;
    public $tenants, $items, $sectors;

    #[Title('Update Sewa')]

    public function updated($property)
    {
        $this->validate();
        if ($property == 'tgl_mulai') {
            $this->tgl_selesai = Carbon::createFromFormat('Y-m-d', $this->tgl_mulai)->addYear()->toDateString();
            // $this->tgl_selesai = $this->tgl_mulai;
        }
    }

    public function rules()
    {
        return [
            'user_id' => ['required'],
            'sector_id' => ['required'],
            'item_id' => ['required'],
            'tenant_id' => ['required'],
            'merk_usaha' => ['required'],
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'nominal' => ['required', 'numeric'],
            'status_rental' => 'required'
        ];
    }

    public function mount(Rental $rental)
    {
        $this->tenants = Tenant::all();
        $this->items = Item::orderBy('status', 'DESC')->get();
        $this->sectors = Sector::all();
        $this->id = $rental->id;
        $this->sector_id = $rental->sector_id;
        $this->item_id = $rental->item_id;
        $this->tenant_id = $rental->tenant_id;
        $this->merk_usaha = $rental->merk_usaha;
        $this->tgl_mulai = $rental->tgl_mulai;
        $this->tgl_selesai = $rental->tgl_selesai;
        $this->nominal = $rental->nominal;
        $this->status_rental = $rental->status_rental;
    }

    public function update()
    {
        $this->validate();
        $this->tgl_mulai = Carbon::createFromFormat('Y-m-d', $this->tgl_mulai)->toDateString();
        $this->tgl_selesai = Carbon::createFromFormat('Y-m-d', $this->tgl_selesai)->toDateString();

        $old_item_id = $this->rental->item_id;

        $datarental = [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'sector_id' => $this->sector_id,
            'item_id' => $this->item_id,
            'tenant_id' => $this->tenant_id,
            'merk_usaha' => $this->merk_usaha,
            'tgl_mulai' =>  $this->tgl_mulai,
            'tgl_selesai' =>  $this->tgl_selesai,
            'nominal' => $this->nominal,
            'jenis_bayar' => $this->jenis_bayar,
            'status_rental' => $this->status_rental,
            'keterangan' => $this->keterangan,
        ];
        // dd($datarental);
        DB::transaction(function () use ($datarental, $old_item_id) {
            Rental::whereId($datarental['id'])->update($datarental);
            Item::whereId($old_item_id)->update([
                'status' => 'Non Aktif'
            ]);
            Item::whereId($datarental['item_id'])->update([
                'status' => 'Aktif'
            ]);
        });

        session()->flash('message', 'Data Penyewaan ' . $this->rental->tenant->nama . ' Berhasil Diperbaharui');

        return $this->redirect('/rental/list', navigate: true);
    }

    public function render()
    {
        return view('livewire.rental-update');
    }
}
