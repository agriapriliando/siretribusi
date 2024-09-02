<div class="site-section">
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SUKSES - </strong>{{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row justify-content-center text-center">
            <div class="col-lg-7 mb-5">
                <h2 class="section-title-underline"> <i class="icon-plus"></i>
                    <span>Update Data Validasi Bukti Pembayaran <br>
                        Kode : {{ $proofpayment->kode }}</span>
                </h2>
            </div>
        </div>
        <form wire:submit.prevent="update">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="username">Nama Penyewa</label>
                    <input value="{{ $proofpayment->tenant->nama . ' | ' . $proofpayment->tenant->nohp }}" type="text" id="nama" class="form-control form-control-lg" disabled>
                </div>
                <div class="col-md-6 form-group">
                    <label for="username">Nominal</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                        </div>
                        <input wire:model.live.debounce.500ms="nominal" type="text" inputmode="numeric" class="form-control form-control-lg">
                    </div>
                    @error('nominal')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Keterangan dari Penyewa</label>
                        <textarea wire:model="ket_by_tenant" class="form-control form-control-lg" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="username">Keterangan dari Admin</label>
                        <textarea wire:model="ket_by_admin" class="form-control form-control-lg" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <select wire:model.live="confirmed" class="custom-select custom-select">
                            <option value="1">Valid</option>
                            <option value="0">Belum Valid</option>
                        </select>
                        <div class="mt-2 {{ $confirmed == 0 ? '' : 'd-none' }}">
                            <label for="email">Alasan Tidak Valid</label>
                            <textarea wire:model="keterangan" type="text" id="keterangan" class="form-control form-control-lg" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label for="username">File Bukti</label>
                    <a wire:ignore class="fancy" href="{{ asset('storage/file_bukti/' . $proofpayment->file_bukti) }}"><img src="{{ asset('storage/file_bukti/' . $proofpayment->file_bukti) }}"
                            class="img-fluid" alt=""></a>
                    <input value="Tanggal Upload : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $proofpayment->created_at)->translatedFormat('j M Y H:i') }} Wib" type="text"
                        class="form-control form-control-lg mt-2" disabled>
                </div>
                <div class="col-md-6 form-group d-none">
                    <select wire:model.live="confirmed" class="custom-select custom-select">
                        <option value="1">Valid</option>
                        <option value="0">Belum Valid</option>
                    </select>
                    <div class="mt-2 {{ $confirmed == 0 ? '' : 'd-none' }}">
                        <label for="email">Alasan Tidak Valid</label>
                        <textarea wire:model="keterangan" type="text" id="keterangan" class="form-control form-control-lg" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <input type="submit" value="Update" class="btn btn-success btn-lg px-5">
                    <a href="{{ url('upload/list') }}" wire:navigate class="btn btn-warning btn-lg px-5"><i class="icon-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $(".fancy").fancybox();
            });
        </script>
    @endpush
</div>
