{{-- resources/views/pizza/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Pizzas</h1>
    <a href="{{ route('pizzas.create') }}" class="btn btn-primary mb-3">Nueva Pizza</a>
    <table class="table table-striped">
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
                        <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
