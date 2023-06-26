<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany(kelolaBarangs::class, "items_pesanan", "pesanan_id", "id_item");
    }
}
