<div class="container my-4 mb-5 px-5">
    <div class="row justify-content-center text-center">
        <div class="col-lg-6 mb-5">
            <h2 data-aos="fade-left" class="section-title-underline">
                <span>Cara Pembayaran Retribusi</span>
            </h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 text-center mb-1">
            <p class="">Hai, <span style="font-size: 22px;" class="font-weight-bolder badge badge-success">{{ $tenant->nama }}
                </span> Silahkan melakukan pembayaran sejumlah nomimal yang tertera pada pesan Whatsapp melalui TRANSFER BANK, lalu Unggah/Upload Screenshot/Foto Bukti Pembayaran. Terima Kasih.
            </p>
            <style>
                .pointercursor {
                    cursor: pointer;
                }
            </style>
            <p x-data="{ input: '024301003970307', showMsg: false }" style="font-size: 22px;" class="font-weight-bolder">Rekening BRI (Bank Rakyat Indonesia) <br>
                An. Dinas Perdagangan, Koperasi, UKM dan Perindustrian Kota Palangka Raya
                <br><span @click="navigator.clipboard.writeText(input), showMsg = true, setInterval(() => showMsg = false, 2000)" style="font-size: 22px;"
                    class="pointercursor font-weight-bolder badge badge-success">No Rekening : 024301003970307 <i class="icon-copy"></i></span><br>
                <span x-show="showMsg" @click.away="showMsg = false" class="badge badge-success">No Rekening Copied</span>
            </p>
        </div>
        <form wire:submit="create">
            <div class="row">
                <div class="col-md-4 text-center d-none">
                    <img src="{{ asset('assets') }}/images/qrcode.png" style="max-width: 300px;" alt="">
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="username">Isi Keterangan</label>
                        <textarea wire:model="ket_by_tenant" name="ket_by_tenant" class="form-control" rows=""></textarea>
                        <small class="text-muted">Contoh : Bayar Bulan Maret 2024, Kontainer 01 dan 03</small>
                        @error('ket_by_tenant')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Nominal Transfer</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                            </div>
                            <input wire:model.live.debounce.500ms="nominal" type="text" inputmode="numeric" class="form-control">
                        </div>
                        <small class="text-muted">Diisi menggunakan Angka Saja</small>
                        @error('nominal')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2" x-data="{ files: null }">
                        <label for="customFile">Unggah Bukti Pembayaran</label>
                        <div wire:loading wire:target="file_bukti" class="alert alert-warning">Tunggu, Sedang Memerika File....</div>
                        <div class="custom-file">
                            <input x-on:change="files = Object.values($event.target.files)" wire:model.live="file_bukti" type="file" class="custom-file-input" id="customFile">
                            <label x-text="files ? files.map(file => file.name).join(', ') : 'Pilih File'" class="custom-file-label" for="customFile"></label>
                        </div>
                        <small>File Max 1,5Mb atau 1500Kb | Berbentuk Screenshot / Foto / Gambar</small>
                        @error('file_bukti')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                        @if ($file_bukti)
                            <img class="img-fluid my-2" src="{{ $file_bukti->temporaryUrl() }}">
                        @endif
                    </div>
                    <div>
                        <input type="submit" value="Unggah Bukti" class="btn btn-success btn-block px-5" wire:loading.attr="disabled" wire:target="file_bukti"
                            @if ($errors->any()) disabled @endif>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @push('scripts')
        <script></script>
    @endpush
</div>
