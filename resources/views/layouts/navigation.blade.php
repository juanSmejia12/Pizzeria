<!-- Sidebar vertical -->
<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark vh-100" style="width: 250px; position: fixed;">
    <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Panel</span>
    </a>
    <hr>

    <ul class="nav nav-pills flex-column mb-auto">
        <!-- Enlace al Dashboard -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
        </li>

        <!-- Enlace al perfil -->
        <li>
            <a href="{{ route('profile.edit') }}" class="nav-link text-white {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                Perfil
            </a>
        </li>

        <!-- Enlace a Clientes -->
        <li>
            <a href="{{ route('clients.index') }}" class="nav-link text-white {{ request()->routeIs('clients.index') ? 'active' : '' }}">
                Clientes
            </a>
        </li>

        <!-- Enlace a Usuarios -->
        <li>
            <a href="{{ route('users.index') }}" class="nav-link text-white {{ request()->routeIs('users.index') ? 'active' : '' }}">
                Usuarios
            </a>
        </li>

        <!-- Enlace a Empleados -->
        <li>
            <a href="{{ route('employees.index') }}" class="nav-link text-white {{ request()->routeIs('employees.index') ? 'active' : '' }}">
                Empleados
            </a>
        </li>

        <!-- Enlace a Pizzas -->
        <li>
            <a href="{{ route('pizzas.index') }}" class="nav-link text-white {{ request()->routeIs('pizzas.index') ? 'active' : '' }}">
                Pizzas
            </a>
        </li>
        <li>
            <a href="{{ route('pizza_sizes.index') }}" class="nav-link text-white {{ request()->routeIs('pizza_sizes.index') ? 'active' : '' }}">
                Tamaños de Pizzas
            </a>
        </li>
        <li>
            <a href="{{ route('ingredients.index') }}" class="nav-link text-white {{ request()->routeIs('ingredients.index') ? 'active' : '' }}">
                Ingredientes
            </a>
        </li>
        <li>
            <a href="{{ route('pizza-ingredients.index') }}" class="nav-link text-white {{ request()->routeIs('pizza-ingredients.index') ? 'active' : '' }}">
                Ingredientes-Pizza
            </a>
        </li>
        <li>
            <a href="{{ route('pizza-raw-materials.index') }}" class="nav-link text-white {{ request()->routeIs('pizza-raw-materials.index') ? 'active' : '' }}">
                Materia Prima
            </a>
        </li>
    </ul>
</div>
