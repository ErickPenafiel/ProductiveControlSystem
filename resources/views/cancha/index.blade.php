@extends('layouts.app')

@section('subtitle', 'Lista de Canchas')
@section('content_header_title', 'Canchas')
@section('content_header_subtitle', 'Lista de Canchas')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Cancha</th>
                        <th class="text-center" scope="col">Fecha</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($canchas as $cancha)
                        <tr>
                            <th class="text-center" scope="row">{{ $cancha->id }}</th>
                            <td class="text-center">{{ $cancha->nombre }}</td>
                            <td class="text-center">{{ $cancha->created_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('cancha.edit', $cancha->id) }}" class="btn btn-warning mx-2">
                                    Editar</a>
                                <form action="{{ route('cancha.destroy', $cancha->id) }}" method="POST"
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
