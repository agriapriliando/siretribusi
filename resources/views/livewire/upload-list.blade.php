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
    @if ($bukti)
        <div wire:ignore.self class="modal fade" id="myModal">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Bukti Bayar : {{ $bukti->nama }} | {{ $bukti->ket_by_tenant }}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <img src="{{ asset('storage/file_bukti/' . $bukti->file_bukti) }}" alt="" class="img-fluid">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a class="btn btn-success" href="{{ asset('storage/file_bukti/' . $bukti->file_bukti) }}" download>Unduh Bukti</a>
                        <a target="_blank" class="btn btn-success" href="{{ asset('storage/file_bukti/' . $bukti->file_bukti) }}">Open New Tab</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    @endif
    <!-- end modal lihat -->
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
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline">
                        <span>Menu Validasi Bukti Pembayaran</span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row d-flex justify-content-end d-print-none">
                        <div class="col-12 col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" wire:model.live.debounce.500ms="search" class="form-control" placeholder="Pencarian">
                                <div class="input-group-append">
                                    <button wire:click="resetSearch" class="input-group-text" id="basic-addon2">Reset</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <select wire:model.live="search_confirmed" class="form-control">
                                    <option value="">Semua Status</option>
                                    <option value="1">Valid</option>
                                    <option value="FALSE">Belum Valid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-md-2">
                            <div class="form-group">
                                <select wire:model.live="pagelength" class="form-control">
                                    <option value="10">Lihat 10</option>
                                    <option value="20">Lihat 20</option>
                                    <option value="500">Lihat Semua</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Wajib Retribusi | Kode Bayar</th>
                                    <th class="d-print-none">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($uploads as $item)
                                    <tr wire:key={{ $item->id }} style="background-color: {{ $item->confirmed == 1 ? '#beffc8' : '#ffbebe' }};">
                                        <td class="d-flex flex-column">
                                            <div class="font-weight-bold mb-1">
                                                {{ ($uploads->currentpage() - 1) * $uploads->perpage() + $loop->index + 1 }}.
                                                {{ $item->nama }} <span class="d-inline bg-warning px-1 pb-1 rounded">{{ $item->kode }}</span>
                                            </div>
                                            <div class="bg-primary text-white px-2 pb-1 rounded mb-1" style="font-size: 18px">
                                                Nominal @currency($item->nominal) - {{ Str::limit($item->ket_by_tenant, 60, '...') }}
                                            </div>
                                            <div class="d-print-none">
                                                <a href="{{ url('upload/update/' . $item->id) }}" wire:navigate class="btn btn-success btn-sm"><i class="icon-edit"></i> Detail</a>
                                                <button wire:click="lihat_bukti({{ $item->id }})" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
                                                    <i class="icon-eye"> Bukti</i>
                                                </button>
                                                @if ($item->confirmed == 1)
                                                    <a target="_blank" class="btn btn-success btn-sm"
                                                        href="https://api.whatsapp.com/send/?phone={{ $item->tenant->nohp }}&text=Hai%20{{ $item->tenant->nama }}%0APembayaran%20Retribusi%20Anda%20dengan%20Kode%20{{ $item->kode }}%20Telah%20Divalidasi.%0ATerima%20Kasih."><i
                                                            style="color: #009c17;" class="icon-whatsapp text-white"></i> Konfirmasi Validasi</a>
                                                @else
                                                    <a target="_blank" class="btn btn-success btn-sm"
                                                        href="https://api.whatsapp.com/send/?phone={{ $item->tenant->nohp }}&text=Hai%20{{ $item->tenant->nama }}"><i style="color: #009c17;"
                                                            class="icon-whatsapp text-white"></i> Chat</a>
                                                @endif
                                                <style>
                                                    .under {
                                                        text-decoration: underline;
                                                        cursor: pointer;
                                                    }
                                                </style>
                                                <div class="position-relative" x-data="{ show: false }">
                                                    <div x-show="show" x-transition @click.outside="show = false" class="position-absolute top-0 start-0 bg-warning px-2 rounded">
                                                        <span class="under mr-3" @click="show = false"
                                                            wire:click="ubah_status({{ $item->id }})">{{ $item->confirmed == 1 ? 'Ya, Tidak Valid' : 'Ya, Valid' }}</span>
                                                        <span class="under" @click="show = false">Batal</span>
                                                    </div>
                                                    <button @click="show = true"
                                                        class="btn btn-sm {{ $item->confirmed == 1 ? 'btn-success' : 'btn-danger' }}">{{ $item->confirmed == 1 ? 'Valid by ' . $item->validator : 'Belum Valid' }}
                                                    </button>
                                                </div>
                                                <div class="bg-primary text-white px-1 pb-1 rounded d-inline" style="font-size: 12px">Dikirim {{ $item->created_at->translatedFormat('d/m/Y H:i') }}
                                                    Wib</div>
                                                @if ($item->created_at != $item->updated_at)
                                                    <div class="bg-primary text-white px-1 pb-1 rounded d-inline" style="font-size: 12px">Updated
                                                        {{ $item->updated_at->translatedFormat('d/m/Y H:i') }}
                                                        Wib</div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="d-print-none">
                                            @if ($item->confirmed == 0)
                                                <button type="button" wire:click="hapusItem({{ $item->id }})"
                                                    wire:confirm="Yakin menghapus bukti Pembayaran {{ $item->nama }}-{{ $item->kode }}? Data akan terhapus permanen dan tidak bisa dipulihkan."
                                                    class="btn btn-danger d-none d-md-block"><i class="icon-trash"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <small class="text-success">*Warna Hijau - Sudah Valid</small>
                        <small class="text-danger">*Warna Merah - Belum Valid</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
