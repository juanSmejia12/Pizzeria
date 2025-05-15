@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Usuario</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Hay algunos errores en el formulario.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rol</label>
                <select name="role" class="form-control" required>
                    <option value="cliente" {{ $user->role == 'cliente' ? 'selected' : '' }}>Cliente</option>
                    <option value="empleado" {{ $user->role == 'empleado' ? 'selected' : '' }}>Empleado</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña (opcional)</label>
                <input type="password" name="password" class="form-control" placeholder="Dejar en blanco para mantener la actual">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection