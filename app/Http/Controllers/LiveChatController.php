<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LiveChatController extends Controller
{
    //
    public function index($user_id)
    {
        //
        $id_user_login = Auth::user()->id;

        if ($id_user_login == 1) {
            $users = User::where('id', '>', 1)->get();
        } else {
            $users = User::find(1);
        }

        $users_all = User::select('id', 'name', 'photo_profile')->get();

        return view('live-chat', compact('users', 'user_id', 'users_all'));
    }
}
