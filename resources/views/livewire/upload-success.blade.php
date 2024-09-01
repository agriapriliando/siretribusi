<div class="container my-4 mb-5">
    <div class="row justify-content-center text-center">
        <div class="col-lg-6 mb-1">
            <h2 data-aos="fade-up" class="section-title-underline">
                @if (session('success'))
                    <span>{!! session('success') !!}</span>
                @else
                    <span>Unggah Bukti Pembayaran Berhasil</span>
                @endif
            </h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col text-center">
            <p data-aos="fade-up">Terima kasih. Klik Tombol Berikut untuk melakukan konfirmasi.</p>
            <a data-aos="fade-up" class="btn btn-success btn-lg"
                href="https://api.whatsapp.com/send?phone={{ $nohp }}&text=Konfirmasi%20Bukti%20Pembayaran%20Retribusi%20An.%20{{ session('nama') }}%20-%20Kode%20Bayar%20{{ session('kode') }}.%20Terima%20kasih."
                target="_blank"><i class="icon-whatsapp"></i> Konfirmasi ke
                Whatsapp</a>
        </div>
    </div>
</div>
