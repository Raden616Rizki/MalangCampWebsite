<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chat';

    protected $primaryKey = 'chat_id';

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'chat',
        'file',
        'date_time',
        'is_read',
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
