@extends('layouts.app')

@section('content')
    <h1>Agregar Ingrediente</h1>
    <form action="{{ route('ingredients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="mmname" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection