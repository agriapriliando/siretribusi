<?php

namespace App\Livewire;

use App\Models\Proofpayment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UploadUpdate extends Component
{
    public $id;
    #[Validate('numeric')]
    public $nominal;
    public $nama, $ket_by_tenant, $ket_by_admin, $confirmed, $alasan;
    public $proofpayment;

    public function mount($id)
    {
        $this->proofpayment = Proofpayment::with('user')->whereId($id)->first();
        $this->nama = $this->proofpayment->nama;
        $this->ket_by_tenant = $this->proofpayment->ket_by_tenant;
        $this->ket_by_admin = $this->proofpayment->ket_by_admin;
        $this->nominal = $this->proofpayment->nominal;
        $this->confirmed = $this->proofpayment->confirmed;
        $this->alasan = $this->proofpayment->alasan;
    }

    public function update()
    {
        $this->validate();
        $dataUpload = [
            'validator' => Auth::user()->name,
            'ket_by_tenant' => $this->ket_by_tenant,
            'ket_by_admin' => $this->ket_by_admin,
            'nominal' => $this->nominal,
            'confirmed' => $this->confirmed,
            'alasan' => $this->alasan,
        ];
        // dd($dataUpload);
        try {
            $this->proofpayment->update($dataUpload);
            session()->flash('message', 'Data Bukti Pembayaran Berhasil Diperbaharui');
            $this->redirect('/upload/list');
        } catch (\Exception $e) {
            session()->flash($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.upload-update', [
            'proofpayment' => $this->proofpayment
        ]);
    }
}
