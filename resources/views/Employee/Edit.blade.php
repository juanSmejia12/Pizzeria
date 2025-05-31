@extends('layouts.app')

@section('content')
    <h1>Editar Empleado</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Hay problemas con los datos ingresados:<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="position" class="form-label">Puesto</label>
            <select name="position" id="position" class="form-select">
                <option value="cajero" {{ $employee->position == 'cajero' ? 'selected' : '' }}>Cajero</option>
                <option value="administrador" {{ $employee->position == 'administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="cocinero" {{ $employee->position == 'cocinero' ? 'selected' : '' }}>Cocinero</option>
                <option value="mensajero" {{ $employee->position == 'mensajero' ? 'selected' : '' }}>Mensajero</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="identification_number" class="form-label">Número de Identificación</label>
            <input type="text" name="identification_number" class="form-control" value="{{ old('identification_number', $employee->identification_number) }}">
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salario</label>
            <input type="number" step="0.01" name="salary" class="form-control" value="{{ old('salary', $employee->salary) }}">
        </div>

        <div class="mb-3">
            <label for="hire_date" class="form-label">Fecha de Contratación</label>
            <input type="date" name="hire_date" class="form-control" value="{{ old('hire_date', $employee->hire_date) }}">
        </div>

        <button type="submit" class="btn btn-success">Actualizar Empleado</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
