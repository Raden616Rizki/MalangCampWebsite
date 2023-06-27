<?php

namespace App\Http\Controllers;

use App\Models\Items_Pesanan;
use App\Models\KelolaPesanan;
use App\Models\kelolaBarangs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $pesanan = KelolaPesanan::all();

    return view('laporanTransaksi', compact('pesanan'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KelolaPesanan  $kelolaPesanan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pesanan = KelolaPesanan::with('kelolaBarangs')->get();
        return view('laporanTransaksi', compact('pesanan'));
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
            'status_order' => 'required',
        ]);

        // dd($request);
        $pesananIds = $request->input('pesanan_id');
        $statusPembayaran = $request->input('status_pembayaran');
        $statusOrder = $request->input('status_order');

        // Loop through each pesanan id
        foreach ($pesananIds as $index => $pesananId) {
            $pesanan = KelolaPesanan::findOrFail($pesananId);

            // Update the status_pembayaran and status_order
            $pesanan->status_pembayaran = $statusPembayaran[$index];
            $pesanan->status_order = $statusOrder[$index];

            $pesanan->save();
        }

        return redirect()->route('laporanTransaksi');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelolaPesanan  $kelolaPesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($pesanan_id)
    {
        Items_Pesanan::where('pesanan_id', $pesanan_id)->delete();
        KelolaPesanan::where('pesanan_id', $pesanan_id)->delete();
        return response();
    }
}
