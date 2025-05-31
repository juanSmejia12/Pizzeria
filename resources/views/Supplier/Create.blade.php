@extends('layouts.app')

@section('content')
    <h1>Agregar Proveedor</h1>
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contact_info">Información de Contacto</label>
            <input type="text" name="contact_info" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
