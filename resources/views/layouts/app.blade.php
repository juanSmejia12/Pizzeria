<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles') {{-- Este espacio sería para implementar estilos específicos --}}
</head>

<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="d-flex vh-100">
        <div class="bg-dark text-white p-4" style="width: 250px;">
            <h2 class="text-xl font-semibold mb-6">Menú</h2>

            @include('layouts.navigation') {{-- Incluimos el menú de navegación --}}
            
        </div>

        <div class="flex-grow-1 p-6">
            @yield('content') {{-- Aquí se incluirá el contenido específico de cada vista --}}
        </div>
    </div>

</body>
</html>
