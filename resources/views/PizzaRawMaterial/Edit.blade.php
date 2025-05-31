@extends('layouts.app')

@section('content')
    <h1>Editar Materia Prima de Pizza</h1>

    <form action="{{ route('pizza-raw-materials.update', $pizzaRawMaterial->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="pizza_id">Pizza</label>
            <select name="pizza_id" class="form-control" required>
                @foreach ($pizzas as $pizza)
                    <option value="{{ $pizza->id }}" {{ $pizzaRawMaterial->pizza_id == $pizza->id ? 'selected' : '' }}>
                        {{ $pizza->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="raw_material_id">Materia Prima</label>
            <select name="raw_material_id" class="form-control" required>
                @foreach ($rawMaterials as $material)
                    <option value="{{ $material->id }}" {{ $pizzaRawMaterial->raw_material_id == $material->id ? 'selected' : '' }}>
                        {{ $material->name }} ({{ $material->unit }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" class="form-control" value="{{ $pizzaRawMaterial->quantity }}" step="0.01" min="0" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('pizza-raw-materials.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
