@extends('layouts.app')

@section('content')
    <h1>Crear Cliente</h1>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">ID de Usuario</label>
            <input type="number" name="user_id" id="user_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>

        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar Cliente</button>
    </form>
@endsection
