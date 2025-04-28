@extends('layouts.app')

@section('content')
    <h1>Editar Ingrediente</h1>
    <form action="{{ route('ingredients.update', $ingredient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $ingredient->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection