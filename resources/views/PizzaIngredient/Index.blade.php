@extends('layouts.app')

@section('content')
    <h1>Ingredientes de Pizza</h1>

    <a href="{{ route('pizza-ingredients.create') }}" class="btn btn-primary mb-3">Nuevo Ingrediente</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($pizzaIngredients->isEmpty())
        <p>No hay ingredientes registrados.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pizzaIngredients as $ingredient)
                    <tr>
                        <td>{{ $ingredient->id }}</td>
                        <td>{{ $ingredient->name }}</td>
                        <td>
                            <a href="{{ route('pizza-ingredients.edit', $ingredient->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('pizza-ingredients.destroy', $ingredient->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Deseas eliminar este ingrediente?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
