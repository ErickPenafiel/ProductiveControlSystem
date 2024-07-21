<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fermentacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'cantidadEntrada',
        'cantidadLevadura',
        'temperatura',
        'observaciones',
    ];
}
