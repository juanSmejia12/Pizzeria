@extends('layouts.app')

@section('content')
    <h1>Lista de Ingredientes</h1>
    <a href="{{ route('ingredients.create') }}" class="btn btn-primary">Agregar Ingrediente</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->id }}</td>
                    <td>{{ $ingredient->name }}</td>
                    <td>
                        <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
