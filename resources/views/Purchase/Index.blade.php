{{-- resources/views/purchase/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Compras</h1>
    <a href="{{ route('purchases.create') }}" class="btn btn-primary mb-3">Registrar Compra</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proveedor</th>
                <th>Materia Prima</th>
                <th>Cantidad</th>
                <th>Precio de Compra</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $purchase->supplier_id }}</td>
                    <td>{{ $purchase->raw_material_id }}</td>
                    <td>{{ $purchase->quantity }}</td>
                    <td>${{ number_format($purchase->purchase_price, 2) }}</td>
                    <td>
                        <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" style="display:inline;">
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
