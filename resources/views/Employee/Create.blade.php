@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Empleado</h1>

    {{-- Mensajes de error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <input type="hidden" name="user_id" value="{{ old('user_id', $user_id ?? '') }}">

        <div class="mb-3">
            <label for="identification_number" class="form-label">Número de Identificación</label>
            <input type="text" class="form-control" id="identification_number" name="identification_number" maxlength="20" required value="{{ old('identification_number') }}">
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Puesto</label>
            <select name="position" id="position" class="form-select" required>
                <option value="">Seleccione un puesto</option>
                <option value="cajero" {{ old('position') == 'cajero' ? 'selected' : '' }}>Cajero</option>
                <option value="administrador" {{ old('position') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="cocinero" {{ old('position') == 'cocinero' ? 'selected' : '' }}>Cocinero</option>
                <option value="mensajero" {{ old('position') == 'mensajero' ? 'selected' : '' }}>Mensajero</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salario</label>
            <input type="number" class="form-control" id="salary" name="salary" step="0.01" max="99999999.99" required value="{{ old('salary') }}">
        </div>

        <div class="mb-3">
            <label for="hire_date" class="form-label">Fecha de Contratación</label>
            <input type="date" class="form-control" id="hire_date" name="hire_date" required value="{{ old('hire_date') }}">
        </div>

        <button type="submit" class="btn btn-success">Guardar Empleado</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection