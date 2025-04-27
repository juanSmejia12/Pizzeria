<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles') {{-- este espacio seria por si se desea implementar un estilo a una vista en especifico --}}
</head>

<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="flex h-screen">
        <div class="w-64 bg-gray-800 text-white p-4">
            <h2 class="text-xl font-semibold mb-6">Menú</h2>
            <ul>
                {{-- Menú principal de navegación --}}
                <li><a href="{{ route('dashboard') }}" class="block py-2">Dashboard</a></li>
                <li><a href="{{ route('users.index') }}" class="block py-2">Usuarios</a></li>
                <li><a href="{{ route('orders.index') }}" class="block py-2">Pedidos</a></li>
                <li><a href="{{ route('pizzas.index') }}" class="block py-2">Pizzas</a></li>
                <li><a href="{{ route('inventory.index') }}" class="block py-2">Inventario</a></li>
                <li><a href="{{ route('suppliers.index') }}" class="block py-2">Proveedores</a></li>
                <li><a href="{{ route('branches.index') }}" class="block py-2">Sucursales</a></li>
            </ul>
        </div>

        <div class="flex-1 p-6">
            @yield('content') {{-- Aquí se incluira el contenido específico de cada vista --}}
        </div>
    </div>
</body>

</html>
