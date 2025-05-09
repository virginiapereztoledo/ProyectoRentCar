<!DOCTYPE html>
<html lang="es">

<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="d-flex flex-column min-vh-100 @if(Route::currentRouteName() === 'home') home @endif">
    <!-- Navbar -->
    <header data-bs-theme="light">
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top w-100 shadow-sm px-3">
            <div class="container-fluid d-flex justify-content-between align-items-center flex-nowrap">
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                    <img src="{{ asset('img/LOGORENT.png') }}" alt="Logo RentCarVir" class="logo-navbar">
                    <span class="fas fa-home"></span>
                </a>

                <!-- Botón para dispositivos móviles -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-start" id="navbarCollapse">
                    <ul class="navbar-nav flex-row gap-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('condiciones') ? 'active' : '' }}" href="{{ route('condiciones') }}">Condiciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('catalogo') ? 'active' : '' }}" href="{{ route('catalogo') }}">Catálogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Quiénes somos</a>
                        </li>
                    </ul>
                </div>

                <div class="d-flex gap-2 ms-auto">
                    @guest
                        <a class="btn btn-outline-primary btn-hover" href="{{ route('login') }}">Iniciar sesión</a>
                        <a class="btn btn-primary btn-hover" href="{{ route('register') }}">Registro</a>
                    @else
                        <a class="btn btn-outline-secondary btn-hover" href="@can('isClient'){{ route('cliente.edit.profile') }}@endcan @can('isEmpleado'){{ route('vehiculo.index') }}@endcan @can('isAdmin'){{ route('cliente.index') }}@endcan">Zona personal</a>
                        <a class="btn btn-outline-danger btn-hover" href="{{ route('logout') }}">Salir</a>
                    @endguest
                </div>
            </div>
        </nav>
    </header>




    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
