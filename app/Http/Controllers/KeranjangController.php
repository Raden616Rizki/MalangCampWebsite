<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kelolaBarangs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class KeranjangController extends Controller
{
    //


    public function index()  // get all data from database
    {
        $products = kelolaBarangs::paginate(3);
        return view('tambahPesanan', compact('products'))->with('products', $products);  //  show all data in page of products.blade.php
    }

    // this function is to show cart of product because we wanna show result of choose product by user in this page
    public function cart()
    {
        return view('cart');
    }



    public function addToCart($id_item)
    {
        $product = kelolaBarangs::find($id_item);

        if(!$product) {

            abort(404);

        }
        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id_item => [
                        "nama_item" => $product->nama_item,
                        "quantity" => 1,
                        "harga" => $product->harga,
                        "gambar" => $product->gambar
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id_item])) {

            $cart[$id_item]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }


        $cart[$id_item] = [
            "nama_item" => $product->nama_item,
            "quantity" => 1,
            "harga" => $product->harga,
            "gambar" => $product->gambar,
            "stok" => $product->stok
        ];

        session()->put('cart', $cart); // this code put product of choose in cart

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // update product of choose in cart
    public function update(Request $request)
    {
        if($request->id_item and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id_item]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    // delete or remove product of choose in cart
    public function remove(Request $request)
    {
        if($request->id_item) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id_item])) {

                unset($cart[$request->id_item]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }




}
