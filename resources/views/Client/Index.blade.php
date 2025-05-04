@extends('layouts.app')

@section('content')
    <h1>Lista de Clientes</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">Crear Cliente</a>
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
                     {{--   <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Editar</a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection