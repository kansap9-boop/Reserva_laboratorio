<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'accion',
        'detalles'
    ];

    // Esta relación es la que permite a la vista leer el nombre y rol del usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}