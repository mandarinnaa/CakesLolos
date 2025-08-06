@if(Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'editor'))
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
        }

        body {
            margin: 0;
            background-color: var(--nucita-blanco);
            font-family: 'Poppins', sans-serif;
            color: var(--texto-oscuro);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }

        .navbar {
            background-color: var(--nucita-cafe);
            padding: 1.2rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--sombra-suave);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-family: 'Pacifico', cursive;
            font-size: 1.8rem;
            color: var(--nucita-blanco);
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar-brand img {
            width: 50px;
            height: 50px;
        }

        .navbar-nav {
            display: flex;
            gap: 1.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-link {
            color: var(--nucita-blanco);
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 30px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link:hover {
            background-color: var(--nucita-cafe-oscuro);
            color: var(--nucita-amarillo);
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .nav-link i {
            font-size: 1.1rem;
        }

        .swiper-container {
            width: 100%;
            height: 70vh;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, var(--nucita-rose), var(--nucita-blanco));
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            text-align: center;
            position: relative;
        }

        .swiper-slide img {
            max-height: 400px;
            animation: float 4s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .slide-content {
            background: rgba(255, 255, 255, 0.85);
            padding: 2rem;
            border-radius: 15px;
            max-width: 500px;
            backdrop-filter: blur(5px);
            box-shadow: var(--sombra-suave);
        }

        .slide-content h2 {
            font-family: 'Pacifico', cursive;
            font-size: 2.5rem;
            color: var(--nucita-cafe-oscuro);
            margin-bottom: 1rem;
        }

        .slide-content p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .btn-promo {
            background-color: var(--nucita-cafe-oscuro);
            color: var(--nucita-blanco);
            border: none;
            padding: 0.8rem 1.8rem;
            border-radius: 30px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-promo:hover {
            background-color: var(--nucita-mocha);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .photocard {
            margin-top: 1.5rem;
        }

        .photocard img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid var(--nucita-cafe-oscuro);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .welcome-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            gap: 3rem;
        }

        .welcome-image {
            flex: 1;
            border-radius: 15px;
            overflow: hidden;
        }

        .welcome-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }

        .welcome-image:hover img {
            transform: scale(1.05);
        }

        .welcome-content {
            flex: 1;
        }

        .welcome-content h1 {
            font-family: 'Pacifico', cursive;
            font-size: 3rem;
            color: var(--nucita-cafe-oscuro);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .welcome-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: var(--texto-oscuro);
        }

        .btn-custom {
            background-color: var(--nucita-cafe-oscuro);
            color: var(--nucita-blanco);
            border: none;
            padding: 0.8rem 1.8rem;
            border-radius: 30px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-custom:hover {
            background-color: var(--nucita-mocha);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .foros-section {
            padding: 5rem 2rem;
            background-color: var(--nucita-cream);
        }

        .section-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .foros-section h2 {
            font-family: 'Pacifico', cursive;
            font-size: 2.8rem;
            color: var(--nucita-cafe-oscuro);
            text-align: center;
            margin-bottom: 3rem;
        }

        .foros-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .foro-card {
            background-color: var(--nucita-blanco);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--sombra-suave);
            transition: all 0.3s ease;
        }

        .foro-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .foro-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 1.5rem;
        }

        .foro-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--nucita-cafe-oscuro);
            margin-bottom: 1rem;
        }

        .foro-card p {
            margin-bottom: 1.5rem;
            color: var(--texto-oscuro);
        }

        .details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            color: var(--nucita-mocha);
        }

        .foro-card ul, .foro-card ol {
            margin-bottom: 1.5rem;
            padding-left: 1.2rem;
        }

        .foro-card li {
            margin-bottom: 0.5rem;
        }

        footer {
            background-color: var(--nucita-cafe);
            color: var(--nucita-blanco);
            padding: 4rem 2rem 2rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section {
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-family: 'Pacifico', cursive;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: var(--nucita-amarillo);
        }

        .footer-section p, .footer-section a {
            color: var(--nucita-blanco);
            margin-bottom: 0.8rem;
            display: block;
        }

        .footer-section a:hover {
            color: var(--nucita-amarillo);
        }

        .mini-map {
            width: 100%;
            height: 200px;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 1rem;
        }

        .social-links {
            display: flex;
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            font-size: 1.5rem;
            color: var(--nucita-blanco);
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            color: var(--nucita-amarillo);
            transform: translateY(-3px);
        }

        .chef-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .chef-info img {
            width: 80px;
            height: 120px;
            object-fit: cover;
        }

        .producto-vendido {
            text-align: center;
            margin-top: 1.5rem;
        }

        .producto-vendido img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--nucita-amarillo);
            margin-bottom: 0.8rem;
        }

        .copyright {
            text-align: center;
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .welcome-section {
                flex-direction: column;
                padding: 3rem 2rem;
            }
            
            .swiper-container {
                height: 60vh;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 1rem;
            }
            
            .navbar-nav {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .swiper-container {
                height: 50vh;
            }
            
            .slide-content {
                padding: 1.5rem;
            }
            
            .slide-content h2 {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .navbar-brand img {
                width: 40px;
                height: 40px;
            }
            
            .welcome-content h1 {
                font-size: 2.2rem;
            }
            
            .foros-section h2 {
                font-size: 2.2rem;
            }
        }</style>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/Log.png') }}" alt="Logo Lolo's Cake">
                Lolo's Cake
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                    @if(Auth::check())
                        <li class="nav-item">
                            <a href="{{ route('user.cakes.index') }}" class="nav-link">
                                <i class="fas fa-birthday-cake"></i> Catálogo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.cart.index') }}" class="nav-link">
                                <i class="fas fa-shopping-cart"></i> Carrito
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.about') }}" class="nav-link">
                                <i class="fas fa-info-circle"></i> Acerca de Nosotros
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.recetas.index') }}" class="nav-link">
                                <i class="fas fa-book"></i> Recetas
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle icon-animate"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">
                                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">
                                <i class="fas fa-user-plus"></i> Registrarse
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif