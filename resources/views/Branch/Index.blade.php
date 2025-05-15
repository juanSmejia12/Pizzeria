@extends('layouts.app')

@section('content')
    <h1>Lista de Sucursales</h1>
    <a href="{{ route('branches.create') }}" class="btn btn-primary">Crear Sucursal</a>

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    @if ($branches->isEmpty())
        <div class="alert alert-info mt-2">
            No hay sucursales registradas.
        </div>
    @else
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($branches as $branch)
                    <tr>
                        <td>{{ $branch->id }}</td>
                        <td>{{ $branch->name }}</td>
                        <td>{{ $branch->address }}</td>
                        <td>
                            <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Está seguro de eliminar esta sucursal?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
