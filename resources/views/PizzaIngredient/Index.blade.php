@extends('layouts.app')

@section('content')
    <h1>Lista de Ingredientes de Pizza</h1>
    <a href="{{ route('pizza_ingredients.create') }}" class="btn btn-primary">Agregar Ingrediente a Pizza</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pizza</th>
                <th>Ingrediente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pizza_ingredients as $pizza_ingredient)
                <tr>
                    <td>{{ $pizza_ingredient->id }}</td>
                    <td>{{ $pizza_ingredient->pizza->name }}</td>
                    <td>{{ $pizza_ingredient->ingredient->name }}</td>
                    <td>
                        <a href="{{ route('pizza_ingredients.edit', $pizza_ingredient->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection