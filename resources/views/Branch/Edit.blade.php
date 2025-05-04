{{-- resources/views/branch/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Sucursal</h1>
    <form action="{{ route('branches.update', $branch->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Nombre de la Sucursal</label>
            <input type="text" name="name" class="form-control" value="{{ $branch->name }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="address">Dirección</label>
            <input type="text" name="address" class="form-control" value="{{ $branch->address }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Sucursal</button>
        <a href="{{ route('branches.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
