{-- resources/views/order_extra_ingredient/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Ingrediente Extra al Pedido</h1>
    <form action="{{ route('order_extra_ingredient.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="order_id">ID del Pedido</label>
            <input type="number" name="order_id" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="extra_ingredient_id">ID del Ingrediente Extra</label>
            <input type="number" name="extra_ingredient_id" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Agregar Ingrediente Extra</button>
        <a href="{{ route('order_extra_ingredient.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection