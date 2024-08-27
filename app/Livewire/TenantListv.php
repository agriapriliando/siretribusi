<?php

namespace App\Livewire;

use App\Models\Tenant;
use Livewire\Component;
use Livewire\WithPagination;

class TenantListv extends Component
{
    use WithPagination;

    public $search = "";
    public $search_namanik = "";
    public $search_nohp = "";
    public $pagelength = 10;

    public function hapusTenant($id)
    {
        try {
            $tenant = Tenant::findOrFail($id);
            if (!$tenant) {
                session()->flash('message', 'Data Penyewa tidak ditemukan');
            } else {
                $tenant->delete();
                session()->flash('message', 'Data Penyewa <span class="font-weight-bold">' . $tenant->nama . '</span> berhasil dihapus');
            }
        } catch (\Exception $ex) {
            session()->flash('message', 'Something goes wrong!!');
        }
    }

    public function render()
    {
        return view('livewire.tenant-listv', [
            'tenants' => Tenant::search($this->search)
                ->when($this->search_namanik, function ($query) {
                    $query->searchnamanik($this->search_namanik);
                })
                ->when($this->search_nohp, function ($query) {
                    $query->where('nohp', 'like', "%" . $this->search_nohp . "%");
                })
                ->paginate($this->pagelength)
        ]);
    }
}
