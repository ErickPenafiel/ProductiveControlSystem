<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Malteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'cancha_id',
    ];

    public function cancha()
    {
        return $this->belongsTo(Cancha::class, 'cancha_id');
    }

    public function temperaturas()
    {
        return $this->hasMany(TemperaturaMalteria::class, 'malteria_id');
    }
}
