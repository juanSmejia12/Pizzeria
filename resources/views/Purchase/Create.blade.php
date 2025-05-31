{{-- resources/views/purchase/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nueva Compra</h1>
    <form action="{{ route('purchases.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="supplier_id">ID del Proveedor</label>
            <input type="number" name="supplier_id" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="raw_material_id">ID de la Materia Prima</label>
            <input type="number" name="raw_material_id" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" class="form-control" step="0.01" required>
        </div>
        <div class="form-group mb-3">
            <label for="purchase_price">Precio de Compra</label>
            <input type="number" name="purchase_price" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">Registrar Compra</button>
        <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
