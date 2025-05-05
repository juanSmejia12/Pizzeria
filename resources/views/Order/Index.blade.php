@extends('layouts.app')

@section('content')
    <h1>Pedidos</h1>

    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Nuevo Pedido</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($orders->isEmpty())
        <p>No hay pedidos registrados.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Sucursal</th>
                    <th>Total</th>
                    <th>Estatus</th>
                    <th>Entrega</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->client->name }}</td>
                        <td>{{ $order->branch->name }}</td>
                        <td>${{ number_format($order->total_price, 2) }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $order->status)) }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $order->delivery_type)) }}</td>
                        <td>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar este pedido?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
