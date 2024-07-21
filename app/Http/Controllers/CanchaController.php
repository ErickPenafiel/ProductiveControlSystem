<?php

namespace App\Http\Controllers;

use App\Models\Cancha;
use Illuminate\Http\Request;

class CanchaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('cancha.index', [
            'canchas' => Cancha::orderBy('nombre')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cancha.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
        ]);

        Cancha::create($request->all());

        return redirect()->route('cancha.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cancha $cancha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cancha $cancha)
    {
        //
        return view('cancha.edit', [
            'cancha' => $cancha
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cancha $cancha)
    {
        //
        $request->validate([
            'nombre' => 'required',
        ]);

        $cancha->update($request->all());
        return redirect()->route('cancha.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cancha $cancha)
    {
        //
        $cancha->delete();
        return redirect()->route('cancha.index');
    }
}
