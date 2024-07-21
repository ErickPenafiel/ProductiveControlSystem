@extends('layouts.app')

@section('subtitle', 'Malteria')
@section('content_header_title', 'Malteria')
@section('content_header_subtitle', 'Agregar Registro')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <form action="{{ route('malteria.store') }}" method="POST">
            @csrf
            <div class="row mb-2">
                <label for="cancha_id" class="form-label">Cantidad de Entrada</label>
                <select name="cancha_id" id="cancha_id" class="form-control">
                    @foreach ($canchas as $cancha)
                        <option value="{{ $cancha->id }}">{{ $cancha->nombre }}</option>
                    @endforeach
                </select>
                @if ($errors->has('cancha_id'))
                    <div class="alert alert-danger">
                        {{ $errors->first('cancha_id') }}
                    </div>
                @endif
            </div>

            <div class="row mb-2">
                <div class="col-6">
                    <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                    @if ($errors->has('fecha_inicio'))
                        <div class="alert alert-danger">
                            {{ $errors->first('fecha_inicio') }}
                        </div>
                    @endif
                </div>

                <div class="col-6">
                    <label for="fecha_fin" class="form-label">Fecha de finalizacion</label>
                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                    @if ($errors->has('fecha_fin'))
                        <div class="alert alert-danger">
                            {{ $errors->first('fecha_fin') }}
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
