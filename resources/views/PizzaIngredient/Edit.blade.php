@extends('layouts.app')

@section('content')
    <h1>Editar Ingrediente de Pizza</h1>
    <form action="{{ route('pizza_ingredients.update', $pizza_ingredient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="pizza_id">Pizza</label>
            <select name="pizza_id" class="form-control" required>
                @foreach ($pizzas as $pizza)
                    <option value="{{ $pizza->id }}" {{ $pizza_ingredient->pizza_id == $pizza->id ? 'selected' : '' }}>
                        {{ $pizza->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ingredient_id">Ingrediente</label>
            <select name="ingredient_id" class="form-control" required>
                @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}" {{ $pizza_ingredient->ingredient_id == $ingredient->id ? 'selected' : '' }}>
                        {{ $ingredient->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection