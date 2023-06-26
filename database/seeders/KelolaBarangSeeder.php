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
                'id_item' => 1,
                'nama_item' => 'Tenda Tipe xxHc006',
                'stok' => 4,
                'jenis' =>'Tenda',
                'keterangan' => 'Tenda Tipe xxHc006 adalah tenda yang kokoh dan tahan air, ideal untuk petualangan luar ruangan. Mudah dipasang, nyaman, dan memiliki desain yang kompak untuk mobilitas yang praktis.',
                'harga' => 75000,
                'gambar' => 'image 2.png'
            ],
            [
                'id_item' => 2,
                'nama_item' => 'Tikar Roll Merk Baygon',
                'stok' => 5,
                'jenis' => 'Tikar',
                'keterangan' => 'Tikar Roll Merk Baygon: Nyaman, praktis, dan tahan lama. Solusi terbaik untuk piknik, camping, atau aktivitas outdoor lainnya.',
                'harga' => 35000,
                'gambar' => 'image 3.png'
            ],
            [
                'id_item' => 3,
                'nama_item' => 'Kursi Lipat Mermaid Men',
                'stok' => 2,
                'jenis' =>'Kursi Lipat',
                'keterangan' => 'Kursi Lipat Mermaid Men adalah kursi portabel yang unik dengan desain warna-warni, ringan, dan mudah dilipat, sempurna untuk petualangan outdoor yang seru.',
                'harga' => 40000,
                'gambar' => 'image 4.png'
            ],
            [
                'id_item' => 4,
                'nama_item' => 'Meja Portable Barnacle Boy',
                'stok' => 6,
                'jenis' => 'Meja',
                'keterangan' => 'Meja Portable Barnacle Boy adalah meja lipat praktis yang cocok untuk aktivitas luar ruangan, ringan, mudah disimpan, dan memiliki desain yang menarik.',
                'harga' => 40000,
                'gambar' => 'image 5.png'
            ],
            [
                'id_item' => 5,
                'nama_item' => 'Tenda Size M plus rxxjnc023',
                'stok' => 2,
                'jenis' => 'Tenda',
                'keterangan' => 'Tenda Size M plus rxxjnc023 adalah tenda yang ideal untuk petualangan outdoor, dengan ukuran yang pas dan dilengkapi dengan fitur kelas atas.',
                'harga' => 80000,
                'gambar' => 'image 6.png'
            ],
            [
                'id_item' => 6,
                'nama_item' => 'Lampu Petromax 50266',
                'stok' => 8,
                'jenis' =>'Lampu',
                'keterangan' => 'Lampu Petromax 50266, lampu berkualitas tinggi dengan desain klasik, menghasilkan cahaya terang dan tahan lama. Cocok untuk kegiatan camping, hiking, atau sumber cahaya darurat.',
                'harga' => 30000,
                'gambar' => 'image 7.png'
            ],
            [
                'id_item' => 7,
                'nama_item' => 'Grill Set Yamaha 66xx2',
                'stok' => 2,
                'jenis' =>'Cooking Set',
                'keterangan' => 'Grill Set Yamaha 66xx2 adalah perangkat bakar yang inovatif dengan desain ergonomis dan kualitas terbaik. Memiliki fungsi canggih dan sempurna untuk menghadirkan hidangan lezat di acara berkemah Anda.',
                'harga' => '65000',
                'gambar' => 'image 8.png'
            ],
            [
                'id_item' => 8,
                'nama_item' => 'Tikar Adorableme 2000x500',
                'stok' => 3,
                'jenis' =>'Tikar',
                'keterangan' => 'Tikar Adorableme 2000x500 adalah tikar yang indah dan fungsional dengan ukuran ideal, memberikan kenyamanan luar biasa dan tampilan menarik.',
                'harga' => 30000,
                'gambar' => 'image 9.png'
            ],
            [
                'id_item' => 9,
                'nama_item' => 'Tenda Personal 323xx00',
                'stok '=> 3,
                'jenis' =>'Tenda',
                'keterangan' => 'Tenda Personal 323xx00 adalah tenda kompak yang cocok untuk petualangan solo, dengan desain ringkas, tahan air, dan mudah dipasang.',
                'harga' => 50000,
                'gambar' => 'image 10.png'
            ],
            ];
        DB::table('kelola_barangs')->insert($data);
    }
}
