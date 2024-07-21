<?php

use App\Http\Controllers\CapacitacionesController;
use App\Http\Controllers\CocimientoController;
use App\Http\Controllers\FermentacionController;
use App\Http\Controllers\MalteriaController;
use App\Http\Controllers\Maquinaria;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ProcesoProductivo;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('cocimiento', App\Http\Controllers\CocimientoController::class);
    Route::resource('fermentacion', App\Http\Controllers\FermentacionController::class);
    Route::resource('malteria', App\Http\Controllers\MalteriaController::class);
    Route::resource('cancha', App\Http\Controllers\CanchaController::class);

    Route::get('malteria/temperatura/create/{malteria}', [App\Http\Controllers\TemperaturaMalteriaController::class, 'create'])->name('temperatura.create');
    Route::post('malteria/temperatura', [App\Http\Controllers\TemperaturaMalteriaController::class, 'store'])->name('temperatura.store');
    Route::get('malteria/temperatura/{temperaturaMalteria}/edit', [App\Http\Controllers\TemperaturaMalteriaController::class, 'edit'])->name('temperatura.edit');
    Route::put('malteria/temperatura/{temperaturaMalteria}', [App\Http\Controllers\TemperaturaMalteriaController::class, 'update'])->name('temperatura.update');
    Route::delete('malteria/temperatura/{temperaturaMalteria}', [App\Http\Controllers\TemperaturaMalteriaController::class, 'destroy'])->name('temperatura.destroy');

    Route::get('cocimiento/temperatura/create/{cocimiento}', [App\Http\Controllers\TemperaturaCocimientoController::class, 'create'])->name('temperaturaCocimiento.create');
    Route::post('cocimiento/temperatura', [App\Http\Controllers\TemperaturaCocimientoController::class, 'store'])->name('temperaturaCocimiento.store');
    Route::get('cocimiento/temperatura/{temperaturaCocimiento}/edit', [App\Http\Controllers\TemperaturaCocimientoController::class, 'edit'])->name('temperaturaCocimiento.edit');
    Route::put('cocimiento/temperatura/{temperaturaCocimiento}', [App\Http\Controllers\TemperaturaCocimientoController::class, 'update'])->name('temperaturaCocimiento.update');
    Route::delete('cocimiento/temperatura/{temperaturaCocimiento}', [App\Http\Controllers\TemperaturaCocimientoController::class, 'destroy'])->name('temperaturaCocimiento.destroy');

    Route::get('capacitaciones/malteria', [CapacitacionesController::class, 'malteria'])->name('capacitaciones.malteria');
    Route::get('capacitaciones/cocimiento', [CapacitacionesController::class, 'cocimiento'])->name('capacitaciones.cocimiento');
    Route::get('capacitaciones/fermentacion', [CapacitacionesController::class, 'fermentacion'])->name('capacitaciones.fermentacion');
    Route::get('capacitaciones/pdf/{archivo}', [CapacitacionesController::class, 'pdf'])->name('capacitaciones.pdf');

    Route::get('generatepdf/cocimiento', [App\Http\Controllers\CocimientoController::class, 'generatepdf'])->name('cocimiento.generatepdf');
    Route::post('cocimiento/pdf', [App\Http\Controllers\CocimientoController::class, 'pdf'])->name('cocimiento.pdf');

    Route::get('generatepdf/fermentacion', [App\Http\Controllers\FermentacionController::class, 'generatepdf'])->name('fermentacion.generatepdf');
    Route::post('fermentacion/pdf', [App\Http\Controllers\FermentacionController::class, 'pdf'])->name('fermentacion.pdf');

    Route::get('generatepdf/malteria', [App\Http\Controllers\MalteriaController::class, 'generatepdf'])->name('malteria.generatepdf');
    Route::post('malteria/pdf', [App\Http\Controllers\MalteriaController::class, 'pdf'])->name('malteria.pdf');

    Route::get('usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('usuarios', [UserController::class, 'store'])->name('usuarios.store');
    Route::get('usuarios/{usuario}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('usuarios/{usuario}', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('usuarios/{usuario}', [UserController::class, 'destroy'])->name('usuarios.destroy');

    Route::get('generatepdf/usuarios', [App\Http\Controllers\UserController::class, 'generatepdf'])->name('usuarios.generatepdf');
    Route::post('usuarios/pdf', [App\Http\Controllers\UserController::class, 'pdf'])->name('usuarios.pdf');

    Route::get('proceso-productivo', [ProcesoProductivo::class, 'index'])->name('proceso-productivo.index');
    Route::get('maquinaria', [Maquinaria::class, 'index'])->name('proceso-productivo.index');

    Route::get('marcarLeidas', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('marcarLeidas');

    Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones.index');
    Route::post('/markAsRead', [NotificacionController::class, 'markAsRead'])->name('notificaciones.markAsRead');

    Route::get('indices/fermentacion', [FermentacionController::class, 'loadCharts'])->name('indices.fermentacion');
    Route::get('indices/cocimientos', [CocimientoController::class, 'loadCharts'])->name('indices.cocimientos');
    Route::get('indices/malteria', [MalteriaController::class, 'loadCharts'])->name('indices.malteria');
});
