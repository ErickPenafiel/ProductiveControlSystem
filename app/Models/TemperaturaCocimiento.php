<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemperaturaCocimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'temperatura',
        'cocimiento_id',
        'fecha',
        'hora'
    ];

    public function cocimientos()
    {
        return $this->belongsTo(Cocimiento::class, 'cocimiento_id');
    }
}
