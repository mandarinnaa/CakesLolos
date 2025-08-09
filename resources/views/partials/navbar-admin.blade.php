@if(Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'editor'))
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Poppins:wght@300;400;500;600;700&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
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
            --nucita-text: var(--texto-oscuro);
        }

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
            opacity: 0;
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

        .navbar-admin-nav .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background-color: var(--nucita-blush);
            transition: all 0.3s ease;
        }

        .navbar-admin-nav .nav-link:hover::before {
            width: 70%;
        }

        .navbar-admin-nav .nav-link i {
            margin-right: 8px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .navbar-admin-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .navbar-admin-nav .nav-link:hover i {
            transform: scale(1.15);
            color: var(--nucita-blush);
        }

        .navbar-admin-user {
            margin-left: auto;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .user-dropdown {
            position: relative;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .user-dropdown-toggle {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 0.6rem 1rem;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            height: 100%;
        }

        .user-dropdown-toggle:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .user-dropdown-toggle i:first-child {
            margin-right: 8px;
            font-size: 1.3rem;
            transition: transform 0.5s ease;
        }

        .user-dropdown-toggle i:last-child {
            margin-left: 6px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .main-content {
            margin-top: 70px;
            padding: 20px;
        }

        .user-dropdown:hover .user-dropdown-toggle i:last-child {
            transform: rotate(180deg);
        }

        .user-dropdown-menu {
            position: absolute;
            right: 0;
            top: 100%;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(166, 45, 84, 0.15);
            min-width: 200px;
            padding: 0.5rem 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            border: 1px solid var(--nucita-blush);
        }

        .user-dropdown:hover .user-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .user-dropdown-item {
            color: var(--nucita-text);
            text-decoration: none;
            padding: 0.7rem 1.5rem;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .user-dropdown-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            color: var(--nucita-berry);
        }

        .user-dropdown-item:hover {
            background-color: var(--nucita-cream);
            color: var(--nucita-berry);
            padding-left: 1.7rem;
        }

        @keyframes wave {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .navbar-admin-nav .nav-link:hover {
            animation: wave 0.6s ease;
        }

        @media (max-width: 1200px) {
            .navbar-admin {
                padding: 0.8rem 1.5rem;
            }
            
            .navbar-admin-nav .nav-link {
                padding: 0.6rem 0.8rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 992px) {
            .navbar-admin-toggler {
                display: block;
            }
            
            .navbar-admin-collapse {
                position: fixed;
                top: 70px;
                left: 0;
                right: 0;
                background: linear-gradient(135deg, var(--nucita-berry), var(--nucita-mocha));
                flex-direction: column;
                height: auto;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 10px 25px rgba(166, 45, 84, 0.2);
            }
            
            .navbar-admin-collapse.show {
                max-height: 500px;
                padding: 1rem 0;
            }
            
            .navbar-admin-nav {
                flex-direction: column;
                width: 100%;
                margin: 0;
            }
            
            .navbar-admin-nav .nav-item {
                margin: 0.3rem 1rem;
            }
            
            .navbar-admin-nav .nav-link {
                padding: 0.8rem 1.5rem;
                border-radius: 8px;
            }
            
            .navbar-admin-user {
                width: 100%;
                padding: 1rem 1.5rem;
                border-top: 1px dashed rgba(255, 255, 255, 0.3);
            }
            
            .user-dropdown {
                width: 100%;
            }
            
            .user-dropdown-toggle {
                width: 100%;
                justify-content: space-between;
            }
            
            .user-dropdown-menu {
                position: static;
                box-shadow: none;
                border: none;
                background: transparent;
                display: none;
                margin-top: 0.5rem;
            }
            
            .user-dropdown:hover .user-dropdown-menu {
                display: block;
                opacity: 1;
                visibility: visible;
                transform: none;
            }
            
            .user-dropdown-item {
                color: white;
                padding: 0.6rem 1rem;
            }
            
            .user-dropdown-item:hover {
                color: var(--nucita-blush);
                background: transparent;
            }
            
            .user-dropdown-item i {
                color: white;
            }
        }

        @media (max-width: 576px) {
            .navbar-admin {
                padding: 0.8rem 1rem;
                height: 60px;
            }
            
            .navbar-admin-logo {
                height: 35px;
            }
            
            .navbar-admin-title {
                font-size: 1.5rem;
            }
            
            .navbar-admin-collapse {
                top: 60px;
            }
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--nucita-blanco);
            color: var(--texto-oscuro);
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .nucita-container {
            padding: 2rem;
            animation: fadeIn 0.6s ease-out;
        }

        .nucita-card {
            background: white;
            border-radius: 16px;
            padding: 1.8rem;
            margin-bottom: 2rem;
            box-shadow: var(--sombra-suave);
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            border: 1px solid rgba(255, 182, 193, 0.3);
            animation: fadeInScale 0.5s ease-out;
        }

        .nucita-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(210, 180, 140, 0.4);
        }

        .nucita-btn {
            padding: 0.7rem 1.4rem;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(166, 124, 82, 0.2);
        }

        .nucita-btn i {
            margin-right: 8px;
            transition: transform 0.3s ease;
        }

        .nucita-btn-primary {
            background: linear-gradient(135deg, var(--nucita-rosa), var(--nucita-cafe));
            color: white;
        }

        .nucita-btn-primary:hover {
            background: linear-gradient(135deg, var(--nucita-cafe), var(--nucita-cafe-oscuro));
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(166, 124, 82, 0.4);
        }

        .nucita-btn-primary:hover i {
            transform: translateX(3px);
        }

        .nucita-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--sombra-suave);
        }

        .nucita-table th {
            background: linear-gradient(135deg, var(--nucita-rosa), var(--nucita-cafe));
            color: white;
            padding: 1.2rem;
            text-align: left;
        }

        .nucita-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--nucita-blanco);
            background-color: white;
            transition: all 0.3s ease;
        }

        .nucita-table tr:last-child td {
            border-bottom: none;
        }

        .nucita-table tr:hover td {
            background-color: rgba(255, 214, 125, 0.1);
        }

        .nucita-alert {
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            animation: fadeIn 0.5s ease;
            border: 1px solid transparent;
        }

        .alert-success {
            background-color: rgba(214, 237, 218, 0.8);
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert-danger {
            background-color: rgba(248, 215, 218, 0.8);
            color: #721c24;
            border-color: #f5c6cb;
        }

        .nucita-float {
            animation: float 4s ease-in-out infinite;
        }

        .nucita-wave:hover {
            animation: wave 0.6s ease;
        }

        .fa-3x {
            transition: all 0.4s ease;
        }

        .nucita-card:hover .fa-3x {
            transform: scale(1.1);
            color: var(--nucita-cafe-oscuro);
        }

        h1, h2, h3 {
            font-family: 'Cookie', cursive;
            color: var(--nucita-cafe-oscuro);
        }

        h1 {
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 992px) {
            .nucita-container {
                padding: 1.5rem;
            }
            
            .nucita-card {
                padding: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.2rem;
            }
            
            .nucita-table {
                display: block;
                overflow-x: auto;
            }
        }

        .animate__animated {
            animation-duration: 0.6s;
        }

        [style*="animation-delay"] {
            animation-fill-mode: both;
        }

        .stars {
            color: var(--nucita-amarillo);
            font-size: 1.2rem;
        }

        .stars i {
            margin-right: 3px;
            transition: transform 0.3s ease;
        }

        .stars:hover i {
            transform: scale(1.2);
        }

        .nucita-card {
            background-color: var(--nucita-light);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: var(--sombra-suave);
            margin-bottom: 2rem;
            border: 1px solid var(--nucita-cream);
        }

        .nucita-form-group {
            margin-bottom: 1.5rem;
        }

        .nucita-form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--nucita-accent);
            font-weight: 500;
            font-family: 'Quicksand', sans-serif;
        }

        .nucita-form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--nucita-cafe);
            border-radius: 8px;
            background-color: var(--nucita-blanco);
            color: var(--nucita-text);
            font-family: 'Quicksand', sans-serif;
            transition: all 0.3s ease;
        }

        .nucita-form-control:focus {
            outline: none;
            border-color: var(--nucita-rosa);
            box-shadow: 0 0 0 3px rgba(255, 182, 193, 0.2);
        }

        textarea.nucita-form-control {
            min-height: 120px;
            resize: vertical;
        }

        .nucita-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            font-family: 'Quicksand', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
        }

        .nucita-btn i {
            margin-right: 0.5rem;
        }

        .nucita-btn-primary {
            background-color: var(--nucita-rosa);
            color: var(--nucita-text);
        }

        .nucita-btn-primary:hover {
            background-color: var(--nucita-berry);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 182, 193, 0.3);
        }

        .nucita-btn-secondary {
            background-color: var(--nucita-cafe);
            color: var(--nucita-blanco);
        }

        .nucita-btn-secondary:hover {
            background-color: var(--nucita-cafe-oscuro);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(210, 180, 140, 0.3);
        }

        .nucita-alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-family: 'Quicksand', sans-serif;
        }

        .alert-success {
            background-color: rgba(255, 222, 125, 0.2);
            border-left: 4px solid var(--nucita-amarillo);
            color: var(--texto-oscuro);
        }

        .alert-danger {
            background-color: rgba(255, 182, 193, 0.2);
            border-left: 4px solid var(--nucita-rosa);
            color: var(--texto-oscuro);
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        .nucita-card img {
            border: 2px solid var(--nucita-cream);
            transition: transform 0.3s ease;
        }

        .nucita-card img:hover {
            transform: scale(1.05);
        }

        .nucita-form-control[type="file"] {
            padding: 0.5rem;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -0.75rem;
        }

        .row > [class*="col-"] {
            padding: 0 0.75rem;
        }

        .animate__animated {
            animation-duration: 0.5s;
        }

        @media (max-width: 768px) {
            .nucita-card {
                padding: 1.5rem;
            }
            
            .d-flex {
                flex-direction: column;
                gap: 1rem;
            }
            
            .justify-content-end {
                justify-content: flex-start !important;
            }
            
            .nucita-btn {
                width: 100%;
            }
        }

        .nucita-form-control[type="file"]::file-selector-button {
            padding: 0.5rem 1rem;
            background-color: var(--nucita-cream);
            border: 1px solid var(--nucita-cafe);
            border-radius: 4px;
            color: var(--nucita-text);
            font-family: 'Quicksand', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .nucita-form-control[type="file"]::file-selector-button:hover {
            background-color: var(--nucita-amarillo);
        }
    </style>
</head>
<body>
        <div class="main-content">
    <nav class="navbar-admin">
        <div class="navbar-admin-container">
            <button class="navbar-admin-toggler" type="button" id="navbarAdminToggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="navbar-admin-collapse" id="navbarAdminCollapse">
                <ul class="navbar-admin-nav">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <i class="fas fa-utensils"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users') }}" class="nav-link">
                            <i class="fas fa-user-friends"></i> <span>Usuarios</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.mensajes') }}" class="nav-link">
                            <i class="fas fa-envelope"></i> <span>Mensajes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.pedidos') }}" class="nav-link">
                            <i class="fas fa-shopping-cart"></i> <span>Pedidos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.cakes.index') }}" class="nav-link">
                            <i class="fas fa-birthday-cake"></i> <span>Pasteles</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.recetas.index') }}" class="nav-link">
                            <i class="fas fa-book"></i> <span>Recetas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.ranking') }}" class="nav-link">
                            <i class="fas fa-star"></i> <span>Ranking</span>
                        </a>
                    </li>
                </ul>
                
                <div class="navbar-admin-user">
                    <div class="user-dropdown">
                        <a href="#" class="user-dropdown-toggle">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                            <i class="fas fa-caret-down"></i>
                        </a>
                        <div class="user-dropdown-menu">
                            <a href="{{ route('logout') }}" class="user-dropdown-item" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('navbarAdminToggle');
            const navbarCollapse = document.getElementById('navbarAdminCollapse');
            
            if (toggleButton && navbarCollapse) {
                toggleButton.addEventListener('click', function() {
                    navbarCollapse.classList.toggle('show');
                    
                    const icon = this.querySelector('i');
                    if (navbarCollapse.classList.contains('show')) {
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-times');
                    } else {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                });
            }
            
            const navLinks = document.querySelectorAll('.navbar-admin-nav .nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 992) {
                        navbarCollapse.classList.remove('show');
                        const toggleIcon = document.querySelector('#navbarAdminToggle i');
                        toggleIcon.classList.remove('fa-times');
                        toggleIcon.classList.add('fa-bars');
                    }
                });
            });
            
            const navbar = document.querySelector('.navbar-admin');
            if (navbar) {
                setTimeout(() => {
                    navbar.style.opacity = '1';
                }, 100);
            }
        });
    </script>
</body>
</html>
@endif