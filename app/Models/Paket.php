<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Paket as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Paket extends Model
{
    // use HasFactory;
    protected $table="paket";
    protected $primaryKey = 'paket_id';


    protected $fillable = [
        'paket_id',
        'nama_paket',
        'image_paket',
        ];

        public function kelola_barangs() {
            return $this->belongsToMany(kelolaBarangs::class, "kelola_barangs_paket", "paket_id", "id_item");
        }
}
