<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kelolaBarangs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class KeranjangController extends Controller
{
    //


    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Ambil data keranjang dari session
        $cart = Session::get('cart', []);

        // Periksa apakah produk sudah ada di keranjang
        if (array_key_exists($productId, $cart)) {
            // Jika sudah ada, tambahkan kuantitasnya
            $cart[$productId] += $quantity;
        } else {
            // Jika belum ada, tambahkan produk baru ke keranjang
            $cart[$productId] = $quantity;
        }

        // Simpan kembali data keranjang ke session
        Session::put('cart', $cart);

        // Redirect ke halaman keranjang belanja atau halaman produk
        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang.');
    }


    public function showCart()
    {
        // Ambil data keranjang dari session
        $cart = Session::get('cart', []);
    
        // Ambil ID produk dari keranjang
        $productIds = array_keys($cart);
    
        // Ambil detail produk dari database berdasarkan ID
        $products = kelolaBarangs::whereIn('id_item', $productIds)->get();
    
        // Buat associative array untuk memetakan produk berdasarkan ID
        $productMap = [];
        foreach ($products as $product) {
            $productMap[$product->id] = $product;
        }
    
        // Tampilkan view keranjang belanja dengan data produk
        return view('cartshow', ['cart' => $cart, 'products' => $productMap]);
    }
    



}
