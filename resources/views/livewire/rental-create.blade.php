<div class="site-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline"> <i class="icon-plus"></i>
                    <span>Tambah Data Transaksi Sewa</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="username">Pilih Wajib Retribusi</label>
                <select class="form-select" id="penyewa" data-placeholder="Cari Nama/ No Hp">
                    <option></option>
                    <option>Andrea - 09182328923</option>
                    <option>Dudu - 09823838333</option>
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="username">Pilih Objek Sewa</label>
                <select class="form-select" id="objeksewa" data-placeholder="Cari Lokasi">
                    <option></option>
                    <option disabled="disabled">Kontainer 01 - Sedang Aktif</option>
                    <option>Kontainer 02</option>
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="username">Bidang</label>
                <select class="form-select" id="bidang" data-placeholder="Pilih Bidang">
                    <option>Kuliner</option>
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="username">Merk Usaha</label>
                <input type="text" id="merk_usaha" class="form-control ">
                <small class="yexy-muted">Contoh : Warung Bahagia, Rumah Makan Sejahtera</small>
            </div>
            <div class="col-md-6 form-group">
                <label for="username">Tanggal Mulai</label>
                <input type="date" id="username" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label for="username">Tanggal Berakhir</label>
                <input type="date" id="username" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label for="username">Biaya Sewa Bulanan</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Rp</span>
                    </div>
                    <input type="text" inputmode="numeric" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-12 form-group">
                <input type="submit" value="Tambah" class="btn btn-success btn-lg px-5">
                <input type="button" value="Kembali" class="btn btn-warning btn-lg px-5">
            </div>
        </div>
    </div>
</div>
