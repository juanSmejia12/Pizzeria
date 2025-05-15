@extends('layouts.app')

@section('content')
    <h1>Crear Pedido</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Cliente</label>
            <select name="client_id" id="client_id" class="form-control" required>
                <option value="">Seleccione un Cliente</option>
                @foreach ($clients as $client)
                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                    {{ $client->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Sucursal</label>
            <select name="branch_id" class="form-control">
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Repartidor (opcional)</label>
            <select name="delivery_person_id" class="form-control">
                <option value="">Sin asignar</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Precio Total</label>
            <input type="number" name="total_price" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="status" class="form-control" required>
                <option value="pendiente">Pendiente</option>
                <option value="en_preparacion">En preparación</option>
                <option value="listo">Listo</option>
                <option value="entregado">Entregado</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Tipo de entrega</label>
            <select name="delivery_type" class="form-control" required>
                <option value="en_local">En local</option>
                <option value="a_domicilio">A domicilio</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

