<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Capacitaciones;
use Illuminate\Http\Request;

class CapacitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Capacitaciones $capacitaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Capacitaciones $capacitaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Capacitaciones $capacitaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Capacitaciones $capacitaciones)
    {
        //
    }

    public function malteria()
    {
        return view('capacitaciones.malteria');
    }

    public function pdf($archivo)
    {
        if (!Storage::disk('local')->exists('public/manuales/' . $archivo)) {
            abort(404, 'El archivo no existe.');
        }

        $file = Storage::disk('local')->get('public/manuales/' . $archivo);

        return response($file, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $archivo . '"'
        ]);
    }

    public function cocimiento()
    {
        return view('capacitaciones.cocimiento');
    }

    public function fermentacion()
    {
        return view('capacitaciones.fermentacion');
    }
}
