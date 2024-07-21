<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Maquinaria extends Controller
{
    // public $maquinarias = [
    //     [
    //         'id' => 1,
    //         'nombre' => 'Molino',
    //         'especificaciones' =:
    //         'descripcion' => 'Molino de rodillos',

    //     ]
    // ]
    // //
    public function index()
    {
        return view('maquinaria.index');
    }
}
