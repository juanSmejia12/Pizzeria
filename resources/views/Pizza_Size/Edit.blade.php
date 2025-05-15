@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tamaño de Pizza</h1>

    <form action="{{ route('pizza_sizes.update', $pizzaSize->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $pizzaSize->name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="price">Precio</label>
            <input type="number" name="price" class="form-control" value="{{ $pizzaSize->price }}" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Tamaño</button>
        <a href="{{ route('pizza_sizes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
