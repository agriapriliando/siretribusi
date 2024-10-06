<div class="site-section">
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SUKSES - </strong>{!! session('message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row justify-content-center text-center">
            <div class="col-lg-6 mb-2">
                <h2 class="section-title-underline">
                    <span>Daftar Transaksi</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row d-md-flex justify-content-end">
                    <div class="col-12 col-md-2">
                        <a href="{{ url('rental/create') }}" class="btn btn-success mb-3 mr-2 float-right"><i class="icon-plus"></i> Tambah</a>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="text" wire:model.live.debounce.400ms="search" class="form-control w-100 mr-2 mb-2" placeholder="Pencarian">
                    </div>
                    <div class="col-12 col-md-2 form-group">
                        <select wire:model.live="pagelength" class="form-control" id="exampleFormControlSelect1">
                            <option value="10">Lihat 10</option>
                            <option value="20">Lihat 20</option>
                            <option value="500">Lihat Semua</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Objek - Bidang</th>
                                <th>Nama | Merk</th>
                                <th>Status</th>
                                <th>Masa Sewa</th>
                                <th class="d-print-none">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentals as $r)
                                <tr>
                                    <td>{{ ($rentals->currentpage() - 1) * $rentals->perpage() + $loop->index + 1 }}</td>
                                    <td>{{ $r->item->nama . ' - ' . $r->sector->nama }} <br>@currency($r->nominal)/bln
                                    </td>
                                    <td>{{ $r->tenant->nama }}<br>
                                        <div class="badge badge-pill badge-warning">{{ $r->merk_usaha }}</div>
                                    </td>
                                    <td>
                                        <div class="badge badge-pill badge-{{ $r->status_rental == 'Aktif' ? 'success' : 'danger' }}">{{ $r->status_rental }}</div>
                                        @if ($r->status_rental == 'Aktif')
                                            <a target="_blank"
                                                href="https://api.whatsapp.com/send/?phone={{ $r->tenant->nohp }}&text=Hai%20{{ $r->tenant->nama }}%2C%20segera%20lakukan%20Pembayaran%20Retribusi%20{{ $r->item->nama }}%2C%0ASejumlah%20Rp%20%3A%20{{ $r->nominal }}%20untuk%20Bulan%20{{ \Carbon\Carbon::now()->format('M-Y') }}%0ASebelum%20Jatuh%20Tempo%20{{ \Carbon\Carbon::parse($r->tgl_mulai)->addDays(9)->format('d') .'-' .\Carbon\Carbon::now()->format('M-Y') }}%0AUnggah%20bukti%20pembayaran%20melalui%20link%20berikut%20ini.%0A%0A{{ url('upload/' . $r->tenant_id) }}%0A%0ATerima%20Kasih."
                                                class="btn btn-sm btn-success"><i class="icon-whatsapp"></i>
                                                Klik WA</a>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $r->tgl_mulai)->translatedFormat('j/m/Y') }}
                                        sd {{ \Carbon\Carbon::createFromFormat('Y-m-d', $r->tgl_selesai)->translatedFormat('j/m/Y') }}
                                        @if ($r->status_rental == 'Aktif')
                                            <br>
                                            Jatuh Tempo : {{ \Carbon\Carbon::parse($r->tgl_mulai)->addDays(9)->format('d') .'-' .\Carbon\Carbon::now()->format('M-Y') }}
                                        @endif
                                    </td>
                                    <td class="d-print-none">
                                        <div class="d-flex">
                                            <a href="{{ url('rental/' . $r->id) }}" class="btn btn-sm btn-warning mr-1"><i class="icon-pencil"></i></a>
                                            <button wire:click.prevent="delete({{ $r->id }})" wire:confirm="Yakin ingin menghapus data Penyewaan? Data yang terhapus tidak bisa dipulihkan."
                                                type="submit" class="btn btn-sm btn-danger"><i class="icon-trash"></i></button>
                                        </div>
                                        <style>
                                            .pop {
                                                position: absolute;
                                                display: none;
                                                top: 34px;
                                                left: -30px;
                                                background-color: aliceblue;
                                            }

                                            .pophover:hover .pop {
                                                display: block
                                            }
                                        </style>
                                        <div style="font-size:15px; line-height: 1.1; position: relative" class="mt-1 pophover">Last Update<br>by {{ $r->user->name }}
                                            <span class="pop badge badge-warning">{{ $r->updated_at->format('d/m/Y H:i') }} Wib</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Objek</th>
                                <th>Nama | Merk</th>
                                <th>Kirim Pesan</th>
                                <th>Tanggal</th>
                                <th class="d-print-none">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {{ $rentals->links() }}
            </div>
        </div>
    </div>
</div>
