<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
    ];

    public function temperaturas()
    {
        return $this->hasMany(TemperaturaCocimiento::class, 'cocimiento_id');
    }
}
