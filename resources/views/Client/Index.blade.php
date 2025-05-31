@extends('layouts.app')

@section('content')
    <h1>Lista de Clientes</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">Crear Cliente</a>

        @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    @if ($clients->isEmpty())
        <div class="alert alert-info mt-2">
            No hay clientes registrados.
        </div>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Está seguro de eliminar este cliente?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>

                      <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Editar</a> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection