@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Sucursal</h1>

    <form action="{{ route('branches.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
            @error('address') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('branches.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
