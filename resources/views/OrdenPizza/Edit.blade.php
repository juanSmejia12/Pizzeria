{{-- resources/views/order_pizza/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Pizza del Pedido</h1>
    <form action="{{ route('order_pizza.update', $orderPizza->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="order_id">ID del Pedido</label>
            <input type="number" name="order_id" class="form-control" value="{{ $orderPizza->order_id }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="pizza_size_id">ID del Tamaño de la Pizza</label>
            <input type="number" name="pizza_size_id" class="form-control" value="{{ $orderPizza->pizza_size_id }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" class="form-control" value="{{ $orderPizza->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Pizza del Pedido</button>
        <a href="{{ route('order_pizza.index') }}" class="btn btn