<?php

namespace App\Http\Controllers;

use App\Charts\MalteriaChart;
use App\Models\Cancha;
use App\Models\Malteria;
use App\Models\TemperaturaMalteria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MalteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('malteria.index', [
            'malterias' => Malteria::orderBy('fecha_inicio')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('malteria.create', [
            'canchas' => Cancha::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cancha_id' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        Malteria::create($request->all());

        return redirect()->route('malteria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Malteria $malterium)
    {
        //
        return view('malteria.show', [
            'malteria' => $malterium,
            'temperaturas' => TemperaturaMalteria::where('malteria_id', $malterium->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Malteria $malterium)
    {
        //
        return view('malteria.edit', [
            'malteria' => $malterium,
            'canchas' => Cancha::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Malteria $malterium)
    {
        //
        $request->validate([
            'cancha_id' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        $malterium->update($request->all());

        return redirect()->route('malteria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Malteria $malterium)
    {
        $malterium->delete();
        return redirect()->route('malteria.index');
    }

    public function generatepdf()
    {
        return view('malteria.viewpdf');
    }

    public function pdf(Request $request)
    {

        if ($request->fecha_inicio == null || $request->fecha_fin == null) {
            $malterias = Malteria::with('temperaturas')->orderBy('created_at')->get();
            $pdf = Pdf::loadView('malteria.pdf', [
                'malterias' => $malterias,

            ]);
            return $pdf->stream('malteria.pdf');
        }

        if ($request->fecha_inicio > $request->fecha_fin) {
            return redirect()->route('malteria.generatepdf')->with('error', 'La fecha de inicio no puede ser mayor a la fecha de fin');
        }

        if ($request->fecha_inicio == $request->fecha_fin) {
            $malterias = Malteria::where('created_at', $request->fecha_inicio)->with('temperaturas')->get();
            $pdf = Pdf::loadView('malteria.pdf', [
                'malterias' => $malterias,
            ]);
            return $pdf->stream('malterias.pdf');
        }

        $malterias = Malteria::whereBetween('created_at', [$request->fecha_inicio, $request->fecha_fin])->with('temperaturas')->orderBy('created_at', 'desc')->get();

        $pdf = Pdf::loadView('malteria.pdf', [
            'malterias' => $malterias,
        ]);
        return $pdf->stream('malteria.pdf');
    }

    public function loadCharts()
    {
        $temperaturas = TemperaturaMalteria::all();

        $chart = new MalteriaChart;
        $chart->labels($temperaturas->pluck('fecha'));
        $chart->dataset('Temperatura', 'line', $temperaturas->pluck('temperatura'))->options([
            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
            'borderColor' => 'rgb(255, 99, 132)',
        ]);

        return view('malteria.indices', compact('chart'));
    }
}
