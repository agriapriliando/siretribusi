<?php

namespace App\Livewire;

use App\Models\Tenant;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;

class TenantUpdate extends Component
{
    use WithFileUploads;

    public Tenant $tenant;
    #[Locked]
    public $id;
    // #[Validate('required')]
    // #[Validate('numeric')]
    // #[Validate('digits:16', message: 'NIK Harus 16 Digit')]
    public $nik = '';
    // #[Validate('required')]
    public $nama = '';
    // #[Validate('required|min:5')]
    public $alamat = '';
    // #[Validate('required|min:9|numeric')]
    public $nohp = '';
    // #[Validate('nullable|mimes:jpeg,jpg,png|max:512')] // 512Kb Max
    public $file_ktp;
    public $old_file_ktp;

    #[Title('Update Penyewa')]

    public function updated()
    {
        $this->validate();
    }

    public function rules()
    {
        return [
            'nama' => ['required', Rule::unique('tenants')->ignore($this->id)],
            'nohp' => ['required', 'numeric', Rule::unique('tenants')->ignore($this->id)],
            // 'nik' => ['required', 'digits:16', 'numeric', Rule::unique('tenants')->ignore($this->id)],
            'nik' => ['required', 'digits:16', 'numeric'],
            'alamat' => 'required',
            'file_ktp' => 'nullable|mimes:jpeg,jpg,png|max:1024'
        ];
    }


    public function messages()
    {
        return [
            'nik.unique' => 'NIK Sudah Digunakan.',
            'nik.digits' => 'Harus 16 Angka',
            'nama.unique' => 'Nama Sudah Digunakan.',
            'nohp.unique' => 'No HP Sudah Digunakan',
        ];
    }

    // public function updated()
    // {
    //     $this->validate();
    // }

    public function mount(Tenant $tenant)
    {
        $this->id = $tenant->id;
        $this->nik = $tenant->nik;
        $this->nama = $tenant->nama;
        $this->alamat = $tenant->alamat;
        $this->nohp = $tenant->nohp;
        $this->old_file_ktp = $tenant->file_ktp;
    }

    public function update()
    {
        $this->validate();
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
