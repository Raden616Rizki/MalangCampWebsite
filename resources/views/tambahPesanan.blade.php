@extends('layout')

@section('title', 'Tambah Pesanan')

@section('content')
<div class="utama">
    <!-- <div class="box_kelola"> -->
    <div class="box_listTam">
            <div class="box-item" style="display: grid;
            grid-template-columns: repeat(3, 1fr);">
                @foreach($products as $product)
                <div class="card" style="width: 18rem; background: rgba(255, 255, 255, 0.5);
                box-shadow: 6px 0px 10px rgba(0, 0, 0, 0.25);
                border-radius: 30px;">
                    <img class="card-img-top" src="{{ asset($product->gambar) }}" alt="Card image cap" style="width: 15vh; height:15vh; margin-left:33%;">
                    {{-- {{dd(asset($product->gambar))}} --}}
                    <div class="card-body">
                        <ul style="list-style: none; text-align:center;">
                            <li><h4>{{ $product->nama_item }}</h4></li>
                            <li>{{ $product->harga }}</li>
                            <li>
                                <p class="btn-holder">
                                    <a href="{{ url('add-to-cart/'.$product->id_item) }}" class="btn btn-secondary btn-sm" role="button">Add to cart</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
                <div class="text-center">
                    <ul class="pagination pagination-sm">
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                            {{ $products->links("pagination::bootstrap-4") }}
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </div>
    </div>
</div>
<!-- </div> -->
</div>
@endsection
