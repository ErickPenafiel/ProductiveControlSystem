@extends('layouts.app')

@section('subtitle', 'Proceso Productivo')
@section('content_header_title', 'Proceso Productivo')
@section('content_header_subtitle', 'Proceso Productivo')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">

        <div class="d-flex justify-content-center align-items-center">
            <div class="row px-5 pb-5">
                <div class="d-flex bg-white rounded-lg shadow">
                    <img src="{{ asset('storage/images/ProcesoProductivo.png') }}" alt="proceso-productivo" class="img-fluid">
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
