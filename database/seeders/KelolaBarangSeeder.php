<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\KelolaBarang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KelolaBarangSeeder extends Seeder
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
                'nama_item'=>'Tenda Tipe xxHc006',
                'stok'=>'4',
                'jenis' =>'Tenda',
                'harga' => '75000',
                'gambar' => 'static/image/image2.png'
            ],
            [
                'nama_item'=>'Tikar Roll Merk Baygon',
                'stok'=>'5',
                'jenis' =>'Tikar',
                'harga' => '35000',
                'gambar' => 'static/image/image 3.png'
            ],
            [
                'nama_item'=>'Kursi Lipat Mermaid Men',
                'stok'=>'2',
                'jenis' =>'Kursi Lipat',
                'harga' => '40000',
                'gambar' => 'static/image/image 4.png'
            ],
            [
                'nama_item'=>'Meja Portable Barnacle Boy',
                'stok'=>'6',
                'jenis' =>'Meja',
                'harga' => '40000',
                'gambar' => 'static/image/image 5.png'
            ],
            [
                'nama_item'=>'Tenda Size M plus rxxjnc023',
                'stok'=>'2',
                'jenis' =>'Tenda',
                'harga' => '80000',
                'gambar' => 'static/image/image 6.png'
            ],
            [
                'nama_item'=>'Lampu Petromax 50266',
                'stok'=>'8',
                'jenis' =>'Lampu',
                'harga' => '30000',
                'gambar' => 'static/image/image 7.png'
            ],
            [
                'nama_item'=>'Grill Set Yamaha 66xx2',
                'stok'=>'2',
                'jenis' =>'Cooking Set',
                'harga' => '65000',
                'gambar' => 'static/image/image 8.png'
            ],
            [
                'nama_item'=>'Tikar Adorableme 2000x500',
                'stok'=>'3',
                'jenis' =>'Tikar',
                'harga' => '30000',
                'gambar' => 'static/image/image 9.png'
            ],
            [
                'nama_item'=>'Tenda Personal 323xx00',
                'stok'=>'3',
                'jenis' =>'Tenda',
                'harga' => '50000',
                'gambar' => 'static/image/imaage 10.png'
            ],
            ];
        DB::table('kelola_barangs')->insert($data);
    }
}
