@extends('layouts.app')

@section('content')
    <h1>Lista de Ingredientes</h1>
    <a href="{{ route('ingredients.create') }}" class="btn btn-primary">Nuevo Ingrediente</a>

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    @if ($ingredients->isEmpty())
        <div class="alert alert-info mt-2">
            No hay ingredientes registrados.
        </div>
    @else
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingredients as $ingredient)
                    <tr>
                        <td>{{ $ingredient->id }}</td>
                        <td>{{ $ingredient->name }}</td>
                        <td>${{ number_format($ingredient->price, 2) }}</td>
                        <td>
                            <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
