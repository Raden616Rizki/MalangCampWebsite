<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Items_Pesanan extends Model
{
    use HasFactory;

    protected $table = 'items_pesanan';

    // public function KelolaPesanan(){
    //     return $this->belongsTo(KelolaPesanan::class);
    // }

    // public function kelolaBarans(){
    //     return $this->belongsTo(kelolaBarangs::class);
    // }
}
