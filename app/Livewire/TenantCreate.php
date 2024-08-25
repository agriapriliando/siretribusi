<?php

namespace App\Livewire;

use App\Models\Tenant;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class TenantCreate extends Component
{
    use WithFileUploads;
    public ?Tenant $tenant;
    #[Validate('required|min:5|unique:tenants,nik')]
    public $nik = '';
    // #[Validate('required|min:5')]
    public $nama = '';
    // #[Validate('required|min:5')]
    public $alamat = '';
    // #[Validate('required|min:5')]
    public $nohp = '';


    #[Validate('image|max:2048')] // 1MB Max
    public $file_ktp;

    // protected $rules = [
    //     'nik' => 'required|unique:tenants,nik',
    // ];

    // public function rules()
    // {
    //     return [
    //         'nik' => [
    //             'required',
    //             Rule::unique('tenants')->ignore($this->tenant),
    //         ],
    //     ];
    // }

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
        $this->file_ktp->store(path: 'file_ktp');
        dd($this->file_ktp);
        Tenant::insert([
            'id' => Str::uuid(),
            'nik' => $this->nik,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'nohp' => $this->nohp,
            'file_ktp' => $this->file_ktp,
        ]);
    }

    public function render()
    {
        return view('livewire.tenant-create');
    }
}
