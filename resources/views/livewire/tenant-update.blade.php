<div class="site-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline"> <i class="icon-plus"></i>
                    <span>Perbaharui Data Wajib Retribusi</span>
                </h2>
            </div>
        </div>
        <form wire:submit.prevent="update">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="username">Nama Lengkap</label>
                    <input wire:model.live="nama" type="text" name="nama" class="form-control">
                    @error('nama')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="username">NIK</label>
                    <input wire:model.live="nik" type="text" name="nik" class="form-control">
                    @error('nik')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="username">No HP</label>
                    <input wire:model.live="nohp" type="text" name="nohp" class="form-control" inputmode="numeric">
                    <small class="text-muted">Pastikan No Whatsapp Aktif</small>
                    @error('nohp')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Alamat</label>
                    <textarea wire:model.live="alamat" type="text" name="alamat" class="form-control"></textarea>
                    @error('alamat')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3 mt-3">
                    @if ($file_ktp)
                        <img @click="$refs.inputname.click()" style="max-width: 250px" class="img-fluid mb-2" src="{{ $file_ktp->temporaryUrl() }}" alt="Logo Preview">
                    @else
                        <img @click="$refs.inputname.click()" style="max-width: 250px" class="img-fluid mb-2" src="{{ asset('storage/file_ktp/' . $old_file_ktp) }}" alt="Logo Preview">
                        <a href="{{ asset('storage/file_ktp/' . $old_file_ktp) }}" target="_blank" class="btn btn-success btn-sm">Lihat</a>
                    @endif
                    <div wire:loading wire:target="file_ktp">
                        <div class="alert alert-warning">Generate Preview</div>
                    </div>
                    <div class="custom-file">
                        <input wire:model.live="file_ktp" type="file" class="custom-file-input" id="file_input">
                        <label x-ref="inputname" class="custom-file-label" for="file_input">Unggah KTP Berwarna</label>
                    </div>
                    <small>File Max 1Mb atau 1024Kb</small>
                    @error('file_ktp')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 form-group">
                    <input type="submit" value="Update" class="btn btn-success btn-lg px-5" {{ $errors->any() ? 'disabled' : '' }}>
                    <a href="{{ url('tenant/' . $id) }}" wire:navigate class="btn btn-warning btn-lg px-5">Reset</a>
                    <a href="{{ url('tenant/list') }}" wire:navigate class="btn btn-warning btn-lg px-5"><i class="icon-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </form>
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SUKSES - </strong>{{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
</div>
