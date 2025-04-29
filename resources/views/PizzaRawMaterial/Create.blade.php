@extends('layouts.app')

@section('content')
    <h1>Agregar Materia Prima a Pizza</h1>
    <form action="{{ route('pizza_raw_materials.store') }}" method="POST">
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
                @foreach ($raw_materials as $raw_material)
                    <option value="{{ $raw_material->id }}">{{ $raw_material->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="text" name="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
