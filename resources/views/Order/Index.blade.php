@extends('layouts.app')

@section('content')
    <h1>Lista de Pedidos</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Crear Pedido</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($orders->isEmpty())
        <div class="alert alert-info">No hay pedidos registrados.</div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Sucursal</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Tipo de entrega</th>
                    <th>Repartidor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->client->name ?? 'N/A' }}</td>
                        <td>{{ $order->branch->name ?? 'N/A' }}</td>
                        <td>${{ number_format($order->total_price, 2) }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $order->delivery_type)) }}</td>
                        <td>{{ $order->deliveryPerson->name ?? 'Sin asignar' }}</td>
                        <td>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Está seguro de eliminar este pedido?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

