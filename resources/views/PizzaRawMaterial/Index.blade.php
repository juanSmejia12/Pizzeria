@extends('layouts.app')

@section('content')
    <h1>Materias Primas por Pizza</h1>

    <a href="{{ route('pizza-raw-materials.create') }}" class="btn btn-primary mb-3">Asignar Materia Prima a Pizza</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($pizzaRawMaterials->isEmpty())
        <p>No hay materias primas asignadas.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pizza</th>
                    <th>Materia Prima</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pizzaRawMaterials as $prm)
                    <tr>
                        <td>{{ $prm->pizza->name }}</td>
                        <td>{{ $prm->rawMaterial->name }}</td>
                        <td>{{ $prm->quantity }}</td>
                        <td>{{ $prm->rawMaterial->unit }}</td>
                        <td>
                            <a href="{{ route('pizza-raw-materials.edit', $prm->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('pizza-raw-materials.destroy', $prm->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta asignación?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
