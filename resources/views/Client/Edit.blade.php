@extends('layouts.app')

@section('content')
    <h1>Editar Cliente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="address">Dirección:</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $client->address) }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $client->phone) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
