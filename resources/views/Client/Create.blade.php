@extends('layouts.app')

@section('content')
    <h1>Crear Cliente</h1>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
