@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Tamaño de Pizza</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pizza_sizes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Tamaño</label>
            <input type="text" class="form-control" id="name" name="name" maxlength="100" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" max="999999.99" required value="{{ old('price') }}">
        </div>

        <button type="submit" class="btn btn-success">Guardar Tamaño</button>
        <a href="{{ route('pizza_sizes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
