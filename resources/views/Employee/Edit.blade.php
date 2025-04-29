{{-- resources/views/employee/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Empleado</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $employee->user->name }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ $employee->user->email }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="position">Posición</label>
            <select name="position" class="form-control" required>
                <option value="cajero" {{ $employee->position == 'cajero' ? 'selected' : '' }}>Cajero</option>
                <option value="administrador" {{ $employee->position == 'administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="cocinero" {{ $employee->position == 'cocinero' ? 'selected' : '' }}>Cocinero</option>
                <option value="mensajero" {{ $employee->position == 'mensajero' ? 'selected' : '' }}>Mensajero</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="identification_number">Número de Identificación</label>
            <input type="text" name="identification_number" class="form-control" value="{{ $employee->identification_number }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="salary">Salario</label>
            <input type="number" name="salary" class="form-control" value="{{ $employee->salary }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Empleado</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
