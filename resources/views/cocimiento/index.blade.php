@extends('layouts.app')

@section('subtitle', 'Cocimientos')
@section('content_header_title', 'Cocimientos')
@section('content_header_subtitle', 'Lista de cocimientos')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Fecha</th>
                        <th class="text-center" scope="col">Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cocimientos as $cocimiento)
                        <tr>
                            <th class="text-center" scope="row">{{ $cocimiento->id }}</th>
                            <td class="text-center">{{ $cocimiento->fecha }}</td>
                            <td class="text-center">
                                <a href="{{ route('cocimiento.show', $cocimiento->id) }}" class="btn btn-primary">
                                    <i class="fa fa-eye"></i> Temperaturas</a>
                                <a href="{{ route('cocimiento.edit', $cocimiento->id) }}" class="btn btn-warning mx-2">
                                    Editar</a>
                                <form action="{{ route('cocimiento.destroy', $cocimiento->id) }}" method="POST"
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
            {{ $cocimientos->links() }}
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
