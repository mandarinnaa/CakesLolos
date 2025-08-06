<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lolos Cake - Pastelería y Recetas</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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