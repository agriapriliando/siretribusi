<div class="site-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline"> <i class="icon-plus"></i>
                    <span>Tambah Data Transaksi Sewa</span>
                </h2>
            </div>
        </div>
        <form wire:submit.prevent="create">
            <div class="row">
                <div class="col-md-6 form-group">
                    <div wire:ignore>
                        <label>Pilih Wajib Retribusi</label>
                        <select wire:model.live="tenant_id" class="form-select w-100" id="penyewa" name="tenant_id" data-placeholder="Cari Nama/ No Hp" required>
                            <option>Pilih Penyewa</option>
                            @foreach ($tenants as $t)
                                <option value="{{ $t->id }}">{{ $t->nama }} - {{ $t->nohp }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('tenant_id')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <div wire:ignore>
                        <label>Pilih Objek Sewa</label>
                        <select wire:model="item_id" class="form-select w-100" id="objeksewa" name="item_id" data-placeholder="Cari Lokasi" required>
                            <option>Pilih Objek Sewa</option>
                            @foreach ($items as $i)
                                <option value="{{ $i->id }}" {{ $i->status == 'Aktif' ? 'disabled' : '' }}>{{ $i->nama }} {{ $i->status == 'Aktif' ? ' - Aktif' : '' }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('item_id')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <div wire:ignore>
                        <label>Bidang</label>
                        <select wire:model="sector_id" class="form-select w-100" id="sector" name="sector_id" data-placeholder="Pilih Bidang" required>
                            <option>Pilih Bidang Usaha</option>
                            @foreach ($sectors as $s)
                                <option value="{{ $s->id }}">{{ $s->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('sector_id')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label>Merk Usaha</label>
                    <input wire:model.live="merk_usaha" type="text" id="merk_usaha" class="form-control ">
                    <small class="text-muted">Contoh : Warung Bahagia, Rumah Makan Sejahtera</small>
                    @error('merk_usaha')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label>Tanggal Mulai</label>
                    <input wire:model.live="tgl_mulai" type="date" class="form-control">
                    @error('tgl_mulai')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div x-data="{ accept: false }" class="col-md-6 form-group">
                    <label>Tanggal Berakhir</label>
                    <div class="float-right">
                        <input type="checkbox" x-model="accept"> Ganti Tanggal Berakhir
                    </div>
                    <input wire:model.live="tgl_selesai" type="date" class="form-control" x-bind:disabled="!accept">
                    @error('tgl_selesai')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label>Biaya Sewa Bulanan</label>
                    <small class="text-muted">- Diisi menggunakan Angka Saja</small>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                        </div>
                        <input x-mask="9999999" wire:model.live="nominal" type="text" inputmode="numeric" class="form-control">
                    </div>
                    @error('nominal')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label>Keterangan</label>
                    <textarea wire:model="keterangan" rows="5" class="form-control"></textarea>
                    <small class="text-muted">Isi jika diperlukan</small>

                </div>
                <div class="col-md-12 form-group">
                    <input type="submit" value="Tambah" class="btn btn-success btn-lg px-5" wire:loading.attr="disabled">
                    {{-- <input type="submit" value="Tambah" class="btn btn-success btn-lg px-5" {{ $errors->any() ? 'disabled' : '' }}> --}}
                    {{-- <input wire:click.prevent="resetForm" type="button" value="Reset" class="btn btn-warning btn-lg px-5"> --}}
                    <a href="{{ url('rental/list') }}" wire:navigate class="btn btn-warning btn-lg px-5"><i class="icon-arrow-left"></i> Kembali</a>
                </div>
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                        <strong>SUKSES - </strong>{!! session('message') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </form>
    </div>
    @assets
        <link rel="stylesheet" href="{{ asset('assets') }}/js/select2/select2.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/js/select2/select2-bootstrap4.min.css">
    @endassets
    @push('scripts')
        <script src="{{ asset('assets') }}/js/select2/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#penyewa').select2({
                    theme: "bootstrap4",
                }).on('change', function(event) {
                    // var data = $('#penyewa').select2("val");
                    console.log(event.target.value);
                    @this.set('tenant_id', event.target.value);
                });
                $('#objeksewa').select2({
                    theme: "bootstrap4",
                }).on('change', function(event) {
                    console.log(event.target.value);
                    @this.set('item_id', event.target.value);
                });
                $('#sector').select2({
                    theme: "bootstrap4",
                }).on('change', function(event) {
                    console.log(event.target.value);
                    @this.set('sector_id', event.target.value);
                });
                // $('#penyewa').select2({
                //     theme: "bootstrap4",
                //     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                //     placeholder: $(this).data('placeholder'),
                // });
                // $('#objeksewa').select2({
                //     theme: "bootstrap4",
                //     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                //     placeholder: $(this).data('placeholder'),
                // });
                // $('#bidang').select2({
                //     theme: "bootstrap4",
                //     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                //     placeholder: $(this).data('placeholder'),
                // });
                $('[data-toggle="popover"]').popover({
                    trigger: 'focus'
                })
            });
        </script>
    @endpush
</div>
