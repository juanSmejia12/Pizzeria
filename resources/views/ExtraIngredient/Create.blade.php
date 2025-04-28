{{-- resources/views/extra_ingredients/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Ingrediente Extra</h1>
    <form action="{{ route('extra-ingredient.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Nombre del Ingrediente</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="price">Precio</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">Agregar Ingrediente Extra</button>
        <a href="{{ route('extra-ingredient.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection