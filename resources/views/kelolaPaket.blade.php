@extends('layout')
@section('title', 'Kelola Paket')
@section('content')

@if (Auth::user()->id > 1)
    <script>
        window.location.href = "/"
    </script>
@endif
<div class="all" style="padding-top:40px; padding-left:50px;">
    <div id="table"
        style=" background-color: #96858F; padding: 70px; border-radius: 35px; margin-left:85px; width: 80%; max-width: 800px; min-width: 300px;">
        <p style="margin-left:250px; margin-top:5px;"><span
                style="font-size: 28px; font-weight: bold; background: #B5AAB1; border-radius: 16px; padding: 4px; margin-right: 128px;">Kelola
                Paket</span></p>
        @foreach ($Pakets as $paket)
        <div class="card mb-3"
            style="width: 80%; max-width: 540px; min-width: 100px; border-radius:20px; background-color: #D9D9D9; margin-left :50px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{asset('storage/'.$paket->image_paket)}}" class="img-fluid rounded-start"
                        style="height:80%; border-radius:20px; margin-left:13px; margin-top:10px; margin-bottom:10px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="mb-3 card-title"
                            style="height:23%; width: 300px; background-color:white; border-radius:20px; padding-left:8px;">
                            <strong>{{$paket->nama_paket}}</strong></h5>
                        <h6 class="mb-4 card-title"
                            style="height:23%; width: 300px; background-color:white; border-radius:20px; padding-left:8px;">
                            <strong>{{$paket->harga_paket}}</strong></h6>

                        <form id="deleteForm_{{ $paket->paket_id }}" action="{{ route('paket.destroy', $paket->paket_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-light" style="background-color:#96858F;" onclick="event.preventDefault(); confirmDelete('{{ $paket->paket_id }}')">Hapus</button>
                            <a class="btn btn-outline-light" style="background-color:#AC608D;"
                                href="{{ route('paket.show',$paket->paket_id) }}">Detail</a>
                            <a class="btn btn-outline-light" style="background-color:#673A54;"
                                href="{{ route('paket.edit',$paket->paket_id) }}">Edit</a>
                                
                        </form>
                        <script>
                            function confirmDelete(id) {
                                if (confirm("Apakah Anda yakin akan menghapus paket ini?")) {
                                    event.preventDefault();
                                    document.getElementById('deleteForm_' + id).submit();
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        @endforeach



        <!-- <div class="card mb-3"
            style="width: 80%; max-width: 540px; min-width: 100px; border-radius:20px; background-color: #D9D9D9; margin-left :50px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{asset('static/image/paketAll.jpeg')}}" class="img-fluid rounded-start"
                        style="height:80%; border-radius:20px; margin-left:13px; margin-top:10px; margin-bottom:10px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="mb-3 card-title"
                            style="height:23%; width: 300px; background-color:white; border-radius:20px; padding-left:8px;">
                            <strong>Hemat A</strong></h5>
                        <h6 class="mb-4 card-title"
                            style="height:23%; width: 300px; background-color:white; border-radius:20px; padding-left:8px;">
                            <strong>Rp. 275.000,00</strong></h6>
                        <button type="button" class="btn btn-outline-light"
                            style="background-color:#96858F;">Hapus</button>
                        <button type="button" class="btn btn-outline-light"
                            style="background-color:#AC608D;">Detail</button>
                        <button type="button" class="btn btn-outline-light"
                            style="background-color:#673A54;">Edit</button>
                    </div>
                </div>
            </div>
        </div>




        <div class="card mb-3"
            style="width: 80%; max-width: 540px; min-width: 100px; border-radius:20px; background-color: #D9D9D9; margin-left :50px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{asset('static/image/paketAll.jpeg')}}" class="img-fluid rounded-start"
                        style="height:80%; border-radius:20px; margin-left:13px; margin-top:10px; margin-bottom:10px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="mb-3 card-title"
                            style="height:23%; width: 300px; background-color:white; border-radius:20px; padding-left:8px;">
                            <strong>Hemat A</strong></h5>
                        <h6 class="mb-4 card-title"
                            style="height:23%; width: 300px; background-color:white; border-radius:20px; padding-left:8px;">
                            <strong>Rp. 275.000,00</strong></h6>
                        <button type="button" class="btn btn-outline-light"
                            style="background-color:#96858F;">Hapus</button>
                        <button type="button" class="btn btn-outline-light"
                            style="background-color:#AC608D;">Detail</button>
                        <button type="button" class="btn btn-outline-light"
                            style="background-color:#673A54;">Edit</button>
                    </div>
                </div>
            </div>
        </div> -->
        <a type="button" class="btn btn-light" style="margin-left:240px;" href="{{ route('paket.create') }}">Tambah</a>
        <a class="btn btn-light" style="margin-left:5px;"
                                href="{{ route('cetak_laporanPaket') }}">Cetak</a>
    </div>
</div>
<!-- <div class="pagination">
    {{ $Pakets->links() }}
</div> -->
<div class="mx-auto pb-18 w-4/5">
    {{ $Pakets->links()}}
</div>
@endsection
