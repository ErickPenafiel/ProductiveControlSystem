@extends('layouts.app')

@section('subtitle', 'Malteria')
@section('content_header_title', 'Malteria')
@section('content_header_subtitle', 'Lista de Malteria')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Nombre</th>
                        <th class="text-center" scope="col">Especificacions</th>
                        <th class="text-center" scope="col">Descripcion</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th class="text-center" scope="row">1</th>
                        <td class="text-center">
                            Cuba de Fermentación Cervecera Modelo FCB-3000
                        </td>
                        <td>
                            <ul>
                                <li>Capacidad: 3,000 litros</li>
                                <li>Material: Acero inoxidable</li>
                                <li>Tipo de fermentación: Fermentación principal y maduración</li>
                                <li>Rango de temperatura de operación: 11,4°C a 11,6°C</li>
                                <li>Controles: Panel de control digital con sensores de temperatura, presión y niveles,
                                    además de válvulas de regulación.</li>
                                <li>Sistema de drenaje: Válvula de fondo para descarga del producto fermentado</li>
                                <li>Cumple con las normativas de seguridad y sanitarias aplicables a la industria
                                    alimentaria.</li>
                            </ul>
                        </td>
                        <td class="text-center">
                            Esta cuba de fermentación está diseñada para optimizar el proceso de fermentación y maduración
                            de la cerveza, brindando un control preciso de la temperatura y las condiciones necesarias para
                            obtener un producto de alta calidad.
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">1</th>
                        <td class="text-center">
                            Cancha de Germinación de Cebada Modelo CG-1000
                        </td>
                        <td>
                            <ul>
                                <li>Capacidad: 1,000 kg de granos de cebada</li>
                                <li>Dimensiones (Largo x Ancho x Altura): 5 m x 3 m x 1 m</li>
                                <li>Piso: Superficie perforada en acero inoxidable</li>
                                <li>Sistema de ventilación:</li>
                                <li>Flujo de aire a través del piso perforado</li>
                                <li>Sistema de distribución de aire caliente y húmedo</li>
                                <li>Control de temperatura y humedad:</li>
                                <li>Rango de temperatura: 16°C a 18°C</li>
                                <li>Rango de humedad relativa: 90% a 95%</li>
                                <li>Rastrillo giratorio que recorre toda la superficie</li>
                                <li>Cumplimiento de normas de seguridad e higiene alimentaria</li>
                            </ul>
                        </td>
                        <td class="text-center">
                            Esta cancha de germinación permite controlar de manera precisa las condiciones óptimas para el
                            proceso de malteado de la cebada, asegurando un grado de germinación uniforme y homogéneo,
                            esencial para la posterior elaboración de la cerveza.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
@endpush
