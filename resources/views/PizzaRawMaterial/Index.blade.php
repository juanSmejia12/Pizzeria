@extends('layouts.app')

@section('content')
    <h1>Lista de Materias Primas de Pizzas</h1>
    <a href="{{ route('pizza_raw_materials.create') }}" class="btn btn-primary">Agregar Materia Prima a Pizza</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pizza</th>
                <th>Materia Prima</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pizza_raw_materials as $pizza_raw_material)
                <tr>
                    <td>{{ $pizza_raw_material->id }}</td>
                    <td>{{ $pizza_raw_material->pizza->name }}</td>
                    <td>{{ $pizza_raw_material->raw_material->name }}</td>
                    <td>{{ $pizza_raw_material->quantity }}</td>
                    <td>
                        <a href="{{ route('pizza_raw_materials.edit', $pizza_raw_material->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
