<!DOCTYPE html>
<html lang="es">
<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @stack('scripts') <!-- Esto es para agregar los scripts específicos de cada vista -->
</head>
<body>
    @include("public.navbar.main-navbar") <!-- Navbar principal -->
    @include("admin.navbar.admin-navbar") <!-- Navbar de administrador -->

    @yield('content') <!-- Aquí se mostrará el contenido específico de cada vista -->

    @stack('scripts')

    @include("components.footer") <!-- Pie de página -->
  @stack('javascript')
</body>
</html>
