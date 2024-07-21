@extends('layouts.app')

@section('subtitle', 'Malteria')
@section('content_header_title', 'Malteria')
@section('content_header_subtitle', 'Lista de Malteria')

{{-- Content body: main page content --}}

@section('content_body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('temperatura.create', $malteria->id) }}"
                    class="btn btn-primary mb-2 {{ count($temperaturas) == 5 ? 'disabled' : '' }}"
                    disabled="{{ count($temperaturas) == 5 }}">Agregar
                    Temperatura</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Temperatura</th>
                        <th class="text-center" scope="col">Fecha</th>
                        <th class="text-center" scope="col">Hora</th>
                        <th class="text-center" scope="col">Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    @php $index = 1; @endphp
                    @foreach ($temperaturas as $temp)
                        <tr>
                            <th class="text-center" scope="row">{{ $index }}</th>
                            <td
                                class="text-center {{ $temp->temperatura >= 16 && $temp->temperatura <= 18 ? '' : 'text-danger' }}">
                                {{ $temp->temperatura }}</td>
                            <td class="text-center">{{ $temp->fecha }}</td>
                            <td class="text-center">{{ $temp->hora }}</td>
                            <td class="text-center">
                                <a href="{{ route('temperatura.edit', $temp->id) }}" class="btn btn-warning mx-2">
                                    Editar</a>
                                <form action="{{ route('temperatura.destroy', $temp->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                        Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @php $index++; @endphp
                    @endforeach
                </tbody>
            </table>
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
