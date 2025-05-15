@extends('layouts.app')

@section('content')
    <h1>Editar Pedido #{{ $order->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Cliente</label>
            <select name="client_id" class="form-control">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $order->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Sucursal</label>
            <select name="branch_id" class="form-control">
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}" {{ $order->branch_id == $branch->id ? 'selected' : '' }}>
                        {{ $branch->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Repartidor (opcional)</label>
            <select name="delivery_person_id" class="form-control">
                <option value="">Sin asignar</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $order->delivery_person_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Precio Total</label>
            <input type="number" name="total_price" class="form-control" value="{{ $order->total_price }}" step="0.01">
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="status" class="form-control">
                @foreach (['pendiente', 'en_preparacion', 'listo', 'entregado'] as $status)
                    <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tipo de entrega</label>
            <select name="delivery_type" class="form-control">
                @foreach (['en_local', 'a_domicilio'] as $type)
                    <option value="{{ $type }}" {{ $order->delivery_type == $type ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_', ' ', $type)) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
