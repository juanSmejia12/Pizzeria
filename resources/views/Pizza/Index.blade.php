{{-- resources/views/pizza/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Lista de Pizzas</h1>
    <a href="{{ route('pizzas.create') }}" class="btn btn-primary">Nueva Pizza</a>

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    @if ($pizzas->isEmpty())
        <div class="alert alert-info mt-2">
            No hay pizzas registradas.
        </div>
    @else
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pizzas as $pizza)
                    <tr>
                        <td>{{ $pizza->id }}</td>
                        <td>{{ $pizza->name }}</td>
                        <td>
                            <a href="{{ route('pizzas.edit', $pizza->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
