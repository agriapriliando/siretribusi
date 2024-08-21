<div>
    <!-- Button trigger modal -->

    <!-- Modal delete-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Yakin ingin Hapus?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal Lihat-->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Bukti Bayar An. Adrian</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <img src="/images/qrcode.png" alt="" class="img-fluid">
                    <a href="#">Unduh Bukti</a>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select onchange="showKet()" class="form-control" id="exampleFormControlSelect1">
                            <option></option>
                            <option value="1">Valid</option>
                            <option value="0">Tidak Valid</option>
                        </select>
                    </div>
                    <script>
                        function showKet() {
                            var status = document.querySelector("#exampleFormControlSelect1");
                            if (status.value == 1) {
                                document.querySelector("#keterangan").classList.add("d-none");
                            } else {
                                document.querySelector("#keterangan").classList.remove("d-none");
                            }
                        }
                    </script>
                    <div id="keterangan" class="form-group d-none">
                        <label for="keterangan">Alasan Tidak Valid</label>
                        <textarea type="text" id="keterangan" class="form-control form-control-lg"></textarea>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- end modal lihat -->
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline">
                        <span>Menu Validasi Bukti Pembayaran</span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penyewa</th>
                                <th>Keterangan</th>
                                <th>Bukti Bayar</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #beffc8;">
                                <td>1</td>
                                <td>Adrian <a href="#"><i style="color: #009c17;" class="icon-whatsapp"></i></a>
                                </td>
                                <td>Pembayaran Maret April 2024, Kontainer 01 dan 02</td>
                                <td><!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
                                        <i class="icon-eye"></i>
                                    </button>
                                    <span class="btn btn-sm btn-success">Valid</span>
                                </td>
                                <td>
                                    <span class="badge pill-badge badge-warning">Submit 12/2024</span>
                                    <span class="badge pill-badge badge-warning">Update 12/2024 oleh</span>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr style="background-color: #ffbebe;">
                                <td>2</td>
                                <td>Wilona <a href="#"><i style="color: #009c17;" class="icon-whatsapp"></i></a>
                                </td>
                                <td>Pembayaran Maret April 2024, Kontainer 03</td>
                                <td><!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
                                        <i class="icon-eye"></i>
                                    </button>
                                    <span class="btn btn-sm btn-danger">Tidak Valid</span>
                                    <span class="badge pill-badge badge-danger">Alasan : Di Rekening Koran Tidak
                                        Ada</span>
                                </td>
                                <td>
                                    <span class="badge pill-badge badge-warning">Submit 12/2024</span>
                                    <span class="badge pill-badge badge-warning">Update 12/2024 oleh</span>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Penyewa</th>
                                <th>Keterangan</th>
                                <th>Bukti Bayar</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
