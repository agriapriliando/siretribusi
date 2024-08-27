<?php

namespace App\Livewire;

use App\Models\Tenant;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class TenantUpdate extends Component
{
    use WithFileUploads;

    public Tenant $tenant;
    #[Locked]
    public $id;
    #[Validate('required|min:16|max:16|unique:tenants,nik')]
    public $nik = '';
    #[Validate('required')]
    public $nama = '';
    #[Validate('required|min:5')]
    public $alamat = '';
    #[Validate('required|min:9|numeric')]
    public $nohp = '';
    #[Validate('required|mimes:jpeg,jpg,png|max:512')] // 512Kb Max
    public $file_ktp = '';
    public $old_file_ktp;

    public function mount(Tenant $tenant)
    {
        $this->id = $tenant->id;
        $this->nik = $tenant->nik;
        $this->nama = $tenant->nama;
        $this->alamat = $tenant->alamat;
        $this->nohp = $tenant->nohp;
        $this->old_file_ktp = $tenant->file_ktp;
    }

    public function download()
    {
        return response()->download(storage_path('app/file_ktp/' . $this->file_ktp));
        // return Storage::disk('local')->download(storage_path('file_ktp/' . $this->file_ktp));
    }

    public function update()
    {
        if ($this->file_ktp) {
            Storage::delete('public/file_ktp/' . $this->old_file_ktp);
            $nama_file = date('mYdHis_') . $this->nik . '.' . $this->file_ktp->getClientOriginalExtension();
            $this->file_ktp->storeAs('public/file_ktp', $nama_file);
            Tenant::whereId($this->id)->update([
                'file_ktp' => $nama_file,
            ]);
        }
        // dd($this->item);
        Tenant::whereId($this->id)->update([
            'nik' => $this->nik,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'nohp' => $this->nohp,
        ]);

        session()->flash('message', 'Tenant Berhasil Diperbaharui');
    }

    public function render()
    {
        return view('livewire.tenant-update', [
            'old_file_ktp' => $this->old_file_ktp
        ]);
    }
}
