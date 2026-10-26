<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'user_id',
        'laboratorio_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'estado'
    ];
}