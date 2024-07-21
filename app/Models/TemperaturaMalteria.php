<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemperaturaMalteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'temperatura',
        'malteria_id'
    ];

    public function malteria()
    {
        return $this->belongsTo(Malteria::class, 'malteria_id');
    }
}
