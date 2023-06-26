<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelolaBarangsPaketSeeder extends Seeder
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
                'id_item'=> 1,
                'paket_id'=> 1,
            ],
            [
                'id_item'=> 2,
                'paket_id'=> 1,
            ],
            [
                'id_item'=> 3,
                'paket_id'=> 1,
            ],
            [
                'id_item'=> 4,
                'paket_id'=> 1,
            ],
            [
                'id_item'=> 5,
                'paket_id'=> 2,
            ],
            [
                'id_item'=> 6,
                'paket_id'=> 2,
            ],
            [
                'id_item'=> 7,
                'paket_id'=> 2,
            ],
            [
                'id_item'=> 8,
                'paket_id'=> 2,
            ],
            [
                'id_item'=> 9,
                'paket_id'=> 2,
            ]
            ];
        DB::table('kelola_barangs_paket')->insert($data);
    }
}
