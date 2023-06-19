<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelolaBarangs extends Model
{
    use HasFactory;

    protected $table = 'kelola_barangs';

    protected $primaryKey = 'id_item';

    public function KelolaPesanan(){
        return $this->belongsToMany(KelolaPesanan::class, "items_pesanan", "pesanan_id", "id_item");
    }
}
