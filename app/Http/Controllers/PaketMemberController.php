<?php

namespace App\Http\Controllers;

use App\Models\paketDetailMember;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;

class PaketMemberController extends Controller
{
    public function index()
    {
        $Pakets = Paket::with('kelola_barangs')->paginate(2);
        // dd($Pakets);
        return view('paket', compact('Pakets'));
    }

    public function show($paket_id)
    {
        $Paket = Paket::find($paket_id);
        return view('paketDetailMember', compact('Paket'));
    }
}
