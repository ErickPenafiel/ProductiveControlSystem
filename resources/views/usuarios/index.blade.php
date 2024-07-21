@extends('layouts.app')

@section('subtitle', 'Lista de Usuarios')
@section('content_header_title', 'Usuarios')
@section('content_header_subtitle', 'Lista de Usuarios')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Nombre</th>
                        <th class="text-center" scope="col">Correo Electronico</th>
                        <th class="text-center" scope="col">Roles</th>
                        <th class="text-center" scope="col">Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <th class="text-center" scope="row">{{ $usuario->id }}</th>
                            <td class="text-center">{{ $usuario->name }}</td>
                            <td class="text-center">{{ $usuario->email }}</td>
                            <td class="text-center">
                                @foreach ($usuario->roles as $role)
                                    <span class="badge badge-primary">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning mx-2">
                                    Editar</a>
                                {{-- <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                        Eliminar</button>
                                </form> --}}

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="{{ '#staticBackdrop' . $usuario->id }}"><i class="fa fa-trash"></i>
                                    Eliminar</button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-2">
            {{ $usuarios->links() }}
        </div>
    </div>

    @foreach ($usuarios as $usuario)
        <div class="modal fade" id="{{ 'staticBackdrop' . $usuario->id }}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Eliminar Registro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Está seguro de eliminar el usuario {{ $usuario->name }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endpush


{{-- Push extra scripts --}}

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endpush
