@extends('layouts.app')

@section('content')
    <h1>Lista de Materias Primas</h1>
    <a href="{{ route('raw_materials.create') }}" class="btn btn-primary">Agregar Materia Prima</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Unidad</th>
                <th>Stock Actual</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($raw_materials as $raw_material)
                <tr>
                    <td>{{ $raw_material->id }}</td>
                    <td>{{ $raw_material->name }}</td>
                    <td>{{ $raw_material->unit }}</td>
                    <td>{{ $raw_material->current_stock }}</td>
                    <td>
                        <a href="{{ route('raw_materials.edit', $raw_material->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
