<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lolos Cake - Pastelería y Recetas</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="{{ route('welcome') }}" class="navbar-brand">
        <img src="{{ asset('images/Log.png') }}" alt="Logo de Lolos Cake">
        Lolos Cake
    </a>
    <ul class="navbar-nav">
        <li><a href="{{ route('welcome') }}" class="nav-link"><i class="fas fa-home"></i> Inicio</a></li>
        <li><a href="{{ route('register') }}" class="nav-link"><i class="fas fa-user-plus"></i> Registrarse</a></li>
        <li><a href="{{ route('login') }}" class="nav-link"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a></li>
    </ul>
</nav>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="{{ asset('images/redi.png') }}" alt="Pastel Red Velvet">
            <div class="slide-content">
                <h2>Pastel Red Velvet</h2>
                <p>¡Prueba nuestro delicioso pastel Red Velvet! Con un sabor único y un toque de vainilla, es perfecto para cualquier ocasión.</p>
            </div>
        </div>

        <div class="swiper-slide">
            <img src="{{ asset('images/jk.png') }}" alt="Galletas de Chocolate">
            <div class="slide-content">
                <h2>Galletas de Chispas</h2>
                <p>¡Compra nuestras galletas de chocolate y recibe una photocard exclusiva con cada compra!</p>
                <div class="photocard">
                    <img src="{{ asset('images/cho.png') }}" alt="Photocard de Regalo">
                </div>
            </div>
        </div>

        <div class="swiper-slide">
            <img src="{{ asset('images/pc.png') }}" alt="Pastel Coreano">
            <div class="slide-content">
                <h2>Pastel Coreano</h2>
                <p>Disfruta de nuestro pastel coreano tradicional, hecho con ingredientes frescos y un toque moderno.</p>
            </div>
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<div class="welcome-section">
    <div class="welcome-image">
        <img src="{{ asset('images/min.png') }}" alt="Pastel de Lolos Cake">
    </div>
    <div class="welcome-content">
        <h1>Bienvenido a Lolos Cake</h1>
        <p>Disfruta de nuestros deliciosos pasteles artesanales y únete a nuestra comunidad de amantes de la repostería. Cada producto está hecho con amor y los mejores ingredientes.</p>
        <a href="{{ route('register') }}" class="btn-custom">
            <i class="fas fa-user-plus"></i> Regístrate para ver recetas
        </a>
    </div>
</div>

<div class="foros-section">
    <div class="section-container">
        <h2>Recetas Destacadas</h2>
        <div class="foros-grid">
            <div class="foro-card">
                <img src="{{ asset('images/cho.png') }}" alt="Galletas de Chocolate">
                <div class="card-content">
                    <h3>Galletas de Chocolate</h3>
                    <p>Deliciosas galletas de chocolate con trozos de chocolate fundente.</p>
                    <div class="details">
                        <span><i class="fas fa-clock"></i> 30 min</span>
                        <span><i class="fas fa-utensils"></i> 12 porciones</span>
                    </div>
                    <ul>
                        <li>200g de harina</li>
                        <li>100g de mantequilla</li>
                        <li>150g de azúcar</li>
                        <li>1 huevo</li>
                        <li>100g de chocolate</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn-custom">
                        <i class="fas fa-book-open"></i> Ver Receta Completa
                    </a>
                </div>
            </div>

            <div class="foro-card">
                <img src="{{ asset('images/pastel.png') }}" alt="Pastel de Vainilla">
                <div class="card-content">
                    <h3>Pastel de Vainilla</h3>
                    <p>Un clásico pastel de vainilla con crema y fresas frescas.</p>
                    <div class="details">
                        <span><i class="fas fa-clock"></i> 1 hora</span>
                        <span><i class="fas fa-utensils"></i> 8 porciones</span>
                    </div>
                    <ul>
                        <li>300g de harina</li>
                        <li>200g de azúcar</li>
                        <li>3 huevos</li>
                        <li>100ml de leche</li>
                        <li>Esencia de vainilla</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn-custom">
                        <i class="fas fa-book-open"></i> Ver Receta Completa
                    </a>
                </div>
            </div>

            <div class="foro-card">
                <img src="{{ asset('images/pay.png') }}" alt="Pay de Manzana">
                <div class="card-content">
                    <h3>Pay de Manzana</h3>
                    <p>Un pay de manzana crujiente con un toque de canela.</p>
                    <div class="details">
                        <span><i class="fas fa-clock"></i> 1.5 horas</span>
                        <span><i class="fas fa-utensils"></i> 10 porciones</span>
                    </div>
                    <ul>
                        <li>500g de manzanas</li>
                        <li>200g de harina</li>
                        <li>150g de mantequilla</li>
                        <li>100g de azúcar</li>
                        <li>Canela al gusto</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn-custom">
                        <i class="fas fa-book-open"></i> Ver Receta Completa
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>Contacto</h3>
            <p><i class="fas fa-map-marker-alt"></i> Av. Repostería 123, Ciudad Dulce</p>
            <p><i class="fas fa-phone"></i> +1 234 567 890</p>
            <p><i class="fas fa-envelope"></i> info@loloscake.com</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
        </div>

        <div class="footer-section">
            <h3>Horario</h3>
            <p>Lunes a Viernes: 9am - 8pm</p>
            <p>Sábados: 10am - 6pm</p>
            <p>Domingos: 11am - 4pm</p>
            <div class="mini-map" id="mini-map"></div>
        </div>

        <div class="footer-section">
            <h3>Nuestro Equipo</h3>
            <div class="chef-info">
                <img src="{{ asset('images/jimin.png') }}" alt="Chef Jimin">
                <div>
                    <p><strong>Chef Jimin</strong></p>
                    <p>Especialista en postres coreanos</p>
                </div>
            </div>
            <div class="producto-vendido">
                <img src="{{ asset('images/cho.png') }}" alt="Producto Estrella">
                <p>Nuestro pastel más vendido</p>
            </div>
        </div>
    </div>

    <div class="copyright">
        <p>&copy; 2023 Lolos Cake. Todos los derechos reservados. 🍰</p>
    </div>
</footer>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    // Inicializar Swiper
    const swiper = new Swiper('.swiper-container', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        }
    });

    // Inicializar Mapa
    const map = L.map('mini-map').setView([19.4326, -99.1332], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    L.marker([19.4326, -99.1332]).addTo(map)
        .bindPopup('Lolos Cake<br>¡Ven a visitarnos!')
        .openPopup();
</script>
</body>
</html>