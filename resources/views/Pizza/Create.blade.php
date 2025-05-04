{{-- resources/views/employee/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Empleado</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="position">Posición</label>
            <select name="position" class="form-control" required>
                <option value="cajero">Cajero</option>
                <option value="administrador">Administrador</option>
                <option value="cocinero">Cocinero</option>
                <option value="mensajero">Mensajero</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="identification_number">Número de Identificación</label>
            <input type="text" name="identification_number" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="salary">Salario</label>
            <input type="number" name="salary" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">Crear Empleado</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
