<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama_paket'=>'Hemat A',
                'harga_paket'=> 275000,
                'image_paket'=>'static/image_paket/paketTenda.png'
            ],
            [
                'nama_paket'=>'Hemat B',
                'harga_paket'=> 380000,
                'image_paket'=>'static/image_paket/paketTenda.png'
            ],
            [
                'nama_paket'=>'Hemat C',
                'harga_paket'=> 325000,
                'image_paket'=>'static/image_paket/paketTenda.png'
            ]
        ];
        DB::table('paket')->insert($data);
    }
}
