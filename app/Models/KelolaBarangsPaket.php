<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Paket as Authenticatable;
use Illuminate\Notifications\Notifiable;

class KelolaBarangsPaket extends Model
{
    // use HasFactory;
    protected $table="kelola_barangs_paket"; 
    protected $primaryKey = 'kelola_barangs_paket_id'; 


    protected $fillable = [
        'kelola_barangs_paket_id',
        'id_item',
        'paket_id',
        ];
}
