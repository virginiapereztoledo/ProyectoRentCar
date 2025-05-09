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
    <!-- Video de fondo (solo para Home) -->
    @if(Route::currentRouteName() === 'home')
    <div class="video-background">
        <video autoplay muted loop playsinline>
            <source src="{{ asset('video/bosque2.mp4') }}" type="video/mp4">
            Tu navegador no soporta el vídeo HTML5.
        </video>
    </div>
    @endif

    <!-- Navbar (debe ir sobre el video también) -->
    @include("public.navbar.main-navbar")

    <!-- Contenido (como Hero Section) -->
    <main class="flex-grow-1">
        @yield("content")
    </main>

    <!-- Footer -->
    @include("components.footer")

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
