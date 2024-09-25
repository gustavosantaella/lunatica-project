@extends('adminlte::page')

@section('title', $user ? 'Editar Usuario' : 'Crear Usuario')

@section('content_header')
    <h1>{{ $user ? 'Editar' : 'Crear' }} Usuario</h1>
@stop

@section('content')
    <form action="{{ $user ? route('users.update', $user->id) : route('users.store') }}" method="POST">
        @csrf
        @if ($user)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}"
                required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña {{ $user ? '(Dejar vacío para no cambiarla)' : '' }}</label>
            <input type="password" name="password" class="form-control" {{ $user ? '' : 'required' }}>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" {{ $user ? '' : 'required' }}>
        </div>

        <button type="submit" class="btn btn-primary">{{ $user ? 'Actualizar' : 'Crear' }} Usuario</button>
    </form>
@stop
