<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'room_id',
        'checkin_em',
        'checkout_em',
        'criado_por',
    ];
}
