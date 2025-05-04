@extends('layouts.app')

@section('content')
    <h1>Lista de Empleados</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">Nuevo Empleado</a>

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    @if ($employees->isEmpty())
        <div class="alert alert-info mt-2">
            No hay empleados registrados.
        </div>
    @else
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Identificación</th>
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
                        <td>{{ $employee->user->name ?? 'Sin usuario' }}</td>
                        <td>{{ $employee->identification_number }}</td>
                        <td>{{ ucfirst($employee->position) }}</td>
                        <td>${{ number_format($employee->salary, 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($employee->hire_date)->format('d/m/Y') }}</td>
                        <td>
                            {{-- <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Editar</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
