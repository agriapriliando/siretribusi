<?php

namespace App\Livewire;

use App\Models\Tenant;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class TenantCreate extends Component
{
    use WithFileUploads;
    public Tenant $tenant;
    #[Validate('required|min:16|max:16|unique:tenants,nik')]
    public $nik = '';
    #[Validate('required')]
    public $nama = '';
    #[Validate('required|min:5')]
    public $alamat = '';
    #[Validate('required|min:9|numeric')]
    public $nohp = '';
    #[Validate('required|mimes:jpeg,jpg,png|max:512')] // 512Kb Max
    public $file_ktp;

    public function resetForm()
    {
        $this->nik = '';
        $this->nama = '';
        $this->alamat = '';
        $this->nohp = '';
        $this->file_ktp = '';
    }

    public function create()
    {
        $this->validate();
        // $this->file_ktp->store(path: 'file_ktp');
        // dd($this->file_ktp->getClientOriginalExtension());
        $nama_file = date('mYdHis_') . $this->nik . '.' . $this->file_ktp->getClientOriginalExtension();
        $this->file_ktp->storeAs('public/file_ktp', $nama_file);
        // dd($this->file_ktp);
        Tenant::insert([
            'id' => Str::uuid(),
            'nik' => $this->nik,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'nohp' => $this->nohp,
            'file_ktp' => $nama_file,
        ]);

        session()->flash('message', 'Data Penyewa ' . $this->nama . ' Berhasil Ditambahkan');

        return $this->redirect('/tenant/list', navigate: true);
    }

    public function render()
    {
        return view('livewire.tenant-create');
    }
}
