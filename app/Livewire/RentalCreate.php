<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Rental;
use App\Models\Sector;
use App\Models\Tenant;
use Carbon\Carbon;
use DateTime;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;

class RentalCreate extends Component
{
    public $user_id = 1;
    #[Validate('required', message: 'Pilih Bidang Usaha')]
    public $sector_id;
    #[Validate('required', message: 'Pilih Objek yang disewa')]
    public $item_id;
    #[Validate('required', message: 'Pilih Nama Penyewa')]
    public $tenant_id;
    #[Validate('required', message: 'Merk Usaha harus diisi')]
    public $merk_usaha;
    #[Validate('required')]
    public $tgl_mulai;
    #[Validate('required')]
    public $tgl_selesai;
    #[Validate('required|numeric')]
    public $nominal;
    public $jenis_bayar = 'Tahunan';
    public $status_rental = 'Aktif';
    public $keterangan;
    public $tenants;

    #[Title('Tambah Sewa')]

    public function mount()
    {
        $this->tenants = Tenant::all();
    }

    public function updated($property)
    {
        if ($property == 'tgl_mulai') {
            if ($this->tgl_mulai) {
                $this->tgl_selesai = Carbon::createFromFormat('Y-m-d', $this->tgl_mulai)->addYear()->toDateString();
            }
            // $this->tgl_selesai = $this->tgl_mulai;
        }
    }

    public function create()
    {
        $this->validate();

        $this->tgl_mulai = Carbon::createFromFormat('Y-m-d', $this->tgl_mulai)->toDateString();
        $this->tgl_selesai = Carbon::createFromFormat('Y-m-d', $this->tgl_selesai)->toDateString();

        // $start = new DateTime($this->tgl_mulai);
        // $end = new DateTime($this->tgl_selesai);
        // $diff = $start->diff($end);

        // $yearsInMonths = $diff->format('%r%y') * 12;
        // $months = $diff->format('%r%m');
        // $totalMonths = $yearsInMonths + $months;
        // dd($totalMonths);
        // dd($this->user_id);
        // dd($this->sector_id);
        // dd(Carbon::createFromFormat('Y-m-d', $this->tgl_mulai)->toDateString());
        $datarental = [
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
        DB::transaction(function () use ($datarental) {
            Rental::create($datarental);
            Item::whereId($datarental['item_id'])->update([
                'status' => 'Aktif'
            ]);
        });

        session()->flash('message', 'Data Penyewaan Berhasil Ditambahkan');
        return $this->redirect('/rental/list', navigate: true);
    }

    public function render()
    {
        return view('livewire.rental-create', [
            'items' => Item::orderBy('status', 'DESC')->get(),
            'sectors' => Sector::all(),
        ]);
    }
}
