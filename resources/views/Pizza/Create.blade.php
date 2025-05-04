{{-- resources/views/employee/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Pizza</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pizzas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la Pizza</label>
            <input type="text" class="form-control" id="name" name="name" maxlength="100" required value="{{ old('name') }}">
        </div>

        <button type="submit" class="btn btn-success">Guardar Pizza</button>
        <a href="{{ route('pizzas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
