@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Ingrediente</h1>

    <form action="{{ route('ingredients.update', $ingredient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $ingredient->name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="price">Precio</label>
            <input type="number" name="price" class="form-control" value="{{ $ingredient->price }}" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Ingrediente</button>
        <a href="{{ route('ingredients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
