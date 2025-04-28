{{-- resources/views/extra_ingredients/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Ingredientes Extra</h1>
    <a href="{{ route('extra-ingredients.create') }}" class="btn btn-primary mb-3">Nuevo Ingrediente Extra</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($extraIngredients as $extraIngredient)
                <tr>
                    <td>{{ $extraIngredient->id }}</td>
                    <td>{{ $extraIngredient->name }}</td>
                    <td>${{ number_format($extraIngredient->price, 2) }}</td>
                    <td>
                        <a href="{{ route('extra-ingredients.edit', $extraIngredient->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('extra-ingredients.destroy', $extraIngredient->id) }}" method="POST" style="display:inline;">
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