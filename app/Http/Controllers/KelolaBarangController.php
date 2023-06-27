<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kelolaBarangs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\KelolaBarang;

class KelolaBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelolaBarang = KelolaBarangs::paginate(2);
        return view('kelolaBarang', compact(('kelolaBarang')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelolaBarang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate([
            'id_item' => 'required',
            'nama_item' => 'required',
            'stok' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarNama = time() . '_' . $gambar->getClientOriginalName();

            // Pindahkan gambar ke direktori yang diinginkan
            $gambar->move(public_path('storage/static/image'), $gambarNama);
        }

        // Fungsi eloquent untuk menambah data
        $kelolaBarang = new KelolaBarangs();
        $kelolaBarang->id_item = $request->id_item;
        $kelolaBarang->nama_item = $request->nama_item;
        $kelolaBarang->stok = $request->stok;
        $kelolaBarang->jenis = $request->jenis;
        $kelolaBarang->keterangan = $request->keterangan;
        $kelolaBarang->harga = $request->harga;
        $kelolaBarang->gambar = $gambarNama ?? null; // Menggunakan gambarNama jika ada, jika tidak, maka diisi dengan null
        $kelolaBarang->save();

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('kelolaBarang.index')->with('success', 'Item Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        // $kelola_barangs = KelolaBarang::find($barang_id);
        // return view('kelolaBarang', compact('KelolaBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelolaBarang = KelolaBarangs::findOrFail($id);
        return view('editKelolaBarang', compact('kelolaBarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_item' => 'required',
            'nama_item' => 'required',
            'stok' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $kelolaBarang = kelolaBarangs::findOrFail($id);
        $kelolaBarang->id_item = $request->id_item;
        $kelolaBarang->nama_item = $request->nama_item;
        $kelolaBarang->stok = $request->stok;
        $kelolaBarang->jenis = $request->jenis;
        $kelolaBarang->keterangan = $request->keterangan;
        $kelolaBarang->harga = $request->harga;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarNama = time() . '_' . $gambar->getClientOriginalName();

            // Pindahkan gambar ke direktori yang diinginkan
            $gambar->move(public_path('storage/static/image'), $gambarNama);
            $kelolaBarang->gambar = $gambarNama;
        }

        $kelolaBarang->save();

        return redirect()->route('kelolaBarang.index')->with('success', 'Data Barang Berhasil Diupdate');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan data barang yang ingin dihapus
        $kelolaBarang = KelolaBarangs::find($id);

        // Hapus gambar dari direktori jika ada
        if ($kelolaBarang->gambar) {
            $gambarPath = public_path('storage/static/image') . '/' . $kelolaBarang->gambar;
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        // Hapus data barang dari database
        $kelolaBarang->delete();

        return redirect()->route('kelolaBarang.index')->with('success', 'Item Berhasil Dihapus');
    }

}
