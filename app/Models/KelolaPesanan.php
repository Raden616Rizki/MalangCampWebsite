<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class KelolaPesanan extends Model
{
    use HasFactory;

    protected $table='pesanan';

    protected $primaryKey = 'pesanan_id';

    protected $fillable = [
        'tanggal_peminjaman',
        'tanggal_kembali',
        'bukti_transaksi',
        'status_pembayaran',
        'catatan',
        'status_order',
        'total',
    ];

    public function kelolaBarangs(){
        return $this->belongsToMany(kelolaBarangs::class, "items_pesanan", "pesanan_id", "items_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function Items_Pesanan(){
    //     return $this->hasMany(Items_Pesanan::class, 'pesanan_id');
    // }
}
