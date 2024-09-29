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
            <p style="text-decoration: underline">Rekening BRI (Bank Rakyat Indonesia) <br>
                An. Dinas Perdagangan, Koperasi, UKM dan Perindustrian Kota Palangka Raya
                <br><span style="font-size: 22px;" class="font-weight-bolder badge badge-success">024301003970307</span>
            </p>
        </div>
        <form wire:submit="create">
            <div class="row">
                <div class="col-md-4 text-center d-none">
                    <img src="{{ asset('assets') }}/images/qrcode.png" style="max-width: 300px;" alt="">
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="username">Isi Keterangan - </label>
                        <textarea wire:model="ket_by_tenant" name="ket_by_tenant" class="form-control" rows=""></textarea>
                        <small class="text-muted">Contoh : Bayar Bulan Maret 2024, Kontainer 01 dan 03</small>
                        @error('ket_by_tenant')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nominal Transfer</label>
                        <small class="text-muted">- Diisi menggunakan Angka Saja</small>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                            </div>
                            <input wire:model.live.debounce.500ms="nominal" type="text" inputmode="numeric" class="form-control">
                        </div>
                        @error('nominal')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2" x-data="{ files: null }">
                        <label for="username">Unggah Bukti Pembayaran</label>
                        <div class="custom-file">
                            <input x-on:change="files = Object.values($event.target.files)" wire:model.live="file_bukti" type="file" class="custom-file-input" id="customFile">
                            <label x-text="files ? files.map(file => file.name).join(', ') : 'Choose single file...'" class="custom-file-label" for="customFile"></label>
                        </div>
                        <small>File Max 1Mb atau 1024Kb | Berbentuk Screenshot / Foto / Gambar</small>
                        @error('file_bukti')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="submit" value="Unggah" class="btn btn-success btn-block px-5">
                    </div>
                </div>
            </div>
        </form>
    </div>
    @push('scripts')
        <script></script>
    @endpush
</div>
