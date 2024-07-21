<?php

namespace App\Http\Controllers;

use App\Charts\FermentacionChart;
use App\Models\Fermentacion;
use App\Models\User;
use App\Notifications\TemperaturaCocimientoNotification;
use App\Notifications\TemperaturaFermentacionNotification;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class FermentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('fermentacion.index', [
            'fermentaciones' => Fermentacion::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fermentacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'cantidadEntrada' => 'required|numeric',
            'cantidadLevadura' => 'required|numeric',
            'temperatura' => 'required|numeric',
        ]);

        $newTemperaturaFermentacion = Fermentacion::create($request->all());

        if ($newTemperaturaFermentacion->temperatura <= 11.4 || $newTemperaturaFermentacion->temperatura >= 12.6) {
            User::all()->each->notify(new TemperaturaFermentacionNotification($newTemperaturaFermentacion));
        }

        return redirect()->route('fermentacion.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fermentacion $fermentacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fermentacion $fermentacion)
    {
        //
        return view('fermentacion.edit', [
            'fermentacion' => $fermentacion,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fermentacion $fermentacion)
    {
        //
        $request->validate([
            'cantidadEntrada' => 'required|numeric',
            'cantidadLevadura' => 'required|numeric',
            'temperatura' => 'required|numeric',
        ]);

        $fermentacion->update($request->all());

        return redirect()->route('fermentacion.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fermentacion $fermentacion)
    {
        //
        $fermentacion->delete();

        return redirect()->route('fermentacion.index');
    }

    public function generatepdf()
    {
        return view('fermentacion.viewpdf');
    }

    public function pdf(Request $request)
    {

        if ($request->fecha_inicio == null || $request->fecha_fin == null) {
            $fermentaciones = Fermentacion::all();
            $pdf = Pdf::loadView('fermentacion.pdf', [
                'fermentaciones' => $fermentaciones,
            ]);
            return $pdf->stream('fermentacion.pdf');
        }

        if ($request->fecha_inicio > $request->fecha_fin) {
            return redirect()->route('fermentacion.generatepdf')->with('error', 'La fecha de inicio no puede ser mayor a la fecha de fin');
        }

        if ($request->fecha_inicio == $request->fecha_fin) {
            $fermentaciones = Fermentacion::where('created_at', $request->fecha_inicio)->get();
            $pdf = Pdf::loadView('fermentacion.pdf', [
                'fermentaciones' => $fermentaciones,
            ]);
            return $pdf->stream('fermentaciones.pdf');
        }

        $fermentaciones = Fermentacion::whereBetween('created_at', [$request->fecha_inicio, $request->fecha_fin])->get();

        $pdf = Pdf::loadView('fermentacion.pdf', [
            'fermentaciones' => $fermentaciones,
        ]);
        return $pdf->stream('fermentacion.pdf');
    }


    public function loadCharts()
    {
        $fermentaciones = Fermentacion::all();

        // Formatear las fechas
        $formattedDates = $fermentaciones->pluck('created_at')->map(function ($date) {
            return Carbon::parse($date)->format('d-m-Y H:i:s');
        });

        $chart = new FermentacionChart();
        $chart->labels($formattedDates);
        $chart->dataset('Temperatura de fermentación', 'line', $fermentaciones->pluck('temperatura'))->options([
            'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
            'borderColor' => 'rgba(54, 162, 235, 1)',
            'borderWidth' => 1,
        ]);

        return view('fermentacion.indices', [
            'chart' => $chart,
        ]);
    }
}
