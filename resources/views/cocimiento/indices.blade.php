@extends('layouts.app')

@section('subtitle', 'Cocimientos')
@section('content_header_title', 'Cocimientos')
@section('content_header_subtitle', 'Grafica de Cocimientos')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="p-2">
        {!! $chart->container() !!}
    </div>
@stop

{{-- Push extra CSS --}}

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
@stop
