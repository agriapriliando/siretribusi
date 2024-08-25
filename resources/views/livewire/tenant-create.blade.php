<div class="site-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline"> <i class="icon-plus"></i>
                    <span>Tambah Data Wajib Retribusi</span>
                </h2>
            </div>
        </div>
        <form wire:submit.prevent="create">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="username">Nama Lengkap</label>
                    <input wire:model.live="nama" type="text" id="username" class="form-control form-control-lg">
                    @error('nama')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="username">NIK</label>
                    <input wire:model.live="nik" type="text" id="username" class="form-control form-control-lg">
                    @error('nik')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="username">No HP</label>
                    <input wire:model.live="nohp" type="text" id="username" class="form-control form-control-lg" inputmode="numeric">
                    <small class="text-muted">Pastikan No Whatsapp Aktif</small>
                    @error('nohp')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Alamat</label>
                    <textarea wire:model="alamat" type="text" id="email" class="form-control form-control-lg"></textarea>
                    @error('alamat')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3 mt-3">
                    @if ($file_ktp)
                        <img class="img-fluid mb-2" src="{{ $file_ktp->temporaryUrl() }}">
                    @endif
                    <div class="custom-file">
                        <input wire:model.live="file_ktp" type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Unggah KTP Berwarna</label>
                    </div>
                    <small>File Max 1Mb atau 1024Kb</small>
                    @error('file_ktp')
                        <div class="alert alert-warning mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 form-group">
                    <input type="submit" value="Tambah" class="btn btn-success btn-lg px-5">
                    <input wire:click.prevent="resetForm" type="button" value="Reset" class="btn btn-warning btn-lg px-5">
                    <a href="{{ url('tenant') }}" wire:navigate class="btn btn-warning btn-lg px-5"><i class="icon-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
