<?php

namespace App\Livewire;

use App\Models\Tenant;
use Livewire\Component;

class TenantList extends Component
{
    public $tenants, $tenant;

    public function hapusTenant($id)
    {
        try {
            $tenant = Tenant::findOrFail($id);
            if (!$tenant) {
                session()->flash('message', 'Data Penyewa tidak ditemukan');
            } else {
                $tenant->delete();
                session()->flash('message', 'Data Penyewa berhasil dihapus');
                $this->js('window.location.reload()');
            }
        } catch (\Exception $ex) {
            session()->flash('message', 'Something goes wrong!!');
        }
    }

    public function render()
    {
        $this->tenants = Tenant::orderby('nama')->get();
        return view('livewire.tenant-list');
    }
}
