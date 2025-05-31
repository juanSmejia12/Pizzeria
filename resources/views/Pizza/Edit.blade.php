{{-- resources/views/pizza/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Pizza</h1>

    <form action="{{ route('pizzas.update', $pizza->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $pizza->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Pizza</button>
        <a href="{{ route('pizzas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

