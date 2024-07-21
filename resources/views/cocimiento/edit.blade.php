@extends('layouts.app')

@section('subtitle', 'Cocimientos')
@section('content_header_title', 'Cocimientos')
@section('content_header_subtitle', 'Editar Registro')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <form action="{{ route('cocimiento.update', $cocimiento->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row mb-2">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" value="{{ $cocimiento->fecha }}" class="form-control" id="fecha" name="fecha"
                    required>
                @if ($errors->has('fecha'))
                    <div class="alert alert-danger">
                        {{ $errors->first('fecha') }}
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
