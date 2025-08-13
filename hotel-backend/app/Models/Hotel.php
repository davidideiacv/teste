<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'endereco',
        'criado_por',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'criado_por');
    }
}
