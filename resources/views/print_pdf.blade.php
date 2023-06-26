@extends('layout')

@section('title', 'pdf')

@section('content')
    <div class="box_list">
        <div>
            <div>
                <div class="pagination d-flex">
                    <div class="tambahan">

                    </div>
                    <div class="box_panah d-flex">
                        <!-- Tombol untuk halaman sebelumnya -->
                        @if($kelolaBarang->currentPage() > $kelolaBarang->lastPage() - 1)
                        <a href="{{ $kelolaBarang->previousPageUrl() }}" style="color:black; font-size:20px;"><b>
                                <</b> </a> <h4 class="list"> <b> List Barang </b> </h4>

                                    <a href="{{ $kelolaBarang->nextPageUrl() }}"
                                        style="color:black; font-size:20px;"><b>></b></a>
                                    @endif

                                    <!-- Tombol untuk halaman berikutnya -->
                                    @if($kelolaBarang->hasMorePages())
                                    <a href="{{ $kelolaBarang->previousPageUrl() }}"
                                        style="color:black; font-size:20px;"><b>
                                            <</b> </a> <!-- <div class="text"> -->
                                                <h4 class="list"> <b> List Barang </b> </h4>
                                                <!-- </div> -->

                                                <a href="{{ $kelolaBarang->nextPageUrl() }}"
                                                    style="color:black; font-size:20px;"><b>></b></a>
                                                @endif

                    </div>
                </div>
                <div>
                    <div class="tenda d-flex">
                        @foreach ($kelolaBarang as $KelolaBarang)
                        <div class="box_kelola">
                            <div class="nama">
                                <img src="{{ asset('storage/static/image/'.$KelolaBarang->gambar) }}" class="box_foto"
                                    alt="">
                                <div>
                                    <label for="item_id">ID Item</label>
                                    <div class="box_isi">
                                        <div class="isi">
                                            {{$KelolaBarang->id_item}}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="nama_item">Nama Item</label>
                                    <div class="box_isi">
                                        <div class="isi">
                                            {{$KelolaBarang->nama_item}}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="stok">Stok</label>
                                    <div class="box_isi">
                                        <div class="isi">
                                            {{$KelolaBarang->stok}}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="jenis">Jenis</label>
                                    <div class="box_isi">
                                        <div class="isi">
                                            {{$KelolaBarang->jenis}}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="keterangan">Keterangan</label>
                                    <div class="box_isi">
                                        <div class="isi">
                                            {{$KelolaBarang->keterangan}}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="harga">Harga</label>
                                    <div class="box_isi">
                                        <div class="isi">
                                            {{$KelolaBarang->harga}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
