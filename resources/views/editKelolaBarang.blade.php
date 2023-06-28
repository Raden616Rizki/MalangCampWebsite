@extends('layout')

@section('title', 'Edit Kelola Barang')

@section('content')

@if (Auth::user()->id > 1)
    <script>
        window.location.href = "/"
    </script>
@endif

<div class="utama">
    <div class="box_kelola">
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
            Edit Barang
        </div>

        <div>
            <form method="post" action="{{ route('kelolaBarang.update', $kelolaBarang->id_item) }}" id="myForm" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                
                <div class="drop-container">
                    <span class="drop-title">Drop files here</span>
                    <input type="file" id="images" accept="image/*" name="gambar">
                </div>

                <div class="nama">
                    <div>
                        <label for="item_id">ID item</label>
                        <input class="box_isi" type="text" id="item_id" placeholder="Masukkan ID Item" required name="id_item" value="{{ $kelolaBarang->id_item }}">
                    </div>
                    <div>
                        <label for="nama_item">Nama Item</label>
                        <input class="box_isi" type="text" id="nama_item" placeholder="Masukkan Nama Item" required name="nama_item" value="{{ $kelolaBarang->nama_item }}">
                    </div>
                    <div>
                        <label for="stok">Stok</label>
                        <input class="box_isi" type="text" id="stok" placeholder="Masukkan Stok Item" required name="stok" value="{{ $kelolaBarang->stok }}">
                    </div>
                    <div>
                        <label for="jenis">Jenis</label>
                        <input class="box_isi" type="text" id="jenis" placeholder="Masukkan Jenis Item" required name="jenis" value="{{ $kelolaBarang->jenis }}">
                    </div>
                    <div>
                        <label for="keterangan">Keterangan</label>
                        <input class="box_isi" type="text" id="keterangan" placeholder="Masukkan Keterangan Item" required name="keterangan" value="{{ $kelolaBarang->keterangan }}">
                    </div>
                    <div>
                        <label for="harga">Harga</label>
                        <input class="box_isi" type="text" id="harga" placeholder="Masukkan Harga Item" required name="harga" value="{{ $kelolaBarang->harga }}">
                    </div>
                    <div class="hapus_edit d-flex">
                        <button type="reset" class="box_add">Reset</button>
                        <button type="submit" class="box_add" onclick="return confirm('Apakah Anda yakin ingin mengupdate data?')">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
