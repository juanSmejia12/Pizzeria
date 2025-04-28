@extends('layouts.app')

@section('content')
    <h1>Agregar Ingrediente a Pizza</h1>
    <form action="{{ route('pizza_ingredients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="pizza_id">Pizza</label>
            <select name="pizza_id" class="form-control" required>
                @foreach ($pizzas as $pizza)
                    <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ingredient_id">Ingrediente</label>
            <select name="ingredient_id" class="form-control" required>
                @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection