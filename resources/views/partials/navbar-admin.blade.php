@if(Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'editor'))
<head>
    <!-- Primero las fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Cookie&display=swap" rel="stylesheet">
    <!-- Luego Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Tus estilos ANTES de Bootstrap -->
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
    }

    /* NAVBAR PRINCIPAL */
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

    /* Botón toggler para móviles */
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

    /* Contenido del navbar */
    .navbar-admin-collapse {
        display: flex;
        flex-basis: auto;
        flex-grow: 1;
        align-items: center;
        justify-content: space-between;
        height: 100%;
    }

    /* Menú de navegación */
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

    /* Animaciones del menú */
    @keyframes wave {
        0% { transform: rotate(0deg) scale(1); }
        25% { transform: rotate(5deg) scale(1.05); }
        75% { transform: rotate(-5deg) scale(1.05); }
        100% { transform: rotate(0deg) scale(1); }
    }

    .navbar-admin-nav .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.15);
        transform: translateY(-2px);
        animation: wave 0.6s ease;
    }

    .navbar-admin-nav .nav-link:hover i {
        transform: scale(1.15);
        color: var(--nucita-blush);
    }

    /* Dropdown de usuario */
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

    /* Responsive */
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
    </style>
    <!-- Bootstrap después de tus estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<nav class="navbar-admin">
    <div class="navbar-admin-container">
        <div class="navbar-admin-brand">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('images/Log.png') }}" alt="Logo Lolo's Cake" class="navbar-admin-logo">
                <span class="navbar-admin-title">Lolo's Cake Admin</span>
            </a>
        </div>
        
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
@endif