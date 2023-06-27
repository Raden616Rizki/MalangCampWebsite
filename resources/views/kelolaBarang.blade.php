@extends('layout')

@section('title', 'Kelola Barang')

@section('search')
<form action="{{ route('kelolaBarang.index') }}" method="GET" id="search-form">
    <input class="main shadow" id="search-input" name="search-input" value="{{request('search-input')}}" placeholder="Search" /><span class="searchicon"></span>
</form>
@endsection

@section('content')

@if (Auth::user()->id > 1)
    <script>
        window.location.href = "/"
    </script>
@endif
<div class="utama d-flex">
    <div class="box_kelola1">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Terdapat beberapa masalah pada inputan Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="text">
            Tambah Barang
        </div>

        <div>
            <form method="post" action="{{ route('kelolaBarang.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf

                <div class="drop-container">
                    <span class="drop-title">Drop files here</span>
                    <input type="file" id="images" accept="image/*" required name="gambar">
                </div>

                <div class="nama">
                    <div>
                        <label for="item_id">ID item</label>
                        <input class="box_isi" type="text" id="item_id" placeholder="Masukkan ID Item" required
                            name="id_item">
                    </div>
                    <div>
                        <label for="nama_item">Nama Item</label>
                        <input class="box_isi" type="text" id="nama_item" placeholder="Masukkan Nama Item" required
                            name="nama_item">
                    </div>
                    <div>
                        <label for="stok">Stok</label>
                        <input class="box_isi" type="text" id="stok" placeholder="Masukkan Stok Item" required
                            name="stok">
                    </div>
                    <div>
                        <label for="jenis">Jenis</label>
                        <input class="box_isi" type="text" id="jenis" placeholder="Masukkan Jenis Item" required
                            name="jenis">
                    </div>
                    <div>
                        <label for="keterangan">Keterangan</label>
                        <input class="box_isi" type="text" id="keterangan" placeholder="Masukkan Keterangan Item"
                            required name="keterangan">
                    </div>
                    <div>
                        <label for="harga">Harga</label>
                        <input class="box_isi" type="text" id="harga" placeholder="Masukkan Harga Item" required
                            name="harga">
                    </div>
                    <div class="hapus_edit d-flex">
                        <button type="reset" class="box_add">Reset</button>
                        <button type="submit" class="box_add">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                                <img src="{{ asset('storage/static/image_item/'.$KelolaBarang->gambar) }}" class="box_foto"
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
                                        <div class="isi" style="height: 24px; overflow: auto;">
                                            {{$KelolaBarang->keterangan}}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="harga">Harga</label>
                                    <div class="box_isi">
                                        <div class="isi">
                                            Rp{{$KelolaBarang->harga}}
                                        </div>
                                    </div>
                                </div>
                                <div class="hapus_edit d-flex">
                                    <a href="{{ route('kelolaBarang.edit', $KelolaBarang->id_item) }}" class="box_add"
                                        style="color: black;">Update</a>
                                    <button type="submit" class="box_add"
                                        onclick="event.preventDefault(); confirmDelete('{{ $KelolaBarang->id_item }}')">Delete</button>
                                    <form id="deleteForm_{{ $KelolaBarang->id_item }}"
                                        action="{{ route('kelolaBarang.destroy', $KelolaBarang->id_item) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <script>
                                        function confirmDelete(id) {
                                            if (confirm("Apakah Anda yakin akan menghapus data ini?")) {
                                                event.preventDefault();
                                                document.getElementById('deleteForm_' + id).submit();
                                            }
                                        }

                                    </script>

                                </div>
                            </div>
                        </div>
                        @endforeach






                    </div>
                </div>
            </div>
        </div>
        <div>
        <a class="btn btn-light" style="margin-left:310px; margin-bottom:-80px;"
                                href="{{ route('cetak_laporanBarang') }}">Cetak</a>
                                </div>
    </div>
</div>
</div>
</div>
@endsection
