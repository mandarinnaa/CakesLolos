<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lolos Cake')</title>

    {{-- Tu CSS de Vite --}}
    @if(Auth::check())
        @if(Auth::user()->role === 'admin')
            @vite(['resources/css/admin.css', 'resources/js/app.js'])
        @elseif(Auth::user()->role === 'editor')
            @vite(['resources/css/editor.css', 'resources/js/app.js'])
        @else
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    {{-- CSS externos que no tienen nada que ver con Vite --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Cookie&display=swap" rel="stylesheet">
</head>
<body>
    {{-- Tu Navbar --}}
    @auth
        @if(Auth::user()->role === 'admin')
            @include('partials.navbar-admin')
        @elseif(Auth::user()->role === 'editor')
            @include('partials.navbar-editor')
        @else
            @include('partials.navbar', ['userType' => 'regular'])
        @endif
    @else
        @include('partials.navbar', ['userType' => 'guest'])
    @endauth

    {{-- Contenido --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="text-center py-4">
        <p>&copy; {{ date('Y') }} Lolo's Cake. Todos los derechos reservados.</p>
    </footer>

    {{-- Scripts externos --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
