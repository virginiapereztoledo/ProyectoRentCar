<nav class="navbar navbar-expand-lg navbar-light mt-5" style="background-color: #d3d3d3;">
    <div class="container-fluid" style="margin-top: 70px;">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a href="{{ route('vehiculo.index') }}" class="nav-link {{ request()->routeIs('vehiculo.index') ? 'active' : '' }}">Gestión Vehículo</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('alquiler.year') }}" class="nav-link {{ request()->routeIs('alquiler.year') ? 'active' : '' }}">Ver Alquileres</a>
            </li>
        </ul>
    </div>
</nav>



