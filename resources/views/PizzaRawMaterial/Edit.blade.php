@extends('layouts.app')

@section('content')
    <h1>Editar Materia Prima de Pizza</h1>
    <form action="{{ route('pizza_raw_materials.update', $pizza_raw_material->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="pizza_id">Pizza</label>
            <select name="pizza_id" class="form-control" required>
                @foreach ($pizzas as $pizza)
                    <option value="{{ $pizza->id }}" {{ $pizza_raw_material->pizza_id == $pizza->id ? 'selected' : '' }}>
                        {{ $pizza->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="raw_material_id">Materia Prima</label>
            <select name="raw_material_id" class="form-control" required>
                @foreach ($raw_materials as $raw_material)
                    <option value="{{ $raw_material->id }}" {{ $pizza_raw_material->raw_material_id == $raw_material->id ? 'selected' : '' }}>
                        {{ $raw_material->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="text" name="quantity" class="form-control" value="{{ $pizza_raw_material->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
