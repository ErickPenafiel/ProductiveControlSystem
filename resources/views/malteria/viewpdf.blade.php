@extends('layouts.app')

@section('subtitle', 'Malteria')
@section('content_header_title', 'Malteria')
@section('content_header_subtitle', 'Generar informe')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <form action="{{ route('malteria.pdf') }}" method="POST">
            @csrf
            <div class="row mb-2">
                <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                @if ($errors->has('fecha_inicio'))
                    <div class="alert alert-danger">
                        {{ $errors->first('fecha_inicio') }}
                    </div>
                @endif
            </div>

            <div class="row mb-2">
                <label for="fecha_fin" class="form-label">Fecha de finalizacion</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                @if ($errors->has('fecha_fin'))
                    <div class="alert alert-danger">
                        {{ $errors->first('fecha_fin') }}
                    </div>
                @endif
            </div>

            <div class="row mb-2">
                <input type="submit" class="btn btn-primary" value="Generar Reporte">
            </div>
        </form>
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
