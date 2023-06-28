<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $otpExpired = $now->addMinutes(1);

        $data = [
            [
                'name'=> 'Admin',
                'email'=> 'malang4camp@gmail.com',
                'email_verified_at'=> $now,
                'password'=> Hash::make('password'),
                'username'=> 'admin',
                'phoneNumber'=> '085646547053',
                'address'=> 'JL Ikan Lumba Lumba Residence Kav 9 Malang',
                'photo_profile'=> 'static/image/AdminLTELogo.png',
                'otp_code'=> 'admin1',
                'otp_expired'=> $otpExpired,
            ],
            [

                'name'=> 'Gofina April',
                'email'=> '5fina4@gmail.com',
                'email_verified_at'=> $now,
                'password'=> Hash::make('password'),
                'username'=> 'gofina-april',
                'phoneNumber'=> '085646147053',
                'address'=> 'Bandung',
                'photo_profile'=> 'static/image/default_profile.png',
                'otp_code'=> 'gofina',
                'otp_expired'=> $otpExpired,
            ],
            [

                'name'=> 'Dina Isnaeni',
                'email'=> 'dina1snaeni@gmail.com',
                'email_verified_at'=> $now,
                'password'=> Hash::make('password'),
                'username'=> 'dinaisnaeni',
                'phoneNumber'=> '085646547812',
                'address'=> 'Tepas',
                'photo_profile'=> 'static/image/default_profile.png',
                'otp_code'=> 'dinane',
                'otp_expired'=> $otpExpired,
            ],
        ];
        DB::table('users')->insert($data);
    }
}
