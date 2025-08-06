<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lolos Cake')</title>
    <style>
        /* Estilos base comunes */
        :root {
            --nucita-cream: #FFDE7D;
            --nucita-blush: #FFDE7D;
            --nucita-rose: #D2B48C;
            --nucita-berry: #FFB6C1;
            --nucita-mocha: #bca36a;
            --nucita-latte: #000000;
            --nucita-text: #000000;
            --nucita-text-light: #eccbd7;
            --nucita-rosa: #FFB6C1;
            --nucita-amarillo: #FFDE7D;
            --nucita-cafe: #D2B48C;
            --nucita-cafe-oscuro: #A67C52;
            --nucita-blanco: #FFF5EE;
            --texto-oscuro: #5A3E36;
            --sombra-suave: 0 4px 20px rgba(210, 180, 140, 0.3);
            --nucita-primary: var(--nucita-rosa);
            --nucita-accent: var(--nucita-cafe-oscuro);
            --nucita-light: var(--nucita-blanco);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--nucita-blanco);
            color: var(--texto-oscuro);
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        /* ==================== */
        /* ESTILOS PARA NAVBAR ADMIN */
        /* ==================== */
        .navbar-admin {
            background: linear-gradient(135deg, var(--nucita-rose), var(--nucita-berry));
            padding: 0.8rem 2rem;
            box-shadow: 0 4px 20px rgba(255, 133, 162, 0.2);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            height: 70px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .navbar-admin-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
            height: 100%;
        }

        .navbar-admin-brand {
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .navbar-admin-brand:hover {
            transform: scale(1.02);
        }

        .navbar-admin-logo {
            height: 40px;
            margin-right: 12px;
            transition: all 0.3s ease;
            filter: drop-shadow(0 2px 4px rgba(166, 45, 84, 0.2));
        }

        .navbar-admin-title {
            color: white;
            font-family: 'Cookie', cursive;
            font-size: 1.8rem;
            font-weight: 400;
            text-decoration: none;
            text-shadow: 1px 1px 3px rgba(166, 45, 84, 0.3);
            transition: all 0.3s ease;
        }

        .navbar-admin-toggler {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar-admin-toggler:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: rotate(90deg);
        }

        .navbar-admin-collapse {
            display: flex;
            flex-basis: auto;
            flex-grow: 1;
            align-items: center;
            justify-content: space-between;
            height: 100%;
        }

        .navbar-admin-nav {
            display: flex;
            flex-direction: row;
            list-style: none;
            margin: 0 0 0 2rem;
            padding: 0;
            height: 100%;
        }

        .navbar-admin-nav .nav-item {
            display: flex;
            align-items: center;
            position: relative;
            margin: 0 0.5rem;
        }

        .navbar-admin-nav .nav-link {
            color: white;
            text-decoration: none;
            padding: 0.6rem 1.2rem;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
            overflow: hidden;
        }

        /* ==================== */
        /* ESTILOS PARA NAVBAR EDITOR */
        /* ==================== */
        .navbar-editor {
            background: linear-gradient(135deg, var(--nucita-cafe), var(--nucita-mocha));
            padding: 1rem 2rem;
            box-shadow: 0 4px 20px rgba(210, 180, 140, 0.3);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            height: 70px;
        }

        .navbar-editor-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
            height: 100%;
        }

        .navbar-editor-brand {
            display: flex;
            align-items: center;
        }

        .navbar-editor-logo {
            height: 40px;
            margin-right: 12px;
        }

        .navbar-editor-title {
            color: white;
            font-family: 'Cookie', cursive;
            font-size: 1.8rem;
        }

        .navbar-editor-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navbar-editor-nav .nav-item {
            margin: 0 0.5rem;
        }

        .navbar-editor-nav .nav-link {
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar-editor-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* ==================== */
        /* ESTILOS PARA NAVBAR REGULAR (USUARIO/GUEST) */
        /* ==================== */
        .navbar-regular {
            background: linear-gradient(135deg, #ff6f61, #ffb6c1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 5px 0;
            border-bottom: 2px solid #ff6f61;
            position: relative;
            overflow: hidden;
        }

        .navbar-regular::before {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 200%;
            height: 20px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 88.7'%3E%3Cpath fill='%23ff6f61' d='M800 56.9c-155.5 0-204.9-50-405.5-49.9-200 0-250 49.9-394.5 49.9v31.8h800v-.2-31.6z'/%3E%3C/svg%3E");
            animation: wave 10s linear infinite;
        }

        .navbar-regular-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff !important;
            font-family: 'Cookie', cursive;
            animation: fadeInDown 1s ease-in-out;
        }

        .navbar-regular-brand img {
            width: 70px;
            height: 70px;
            margin-right: 10px;
        }

        .navbar-regular-nav .nav-link {
            color: #fff !important;
            font-size: 0.9rem;
            margin: 0 10px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            position: relative;
        }

        .navbar-regular-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #fff;
            transition: width 0.3s ease;
        }

        .navbar-regular-nav .nav-link:hover::after {
            width: 100%;
        }

        /* Animaciones comunes */
        @keyframes wave {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Contenedor principal (ajustado para los navbars fijos) */
        .main-container {
            padding-top: 80px; /* Ajuste para el navbar fijo */
            min-height: 100vh;
        }

        /* Resto de tus estilos... */
        /* (Mantén aquí el resto de tus estilos para el cuerpo de la página) */

    </style>

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

    {{-- CSS externos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Cookie&display=swap" rel="stylesheet">
</head>
<body>
    {{-- Navbar según el tipo de usuario --}}
    @auth
        @if(Auth::user()->role === 'admin')
            @include('partials.navbar-admin')
        @elseif(Auth::user()->role === 'editor')
            @include('partials.navbar-editor')
        @else
            @include('partials.navbar-regular', ['userType' => 'regular'])
        @endif
    @else
        @include('partials.navbar-regular', ['userType' => 'guest'])
    @endauth

    {{-- Contenido principal --}}
    <div class="main-container">
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