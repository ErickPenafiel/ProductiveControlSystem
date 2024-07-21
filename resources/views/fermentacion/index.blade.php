@extends('layouts.app')

@section('subtitle', 'Fermentaciones')
@section('content_header_title', 'Fermentaciones')
@section('content_header_subtitle', 'Lista de Fermentaciones')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Cantidad de Entrada</th>
                        <th class="text-center" scope="col">Cantidad de Levadura</th>
                        <th class="text-center" scope="col">Temperatura</th>
                        <th class="text-center" scope="col">Fecha</th>
                        <th class="text-center" scope="col">Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($fermentaciones as $fermentacion)
                        <tr>
                            <th class="text-center" scope="row">{{ $fermentacion->id }}</th>
                            <td class="text-center">{{ $fermentacion->cantidadEntrada }}</td>
                            <td class="text-center">{{ $fermentacion->cantidadLevadura }}</td>
                            <td
                                class="text-center {{ $fermentacion->temperatura >= 11.4 && $fermentacion->temperatura <= 11.6 ? '' : 'text-danger' }}">
                                {{ $fermentacion->temperatura }}</td>
                            <td class="text-center">{{ $fermentacion->created_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('fermentacion.edit', $fermentacion->id) }}" class="btn btn-warning mx-2">
                                    Editar</a>
                                <form action="{{ route('fermentacion.destroy', $fermentacion->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                        Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-2">
            {{ $fermentaciones->links() }}
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
