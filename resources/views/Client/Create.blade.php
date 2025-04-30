@extends('layouts.app')

@section('content')
    <h1>Crear Cliente</h1>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ request('user_id') }}">

        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" name="address" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cliente</button>
    </form>
@endsection

