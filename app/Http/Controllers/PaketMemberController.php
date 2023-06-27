<?php

namespace App\Http\Controllers;

use App\Models\paketDetailMember;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;

class PaketMemberController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search-input')) {
            $key = request('search-input');
            // $Pakets = Paket::orderBy('paket_id', 'desc')->paginate(2);
            $Pakets = Paket::where('nama_paket', 'LIKE', '%'.$key.'%')->paginate(2);
            return view('paket', compact('Pakets'));
        } else {
            // $mahasiswas = Mahasiswa::all(); // Mengambil semua isi tabel
            $Pakets = Paket::orderBy('paket_id', 'desc')->paginate(2);
            return view('paket', compact('Pakets'));
        }
    }

    public function show($paket_id)
    {
        $Paket = Paket::find($paket_id);
        return view('paketDetailMember', compact('Paket'));
    }
}
