<?php

namespace App\Http\Controllers;

use App\Models\Cocimiento;
use App\Models\TemperaturaCocimiento;
use App\Models\User;
use App\Notifications\TemperaturaCocimientoNotification;
use Illuminate\Http\Request;

class TemperaturaCocimientoController extends Controller
{
    public $limites = [[51, 53], [63, 65], [66, 67], [70, 71], [70, 72]];

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
    public function create(Cocimiento $cocimiento)
    {
        return view('temperaturaCocimiento.create', [
            'cocimiento' => $cocimiento,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'temperatura' => 'required|numeric',
            'fecha' => 'required',
            'hora' => 'required',
            'cocimiento_id' => 'required|numeric',
        ]);

        $newTemperaturaCocimiento = TemperaturaCocimiento::create($request->all());
        $cocimiento = TemperaturaCocimiento::where('cocimiento_id', $request->cocimiento_id)->get();

        // dd($cocimiento);
        $lenCocimiento = $cocimiento->count();

        // dd($lenCocimiento, $this->limites[$lenCocimiento - 1][0], $this->limites[$lenCocimiento - 1][1], $newTemperaturaCocimiento->temperatura, $newTemperaturaCocimiento->temperatura < $this->limites[$lenCocimiento - 1][0], $newTemperaturaCocimiento->temperatura > $this->limites[$lenCocimiento - 1][1]);

        if ($newTemperaturaCocimiento->temperatura < $this->limites[$lenCocimiento - 1][0] || $newTemperaturaCocimiento->temperatura > $this->limites[$lenCocimiento - 1][1]) {
            User::all()->each->notify(new TemperaturaCocimientoNotification($newTemperaturaCocimiento));
        }

        return redirect()->route('cocimiento.show', $request->cocimiento_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(TemperaturaCocimiento $temperaturaCocimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TemperaturaCocimiento $temperaturaCocimiento)
    {
        return view('temperaturaCocimiento.edit', [
            'temperatura' => $temperaturaCocimiento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TemperaturaCocimiento $temperaturaCocimiento)
    {
        $request->validate([
            'temperatura' => 'required|numeric',
            'fecha' => 'required',
            'hora' => 'required',
            'cocimiento_id' => 'required|numeric',
        ]);

        $temperaturaCocimiento->update($request->all());

        return redirect()->route('cocimiento.show', $request->cocimiento_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TemperaturaCocimiento $temperaturaCocimiento)
    {
        //
    }
}
