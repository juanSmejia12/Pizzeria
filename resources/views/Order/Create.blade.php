@extends('layouts.app')

@section('content')
    <h1>Crear Pedido</h1>
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
        <div class="form-group">
            <label for="branch_id">Sucursal</label>
            <select name="branch_id" class="form-control" required>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection