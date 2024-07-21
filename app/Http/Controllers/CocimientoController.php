<?php

namespace App\Http\Controllers;

use App\Charts\CocimientoChart;
use App\Models\Cocimiento;
use App\Models\TemperaturaCocimiento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CocimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cocimiento.index', [
            'cocimientos' => Cocimiento::orderBy('fecha')->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cocimiento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'fecha' => 'required|date',
        ]);

        Cocimiento::create($request->all());

        return redirect()->route('cocimiento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cocimiento $cocimiento)
    {
        return view('cocimiento.show', [
            'cocimiento' => $cocimiento,
            'temperaturas' => TemperaturaCocimiento::where('cocimiento_id', $cocimiento->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cocimiento $cocimiento)
    {
        //
        return view('cocimiento.edit', [
            'cocimiento' => $cocimiento
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cocimiento $cocimiento)
    {
        //
        $request->validate([
            'temperatura' => 'required|numeric',
            'fecha' => 'required|date',
            'hora' => 'required',
        ]);

        $cocimiento->update($request->all());

        return redirect()->route('cocimiento.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cocimiento $cocimiento)
    {
        //
    }

    public function generatepdf()
    {
        return view('cocimiento.viewpdf');
    }

    public function pdf(Request $request)
    {
        // $request->validate([
        //     'fecha_inicio' => 'date',
        //     'fecha_fin' => 'date',
        // ]);

        if ($request->fecha_inicio == null || $request->fecha_fin == null) {
            $cocimientos = Cocimiento::orderBy('fecha', 'desc')->get();
            $pdf = Pdf::loadView('cocimiento.pdf', [
                'cocimientos' => $cocimientos,
            ]);
            return $pdf->stream('cocimiento.pdf');
        }

        if ($request->fecha_inicio > $request->fecha_fin) {
            return redirect()->route('cocimiento.viewpdf')->with('error', 'La fecha de inicio no puede ser mayor a la fecha de fin');
        }

        if ($request->fecha_inicio == $request->fecha_fin) {
            $cocimientos = Cocimiento::where('fecha', $request->fecha_inicio)->get();
            $pdf = Pdf::loadView('cocimiento.pdf', [
                'cocimientos' => $cocimientos,
            ]);
            return $pdf->stream('cocimientos.pdf');
        }

        $cocimientos = Cocimiento::whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin])->orderBy('fecha', 'desc')->get();

        $pdf = Pdf::loadView('cocimiento.pdf', [
            'cocimientos' => $cocimientos,
        ]);
        return $pdf->stream('cocimiento.pdf');
    }

    public function loadCharts()
    {
        $temperaturas = TemperaturaCocimiento::all();
        $chart = new CocimientoChart();
        $chart->labels($temperaturas->pluck('fecha'));
        $chart->dataset('Temperaturas de cocimiento', 'line', $temperaturas->pluck('temperatura'))->options([
            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
            'borderColor' => 'rgb(255, 99, 132)',
        ]);

        return view('cocimiento.indices', [
            'chart' => $chart,
        ]);
    }
}
