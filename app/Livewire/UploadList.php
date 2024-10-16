<?php

namespace App\Livewire;

use App\Models\Proofpayment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;

class UploadList extends Component
{
    use WithPagination;

    public $search = "";
    public $pagelength = 10;
    public $confirmed;
    public $search_confirmed;
    public $bukti;
    public $search_tgl;

    #[Title('List Bukti Bayar')]

    public function resetSearch()
    {
        $this->reset('search', 'search_tgl');
    }

    public function hapusItem($id)
    {
        try {
            $item = Proofpayment::findOrFail($id);
            if (!$item) {
                session()->flash('message', 'Data Item tidak ditemukan');
            } else {
                $item->delete();
                Storage::delete('public/file_bukti/' . $item->file_bukti);
                session()->flash('message', 'Data Item <span class="font-weight-bold">' . $item->nama . '</span> berhasil dihapus');
            }
        } catch (\Exception $ex) {
            session()->flash('message', 'Something goes wrong!!');
        }
    }

    public function ubah_status($id)
    {
        $validator = Auth::user()->name;
        // dd($validator);
        $status = Proofpayment::find($id);
        if ($status->confirmed == 0) {
            $status->update([
                'validator' => $validator,
                'confirmed' => 1,
                'updated_at' => Carbon::now()
            ]);
            session()->flash('message', 'Bukti Bayar <span class="font-weight-bold">' . $status->nama . ' - ' . $status->kode . '</span> VALID');
        } else {
            $status->update([
                'validator' => $validator,
                'confirmed' => 0,
                'updated_at' => Carbon::now()
            ]);
            session()->flash('message', 'Bukti Bayar <span class="font-weight-bold">' . $status->nama . ' - ' . $status->kode . '</span> TIDAK VALID');
        }
    }

    public function lihat_bukti($id)
    {
        $this->bukti = Proofpayment::find($id);
        // dd($this->bukti->users);
    }

    public function render()
    {
        return view('livewire.upload-list', [
            'uploads' => Proofpayment::with('user')->search($this->search)
                ->when($this->search_confirmed, function ($query) {
                    $query->where('confirmed', $this->search_confirmed);
                })
                ->when($this->search_tgl, function ($query) {
                    $query->whereDate('created_at', $this->search_tgl);
                })
                ->orderBy('confirmed')->orderBy('created_at', 'DESC')
                ->paginate($this->pagelength)
        ]);
    }
}
