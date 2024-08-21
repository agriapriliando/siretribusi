<div class="site-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline">
                    <span>Daftar Penyewa / Wajib Retribusi</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ url('tenant/create') }}" wire:navigate class="btn btn-success mb-2"><i class="icon-plus"></i> Tambah</a>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Andrea <br>
                                <div class="badge badge-pill badge-warning">NIK : 6278976876876</div>
                            </td>
                            <td><a href="#" class="btn btn-sm btn-success"><i class="icon-whatsapp"></i>
                                    085249441182</a>
                            </td>
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
                            <td>Harton <br>
                                <div class="badge badge-pill badge-warning">NIK : 62832937829836</div>
                            </td>
                            <td><a href="#" class="btn btn-sm btn-success"><i class="icon-whatsapp"></i>
                                    086223492874</a>
                            </td>
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
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
