@extends('layouts.app')

@section('content')
    <h1>Lista de Proveedores</h1>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Agregar Proveedor</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Contacto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->contact_info }}</td>
                    <td>
                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
