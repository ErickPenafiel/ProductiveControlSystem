@extends('layouts.app')

@section('subtitle', 'Editar Registro')
@section('content_header_title', 'Canchas')
@section('content_header_subtitle', 'Editar Registro')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <form action="{{ route('cancha.update', $cancha->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row mb-2">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" value="{{ $cancha->nombre }}" class="form-control" id="nombre" name="nombre" required>
                @if ($errors->has('nombre'))
                    <div class="alert alert-danger">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
            </div>

            <div class="row mb-2">
                <input type="submit" class="btn btn-primary" value="Actualizar">
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
