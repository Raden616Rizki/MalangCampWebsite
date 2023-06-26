<?php

namespace App\Http\Controllers;

use App\Models\KelolaPesanan;
use App\Http\Controllers\Controller;
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
        //
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
        $request->validate([
            'tanggal_peminjaman' => 'required',
            'tanggal_kembali' => 'required',
            'bukti_transaksi' => 'required',
            'status_pembayaran' => 'required',
            'catatan' => 'required',
            'status_order' => 'required',
            'total' => 'required',
        ]);

        $pesanan = new kelolaPesanan;
        $pesanan->tanggal_peminjaman=$request->get('tanggal_peminjaman');
        $pesanan->tanggal_kembali=$request->get('tanggal_kembali');
        $pesanan->bukti_transaksi=$request->get('bukti_transaksi');
        $pesanan->status_pembayaran=$request->get('status_pembayaran');
        $pesanan->catatan=$request->get('catatan');
        $pesanan->status_order=$request->get('status_order');
        $pesanan->total=$request->get('total');

        $pesanan->save();

        return redirect()->route('cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KelolaPesanan  $kelolaPesanan
     * @return \Illuminate\Http\Response
     */
    public function show($pesanan_id)
    {
        $pesanan = kelolaPesanan::find($pesanan_id);
        return view('kelolaPesanan', compact('KelolaPesanan'));
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
