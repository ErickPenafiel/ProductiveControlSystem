@extends('layouts.app')

@section('subtitle', 'Capacitaciones')
@section('content_header_title', 'Capacitaciones')
@section('content_header_subtitle', 'Manuales del area de Fermentacion')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <h1>Manuales de Fermentacion</h1>

        <div class="d-flex justify-content-center align-items-center">
            <div class="row px-5">
                <div class="d-flex bg-white rounded-lg shadow p-3">
                    <div class="img" style="width: 50%;">
                        <img src="{{ asset('storage/images/ManualFermentacion.png') }}" alt="manual-fermentacion"
                            class="img-fluid">
                    </div>

                    <div class="text text-center" style="width: 50%;">
                        <h3>Manual de Fermentacion</h3>
                        <p>En el siguiente documento podrás encontrar una descripción de las funciones y responsabilidades
                            de tu área de trabajo como referencia de apoyo</p>
                        <a href="{{ route('capacitaciones.pdf', 'ManualOperacionesFermentación2doturno.pdf') }}"
                            class="btn btn-primary">Ver manual</a>
                    </div>
                </div>
            </div>
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
