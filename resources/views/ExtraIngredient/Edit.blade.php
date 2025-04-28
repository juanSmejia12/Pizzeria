{{-- resources/views/extra_ingredients/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Ingrediente Extra</h1>
    <form action="{{ route('extra-ingredients.update', $extraIngredient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Nombre del Ingrediente</label>
            <input type="text" name="name" class="form-control" value="{{ $extraIngredient->name }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="price">Precio</label>
            <input type="number" name="price" class="form-control" value="{{ $extraIngredient->price }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Ingrediente Extra</button>
        <a href="{{ route('extra-ingredients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection