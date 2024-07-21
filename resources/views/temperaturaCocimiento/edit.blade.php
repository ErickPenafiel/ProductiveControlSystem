@extends('layouts.app')

@section('subtitle', 'Lista de Malterias')
@section('content_header_title', 'Malterias')
@section('content_header_subtitle', 'Agregar Malteria')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <form action="{{ route('temperaturaCocimiento.update', $temperatura->id) }}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" value="{{ $temperatura->cocimiento->id }}" name="cocimiento_id">
            <div class="row mb-2">
                <label for="cancha_id" class="form-label">Temperatura</label>
                <input type="number" step="0.01" value="{{ $temperatura->temperatura }}" class="form-control"
                    id="temperatura" name="temperatura">
                @if ($errors->has('cancha_id'))
                    <div class="alert alert-danger">
                        {{ $errors->first('cancha_id') }}
                    </div>
                @endif
            </div>

            <div class="row mb-2">
                <div class="col-6">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" value="{{ $temperatura->fecha }}" class="form-control" id="fecha"
                        name="fecha" required>
                    @if ($errors->has('fecha'))
                        <div class="alert alert-danger">
                            {{ $errors->first('fecha') }}
                        </div>
                    @endif
                </div>

                <div class="col-6">
                    <label for="hora" class="form-label">Hora</label>
                    <input type="time" value="{{ $temperatura->hora }}" class="form-control" id="hora"
                        name="hora" required>
                    @if ($errors->has('hora'))
                        <div class="alert alert-danger">
                            {{ $errors->first('hora') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mt-2">
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
