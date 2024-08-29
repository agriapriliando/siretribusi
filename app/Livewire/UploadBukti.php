<?php

namespace App\Livewire;

use App\Models\Proofpayment;
use App\Models\Tenant;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

#[Layout('components.layouts.appupload')]
class UploadBukti extends Component
{
    use WithFileUploads;

    public $kode = '';
    public $user_id;
    #[Validate('required', message: "Keterangan Tidak Boleh Kosong")]
    public $ket_by_tenant;
    public $ket_by_admin;
    #[Validate('required', message: "Nominal Tidak Boleh Kosong")]
    #[Validate('numeric', message: "Isi dengan angka saja")]
    public $nominal;
    #[Validate('required', message: "Silahkan Pilih Bukti Pembayaran")]
    #[Validate('mimes:jpeg,jpg,png', message: "Tipe File Harus Berbentuk Foto / Gambar")]
    #[Validate('max:1024', message: "Ukuran Maksimal 1 Mb atau 1024 Kb")]
    public $file_bukti;
    public $confirmed;
    public $tenant;

    public function mount($id, $user_id)
    {
        $this->kode = $id;
        $this->$user_id = $user_id;
        $this->tenant = Tenant::whereId($id)->first();
        // dd($this->tenant->nama);
    }
    public function create()
    {
        $this->validate();
        $kode_unik = Carbon::now()->format('dmY') . rand(100, 999);
        $nama_file = strtolower(trim($this->tenant->nama)) . date('mYdHis_') . '.' . $this->file_bukti->getClientOriginalExtension();
        $nama_file = str_replace(' ', '', $nama_file); // Replaces all spaces with hyphens.
        $nama_file = preg_replace('/[^A-Za-z0-9\-]/', '', $nama_file); // Removes special chars.
        $this->file_bukti->storeAs('public/file_bukti', $nama_file);
        $dataProof = [
            'user_id' => $this->user_id,
            'tenant_id' => $this->kode,
            'kode' => $kode_unik,
            'nama' => $this->tenant->nama,
            'nohp' => $this->tenant->nohp,
            'ket_by_tenant' => $this->ket_by_tenant,
            'nominal' => $this->nominal,
            'file_bukti' => $nama_file,
            'confirmed' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        // dd($dataProof);
        Proofpayment::insert($dataProof);

        session()->flash('message', 'Bukti Pembayaran <span class="font-weight-bold bg-warning">' . $kode_unik . '</span> An. ' . $this->tenant->nama . ' Berhasil Diunggah');

        return $this->redirect('/upload/success', navigate: true);
    }

    public function render()
    {
        // dd($this->kode);
        return view('livewire.upload-bukti');
    }
}
