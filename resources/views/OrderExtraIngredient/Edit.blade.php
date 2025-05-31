{{-- resources/views/order_extra_ingredient/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Ingrediente Extra del Pedido</h1>
    <form action="{{ route('order_extra_ingredient.update', $orderExtraIngredient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="order_id">ID del Pedido</label>
            <input type="number" name="order_id" class="form-control" value="{{ $orderExtraIngredient->order_id }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="extra_ingredient_id">ID del Ingrediente Extra</label>
            <input type="number" name="extra_ingredient_id" class="form-control" value="{{ $orderExtraIngredient->extra_ingredient_id }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" class="form-control" value="{{ $orderExtraIngredient->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Ingrediente Extra</button>
        <a href="{{ route('order_extra_ingredient.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
