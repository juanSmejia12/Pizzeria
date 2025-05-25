@extends('layouts.app')

@section('content')
    <h1>Editar Ingrediente de Pizza</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pizza-ingredients.update', $pizzaIngredient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre del Ingrediente</label>
            <input type="text" name="name" class="form-control" value="{{ $pizzaIngredient->name }}" required>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('pizza-ingredients.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
