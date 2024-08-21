<div class="container my-4 mb-5">
    <div class="row justify-content-center text-center">
        <div class="col-lg-6 mb-5">
            <h2 data-aos="fade-left" class="section-title-underline">
                <span>Cara Pembayaran Retribusi</span>
            </h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <p>Hai, Andrian. Silahkan melakukan pembayaran melalui QRIS berikut ini sejumlah
                <span style="font-size: 25px;" class="badge badge-warning" id="nilai" data-rupiah="650000">Rp
                    650.000</span>
                <button id="poper" onclick="copyText()" type="button" class="btn btn-sm btn-success" data-toggle="popover" data-content="Copied">
                    Salin Nominal
                </button>
            </p>
        </div>
        <div class="row">
            <div data-aos="fade-right" class="col-md-6 text-center">
                <img src="{{ asset('assets') }}/images/qrcode.png" style="max-width: 300px;" alt="">
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username">Isi Keterangan</label>
                    <input type="text" id="username" class="form-control form-control" placeholder="Contoh : Bayar Bulan Maret 2024, Kontainer 01 dan 03">
                    <small class="text-muted">Contoh : Bayar Bulan Maret 2024, Kontainer 01 dan 03</small>
                </div>
                <div class="mb-2">
                    <label for="username">Unggah Bukti Pembayaran</label>
                    <div class="custom-file">
                        <input onchange="namafile()" type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <small>File Max 1Mb atau 1024Kb</small>
                </div>
                <div>
                    <input type="submit" value="Unggah" class="btn btn-success btn-block px-5">
                </div>
            </div>
        </div>
        <script>
            function namafile() {
                var fileName = document.querySelector("#customFile");
                //replace the "Choose a file" label
                console.log(fileName.files[0].name);
                document.querySelector(".custom-file-label").innerHTML = fileName.files[0].name;
            }

            function copyText() {
                var nilai = document.querySelector("#nilai");
                console.log(nilai.dataset.rupiah);
                navigator.clipboard.writeText(nilai.dataset.rupiah);
                setTimeout(() => {
                    $('#poper').popover('hide')
                }, 2000);
            }
        </script>
    </div>
    <div class="row d-none">
        <div class="col-md-6 form-group">
            <label for="username">Nama Lengkap</label>
            <input type="text" id="username" class="form-control form-control-lg">
        </div>
        <div class="col-md-6 form-group">
            <label for="username">NIK</label>
            <input type="text" id="username" class="form-control form-control-lg">
        </div>
        <div class="col-md-6 form-group">
            <label for="username">No HP</label>
            <input type="text" id="username" class="form-control form-control-lg" inputmode="numeric">
            <small class="text-muted">Pastikan No Whatsapp Aktif</small>
        </div>
        <div class="col-md-6 form-group">
            <label for="email">Alamat</label>
            <textarea type="text" id="email" class="form-control form-control-lg"></textarea>
        </div>
        <div class="col-md-6 mb-3 mt-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Unggah Bukti Bayar</label>
            </div>
            <small>File Max 1Mb atau 1024Kb</small>
        </div>
        <div class="col-md-12 form-group">
            <input type="submit" value="Tambah" class="btn btn-success btn-lg px-5">
            <input type="button" value="Kembali" class="btn btn-warning btn-lg px-5">
        </div>
    </div>
</div>
