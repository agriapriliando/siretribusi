<div class="site-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline">
                    <span>Daftar Transaksi</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ url('rental/create') }}" wire:navigate class="btn btn-success mb-2"><i class="icon-plus"></i> Tambah</a>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Objek - Bidang</th>
                            <th>Nama | Merk</th>
                            <th>Kirim</th>
                            <th>Masa Sewa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Kontainer 01 - Kuliner</td>
                            <td>Andrea <br>
                                <div class="badge badge-pill badge-warning">Warung Sejahtera</div>
                            </td>
                            <td><a href="#" class="btn btn-sm btn-success"><i class="icon-whatsapp"></i>
                                    Klik WA</a>
                            </td>
                            <td>12/2024 sd 12/2025</td>
                            <td>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-sm btn-warning mr-1"><i class="icon-pencil"></i></a>
                                    <form action="">
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="icon-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kontainer 02 - Kuliner</td>
                            <td>Andro <br>
                                <div class="badge badge-pill badge-warning">Warung Bahagi</div>
                            </td>
                            <td><a href="#" class="btn btn-sm btn-success"><i class="icon-whatsapp"></i>
                                    Klik WA</a>
                            </td>
                            <td>12/2024 sd 12/2025</td>
                            <td>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-sm btn-warning mr-1"><i class="icon-pencil"></i></a>
                                    <form action="">
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="icon-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Objek</th>
                            <th>Nama | Merk</th>
                            <th>Kirim</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
