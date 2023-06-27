<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\laporanPaket_pdf;
use App\Models\KelolaBarang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search-input')) {
            $key = request('search-input');
            // $Pakets = Paket::orderBy('paket_id', 'desc')->paginate(2);
            $Pakets = Paket::where('nama_paket', 'LIKE', '%'.$key.'%')->paginate(2);
            return view('kelolaPaket', compact('Pakets'));
        }else{
            // $mahasiswas = Mahasiswa::all(); // Mengambil semua isi tabel
            $Pakets = Paket::orderBy('paket_id', 'desc')->paginate(2);
            return view('kelolaPaket', compact('Pakets'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = KelolaBarang::all();
        // dd($item);
        return view('tambahPaket', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_paket' => 'required',
            'image_paket' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga_paket' => 'required|numeric',
            'items' => 'required|array',
        ]);

        // Simpan data paket
        $paket = new Paket();
        $paket->nama_paket = $request->get('nama_paket');
        $paket->harga_paket = $request->get('harga_paket');

        // Upload gambar dan simpan path ke database
        if ($request->file('image_paket')) {
            $filename = $request->file('image_paket')->store('static/image_paket/', 'public');
        }

        $paket->image_paket = $filename;
        $paket->save();

        // Simpan item terkait
        $items = $request->get('items');
        $paket->kelola_barangs()->attach($items);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('paket.index')->with('success', 'Paket berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show($paket_id)
    {
        $Paket = Paket::find($paket_id);
        return view('paketDetail', compact('Paket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit($paket_id)
    {
        $item = KelolaBarang::all();
        $Paket = Paket::find($paket_id);
        $selectedItems = $Paket->kelola_barangs->pluck('id_item')->toArray();
        return view('updatePaket', compact('Paket', 'item', 'selectedItems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $paket_id)
    {
        //
        // Validasi input
        $request->validate([
            'nama_paket' => 'required',
            'image_paket' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga_paket' => 'required|numeric',
            'items' => 'required|array',
        ]);

        // Simpan data paket
        $paket = Paket::with('kelola_barangs')->where('paket_id', $paket_id)->first();
        $paket->nama_paket = $request->get('nama_paket');
        $paket->harga_paket = $request->get('harga_paket');

        // Upload gambar dan simpan path ke database
        if ($paket->image_paket && file_exists(storage_path('app/public/'.$paket->image_paket))) {
            \Storage::delete('public/'.$paket->image_paket);
        }

        $filename = $request->file('image_paket')->store('static/image_paket/', 'public');

        $paket->image_paket = $filename;
        $paket->save();

        // Simpan item terkait
        $items = $request->get('items');
        $paket->kelola_barangs()->sync($items);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('paket.index')->with('success', 'Paket berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($paket_id)
    {
        //
        $paket = Paket::find($paket_id);

        $paket->kelola_barangs()->detach();

        $paket->delete();

        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus');
    }

    public function cetak_pdf(){
        $Paket = Paket::all();
        $pdf = PDF::loadview('laporanPaket_pdf',['Paket'=>$Paket]);
        return $pdf->stream();
    }
}
