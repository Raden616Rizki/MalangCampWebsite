@extends('layout');
@section('content')

<form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="number" name="product_id" >
    <input type="number" name="quantity" min="1">
    <button type="submit">Tambahkan ke Keranjang</button>
</form>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('cartshow') }}">Lihat Keranjang Belanja</a>
@endsection
