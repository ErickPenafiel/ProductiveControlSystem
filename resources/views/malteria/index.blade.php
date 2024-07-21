@extends('layouts.app')

@section('subtitle', 'Malteria')
@section('content_header_title', 'Malteria')
@section('content_header_subtitle', 'Lista de Malteria')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Cancha</th>
                        <th class="text-center" scope="col">Fecha de Inicio</th>
                        <th class="text-center" scope="col">Fecha de Finalizacion</th>
                        <th class="text-center" scope="col">Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($malterias as $malteria)
                        <tr>
                            <th class="text-center" scope="row">{{ $malteria->id }}</th>
                            <td class="text-center">{{ $malteria->cancha->nombre }}</td>
                            <td class="text-center">{{ $malteria->fecha_inicio }}</td>
                            <td class="text-center">{{ $malteria->fecha_fin }}</td>
                            <td class="text-center">
                                <a href="{{ route('malteria.show', $malteria->id) }}" class="btn btn-primary">
                                    <i class="fa fa-eye"></i> Temperaturas</a>
                                <a href="{{ route('malteria.edit', $malteria->id) }}" class="btn btn-warning mx-2">
                                    Editar</a>
                                <form action="{{ route('malteria.destroy', $malteria->id) }}" method="POST"
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
            {{ $malterias->links() }}
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
