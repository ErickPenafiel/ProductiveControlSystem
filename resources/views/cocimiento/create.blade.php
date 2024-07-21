@extends('layouts.app')

@section('subtitle', 'Cocimientos')
@section('content_header_title', 'Cocimientos')
@section('content_header_subtitle', 'Registrar Cocimiento')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <form action="{{ route('cocimiento.store') }}" method="POST">
            @csrf

            <div class="row mb-2">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
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
