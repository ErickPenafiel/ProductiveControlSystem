@extends('layouts.app')

@section('subtitle', 'Fermentaciones')
@section('content_header_title', 'Fermentaciones')
@section('content_header_subtitle', 'Agregar Fermentacion')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <form action="{{ route('fermentacion.store') }}" method="POST">
            @csrf
            <div class="row mb-2">
                <label for="cantidadEntrada" class="form-label">Cantidad de Entrada</label>
                <input type="number" class="form-control" id="cantidadEntrada" name="cantidadEntrada" required>
                @if ($errors->has('cantidadEntrada'))
                    <div class="alert alert-danger">
                        {{ $errors->first('cantidadEntrada') }}
                    </div>
                @endif
            </div>

            <div class="row mb-2">
                <label for="cantidadLevadura" class="form-label">Cantidad de Levadura</label>
                <input type="number" class="form-control" id="cantidadLevadura" name="cantidadLevadura" required>
                @if ($errors->has('cantidadLevadura'))
                    <div class="alert alert-danger">
                        {{ $errors->first('cantidadLevadura') }}
                    </div>
                @endif
            </div>

            <div class="row mb-2">
                <label for="temperatura" class="form-label">Temperatura</label>
                <input type="number" step="0.01" class="form-control" id="temperatura" name="temperatura" required>
                @if ($errors->has('temperatura'))
                    <div class="alert alert-danger">
                        {{ $errors->first('temperatura') }}
                    </div>
                @endif
            </div>

            <div class="row mb-2">
                <input type="submit" class="btn btn-primary" value="Registrar">
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
