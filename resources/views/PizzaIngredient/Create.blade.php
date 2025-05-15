@extends('layouts.app')

@section('content')
    <h1>Crear Ingrediente de Pizza</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pizza-ingredients.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre del Ingrediente</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('pizza-ingredients.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
