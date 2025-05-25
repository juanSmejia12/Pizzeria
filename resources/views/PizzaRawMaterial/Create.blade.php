@extends('layouts.app')

@section('content')
    <h1>Asignar Materia Prima a Pizza</h1>

    <form action="{{ route('pizza-raw-materials.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="pizza_id">Pizza</label>
            <select name="pizza_id" class="form-control" required>
                @foreach ($pizzas as $pizza)
                    <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="raw_material_id">Materia Prima</label>
            <select name="raw_material_id" class="form-control" required>
                @foreach ($rawMaterials as $material)
                    <option value="{{ $material->id }}">{{ $material->name }} ({{ $material->unit }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" class="form-control" step="0.01" min="0" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('pizza-raw-materials.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
