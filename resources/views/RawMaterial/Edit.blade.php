@extends('layouts.app')

@section('content')
    <h1>Editar Materia Prima</h1>
    <form action="{{ route('raw_materials.update', $raw_material->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $raw_material->name }}" required>
        </div>
        <div class="form-group">
            <label for="unit">Unidad</label>
            <input type="text" name="unit" class="form-control" value="{{ $raw_material->unit }}" required>
        </div>
        <div class="form-group">
            <label for="current_stock">Stock Actual</label>
            <input type="text" name="current_stock" class="form-control" value="{{ $raw_material->current_stock }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
