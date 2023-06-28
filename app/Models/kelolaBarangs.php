<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelolaBarangs extends Model
{
    use HasFactory;

    protected $table = 'kelola_barangs';

    protected $primaryKey = 'id_item';

    public function kelolaPesanan()
    {
        return $this->belongsToMany(KelolaPesanan::class, 'items_pesanan', 'id_item', 'pesanan_id');
    }

    // public function Items_Pesanan(){
    //     return $this->hasMany(Items_Pesanan::class, 'id_item');
    // }
}
