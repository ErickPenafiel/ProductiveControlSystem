<?php

namespace App\Http\Controllers;

use App\Events\TemperaturaMalteriaEvent;
use App\Models\Malteria;
use App\Models\TemperaturaMalteria;
use App\Models\User;
use App\Notifications\TemperaturaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemperaturaMalteriaController extends Controller
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
    public function create(Malteria $malteria)
    {
        //
        return view('temperatura.create', [
            'malteria' => $malteria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'temperatura' => 'required|numeric',
            'fecha' => 'required',
            'hora' => 'required',
            'malteria_id' => 'required|numeric',
        ]);

        $newTemperaturaMalteria = TemperaturaMalteria::create($request->all());
        $lenMalteria = TemperaturaMalteria::where('malteria_id', $request->malteria_id)->count();

        if ($request->temperatura < 16 || $request->temperatura > 18) {
            User::all()->each->notify(new TemperaturaNotification($newTemperaturaMalteria));
        }

        return redirect()->route('malteria.show', $request->malteria_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(TemperaturaMalteria $temperaturaMalteria)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TemperaturaMalteria $temperaturaMalteria)
    {
        //
        return view('temperatura.edit', [
            'temperatura' => $temperaturaMalteria,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TemperaturaMalteria $temperaturaMalteria)
    {
        //
        $request->validate([
            'temperatura' => 'required|numeric',
            'fecha' => 'required',
            'hora' => 'required',
            'malteria_id' => 'required|numeric',
        ]);

        $temperaturaMalteria->update($request->all());

        return redirect()->route('malteria.show', $request->malteria_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TemperaturaMalteria $temperaturaMalteria)
    {
        //
    }
}
