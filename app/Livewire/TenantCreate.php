<?php

namespace App\Livewire;

use App\Models\Tenant;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class TenantCreate extends Component
{
    use WithFileUploads;
    public Tenant $tenant;
    #[Validate('required|min:5|max:16|unique:tenants,nik')]
    public $nik = '';
    // #[Validate('required|min:5|max:16')]
    public $nama = '';
    // #[Validate('required|min:5')]
    public $alamat = '';
    // #[Validate('required|min:5')]
    public $nohp = '';


    #[Validate('image|max:512')] // 512Kb Max
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
        // $this->file_ktp->store(path: 'file_ktp');
        // dd($this->file_ktp->getClientOriginalExtension());
        $nama_file = $this->nik . '.' . $this->file_ktp->getClientOriginalExtension();
        $this->file_ktp->storeAs('file_ktp', $nama_file);
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
