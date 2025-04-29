{{-- resources/views/Employees/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Empleados</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Nuevo Empleado</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Número de Identificación</th>
                <th>Puesto</th>
                <th>Salario</th>
                <th>Fecha de Contratación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->user->name }}</td> {{-- Asumiendo que el nombre del empleado está en la tabla users --}}
                    <td>{{ $employee->identification_number }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->salary }}</td>
                    <td>{{ $employee->hire_date }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
