<?php

namespace App\Livewire;

use App\Models\Tenant;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class TenantList extends Component
{
    use WithPagination;

    public $search = "";
    public $search_namanik = "";
    public $search_nohp = "";
    public $pagelength = 10;

    #[Title('List Penyewa')]

    public function resetSearch()
    {
        $this->reset('search');
    }

    public function hapusTenant($id)
    {
        try {
            $tenant = Tenant::findOrFail($id);
            if (!$tenant) {
                session()->flash('message', 'Data Penyewa tidak ditemukan');
            } else {
                $tenant->delete();
                Storage::delete('public/file_ktp/' . $tenant->file_ktp);
                session()->flash('message', 'Data Penyewa <span class="font-weight-bold">' . $tenant->nama . '</span> berhasil dihapus');
            }
        } catch (\Exception $ex) {
            session()->flash('message', 'Something goes wrong!!');
        }
    }

    public function render()
    {
        return view('livewire.tenant-list', [
            'tenants' => Tenant::search($this->search)
                ->when($this->search_namanik, function ($query) {
                    $query->searchnamanik($this->search_namanik);
                })
                ->when($this->search_nohp, function ($query) {
                    $query->where('nohp', 'like', "%" . $this->search_nohp . "%");
                })
                ->orderBy('nama')
                ->paginate($this->pagelength)
        ]);
    }
}
