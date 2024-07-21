@extends('layouts.app')

@section('subtitle', 'Usuarios')
@section('content_header_title', 'Usuarios')
@section('content_header_subtitle', 'Editar Usuario')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container-fluid">
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-2">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" value="{{ $usuario->name }}" id="name" name="name" required>
                @if ($errors->has('name'))
                    <div class="alert alert-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="row mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" value="{{ $usuario->email }}" id="email" name="email"
                    required>
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="row mb-2">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="row mb-2">
                <label for="rol" class="form-label">Rol</label>
                {{-- Select multiple --}}
                <select class="form-select selectpicker col-12" id="rol" name="rol" required>
                    @foreach ($roles as $rol)
                        @foreach ($usuario->roles as $role)
                            @if ($role->name == $rol->name)
                                <option value="{{ $rol->name }}" selected>{{ ucfirst($rol->name) }}</option>
                            @else
                                <option value="{{ $rol->name }}">{{ ucfirst($rol->name) }}</option>
                            @endif
                        @endforeach
                    @endforeach
                </select>
                @if ($errors->has('rol'))
                    <div class="alert alert-danger">
                        {{ $errors->first('rol') }}
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endpush
