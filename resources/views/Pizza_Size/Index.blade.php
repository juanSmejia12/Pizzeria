@extends('layouts.app')

@section('content')
    <h1>Lista de Tamaños de Pizza</h1>
    <a href="{{ route('pizza_sizes.create') }}" class="btn btn-primary">Nuevo Tamaño</a>

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    @if ($pizzaSizes->isEmpty())
        <div class="alert alert-info mt-2">
            No hay tamaños de pizza registrados.
        </div>
    @else
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pizzaSizes as $size)
                    <tr>
                        <td>{{ $size->id }}</td>
                        <td>{{ $size->name }}</td>
                        <td>${{ number_format($size->price, 2) }}</td>
                        <td>
                            <a href="{{ route('pizza_sizes.edit', $size->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
