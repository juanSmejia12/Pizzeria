@extends('layouts.app')

@section('content')
    <h1>Crear Pedido</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="client_id">Cliente</label>
            <select name="client_id" class="form-control" required>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-2">
            <label for="branch_id">Sucursal</label>
            <select name="branch_id" class="form-control" required>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-2">
            <label for="total_price">Total</label>
            <input type="number" name="total_price" class="form-control" step="0.01" required>
        </div>

        <div class="form-group mt-2">
            <label for="status">Estatus</label>
            <select name="status" class="form-control" required>
                <option value="pendiente">Pendiente</option>
                <option value="en_preparacion">En Preparación</option>
                <option value="listo">Listo</option>
                <option value="entregado">Entregado</option>
            </select>
        </div>

        <div class="form-group mt-2">
            <label for="delivery_type">Tipo de Entrega</label>
            <select name="delivery_type" class="form-control" required>
                <option value="en_local">En Local</option>
                <option value="a_domicilio">A Domicilio</option>
            </select>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
