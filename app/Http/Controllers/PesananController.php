<?php

namespace App\Http\Controllers;

use App\Models\Items_Pesanan;
use App\Models\KelolaPesanan;
use App\Http\Controllers\Controller;
use App\Models\kelolaBarangs;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_item = $request->input('id_item');

        $foto = null;
        // dd($request);

        $request->validate([
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            // 'bukti_transaksi' => 'nullable',
            'catatan' => 'nullable',
            'total' => 'required',
            // 'id_item' => 'required|exists:kelola_barangs,id_item',
            // 'pesanan_id' => 'required|exists:pesanan,pesanan_id',
            'items' => 'required|array',
        ]);

        // dd($request);

        if($request->file('image')){
            $foto = $request->file('image')->store('images', 'public');
        }

        $pesanan = new KelolaPesanan;
        $pesanan->user_id = auth()->user()->id;
        $request->filled('bukti_transaksi') ? $pesanan->bukti_transaksi = $foto : null;
        $pesanan->tanggal_peminjaman=$request->get('tanggal_pinjam');
        $pesanan->tanggal_kembali=$request->get('tanggal_kembali');
        $request->filled('catatan') ? $pesanan->catatan = $request->catatan : null;
        $pesanan->total=$request->get('total');

        $pesanan->save();

        // $items = kelolaBarangs::find($id_item);

        // $pesanan->kelolaBarangs()->attach($items->id_item);
        $items = $request->get('items');
        $pesanan->kelolaBarangs()->attach($items);

        return redirect()->route('cart');
    }

    public function tambahItemPesanan(){

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KelolaPesanan  $kelolaPesanan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('kelolaPesanan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KelolaPesanan  $kelolaPesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(KelolaPesanan $kelolaPesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KelolaPesanan  $kelolaPesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pesanan_id)
    {
        $request->validate([
            'status_pembayaran' => 'required',
        ]);

        $pesanan = KelolaPesanan::find($pesanan_id);
        $pesanan->status_pembayaran=$request->get('status_pembayaran');

        $pesanan->save();

        return redirect()->route('kelolaPesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelolaPesanan  $kelolaPesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(KelolaPesanan $kelolaPesanan)
    {
        //
    }
}
