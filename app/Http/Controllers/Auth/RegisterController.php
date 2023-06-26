<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\OtpMail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string', 'max:255'],
            'phoneNumber' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $photo = 'static/photo_profile/default_profile.png';

        // Membuat OTP
        $otpCode = Str::random(6);
        $otpExpired = now()->addMinutes(1);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'phoneNumber' => $data['phoneNumber'],
            'address' => $data['address'],
            'photo_profile' => $photo,
            'otp_code' => $otpCode,
            'otp_expired' => $otpExpired,
        ]);
    }

    public function register(Request $request) {

        $user_temp = User::where('email', $request['email'])->first();

        if ($user_temp) {
            if (!$user_temp->email_verified_at) {
                $user_temp->delete();
            }
        }

        $photo = 'static/photo_profile/default_profile.png';

        // Membuat OTP
        $otpCode = Str::random(6);
        $otpExpired = Carbon::now()->addMinutes(4);

        $this->validator($request->all())->validate();

        // Create User
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'username' => $request['username'],
            'phoneNumber' => $request['phoneNumber'],
            'address' => $request['address'],
            'photo_profile' => $photo,
            'otp_code' => $otpCode,
            'otp_expired' => $otpExpired,
        ]);

        // Kirim OTP ke email user
        Mail::to($user->email)->send(new OtpMail($otpCode));

        return view('verification')->with('email', $user->email);
    }
}
