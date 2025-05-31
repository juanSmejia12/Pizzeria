{{-- resources/views/order_extra_ingredient/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ingredientes Extra en los Pedidos</h1>
    <a href="{{ route('order_extra_ingredient.create') }}" class="btn btn-primary mb-3">Agregar Ingrediente Extra</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID del Pedido</th>
                <th>ID del Ingrediente Extra</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderExtraIngredients as $orderExtraIngredient)
                <tr>
                    <td>{{ $orderExtraIngredient->id }}</td>
                    <td>{{ $orderExtraIngredient->order_id }}</td>
                    <td>{{ $orderExtraIngredient->extra_ingredient_id }}</td>
                    <td>{{ $orderExtraIngredient->quantity }}</td>
                    <td>
                        <a href="{{ route('order_extra_ingredient.edit', $orderExtraIngredient->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('order_extra_ingredient.destroy', $orderExtraIngredient->id) }}" method="POST" style="display:inline;">
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
