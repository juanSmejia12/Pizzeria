@extends('layouts.app')

@section('content')
    <h1>Editar Proveedor</h1>
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $supplier->name }}" required>
        </div>
        <div class="form-group">
            <label for="contact_info">Información de Contacto</label>
            <input type="text" name="contact_info" class="form-control" value="{{ $supplier->contact_info }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
