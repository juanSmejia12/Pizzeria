@extends('layouts.app')

@section('content')
    <h1>Agregar Materia Prima</h1>
    <form action="{{ route('raw_materials.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="unit">Unidad</label>
            <input type="text" name="unit" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="current_stock">Stock Actual</label>
            <input type="text" name="current_stock" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
