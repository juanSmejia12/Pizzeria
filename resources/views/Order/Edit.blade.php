@extends('layouts.app')

@section('content')
    <h1>Editar Pedido</h1>
    
    <!-- Formulario para editar un pedido -->
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="client_id">Cliente</label>
            <select name="client_id" class="form-control" required>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $order->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="branch_id">Sucursal</label>
            <select name="branch_id" class="form-control" required>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}" {{ $order->branch_id == $branch->id ? 'selected' : '' }}>
                        {{ $branch->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="total_price">Total</label>
            <input type="text" name="total_price" class="form-control" value="{{ $order->total_price }}" required>
        </div>

        <div class="form-group">
            <label for="status">Estatus</label>
            <select name="status" class="form-control" required>
                <option value="pendiente" {{ $order->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="en_preparacion" {{ $order->status == 'en_preparacion' ? 'selected' : '' }}>En Preparación</option>
                <option value="listo" {{ $order->status == 'listo' ? 'selected' : '' }}>Listo</option>
                <option value="entregado" {{ $order->status == 'entregado' ? 'selected' : '' }}>Entregado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="delivery_type">Tipo de Entrega</label>
            <select name="delivery_type" class="form-control" required>
                <option value="en_local" {{ $order->delivery_type == 'en_local' ? 'selected' : '' }}>En Local</option>
                <option value="a_domicilio" {{ $order->delivery_type == 'a_domicilio' ? 'selected' : '' }}>A Domicilio</option>
            </select>
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection