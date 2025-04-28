{{-- resources/views/order_pizza/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pizzas en los Pedidos</h1>
    <a href="{{ route('order_pizza.create') }}" class="btn btn-primary mb-3">Agregar Pizza al Pedido</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID del Pedido</th>
                <th>ID del Tamaño de Pizza</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderPizzas as $orderPizza)
                <tr>
                    <td>{{ $orderPizza->id }}</td>
                    <td>{{ $orderPizza->order_id }}</td>
                    <td>{{ $orderPizza->pizza_size_id }}</td>
                    <td>{{ $orderPizza->quantity }}</td>
                    <td>
                        <a href="{{ route('order_pizza.edit', $orderPizza->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('order_pizza.destroy', $orderPizza->id) }}" method="POST" style="display:inline;">
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