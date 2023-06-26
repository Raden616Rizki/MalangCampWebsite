<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class updateUserController extends Controller
{
    public function edit() {
        $user = User::find(Auth::user()->id);
        // dd($user);
        return view('updateAccount', compact('user'));
    }

    public function update(Request $request) {

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
            'address' => 'required',
            'photo_profile' => 'required|image',
        ]);

        $user = User::find(Auth::user()->id);
        // dd($user);

        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->phoneNumber = $request->get('phoneNumber');
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->photo_profile = $request->get('photo_profile');

        if ($user->photo_profile && Storage::exists('app/public/'.$user->photo_profile)) {
            Storage::delete('public/'.$user->photo_profile);
        }

        $filename = $request->file('photo_profile')->store('static/photo_profile/', 'public');
        $user->photo_profile = $filename;

        $user->save();

        return redirect()->route('account');
        // return view('account');
    }
}
