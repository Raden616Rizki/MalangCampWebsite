<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\KelolaBarang as Authenticatable;
use Illuminate\Notifications\Notifiable;

class KelolaBarang extends Model
{
    protected $table="kelola_barangs"; // Eloquent akan membuat model menyimpan record di tabel
    public $timestamps= false; 
    protected $primaryKey = 'id_item'; // Memanggil isi DB Dengan primarykey
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_item',
        'nama_item',
        'stok',
        'jenis',
        'keterangan',
        'harga',
        'gambar',
    ];

    public function paket() {
        return $this->belongsToMany(Paket::class, "kelola_barangs_paket", "id_item", "paket_id");
    }
}
