@if(Auth::check() && in_array(Auth::user()->role, ['admin', 'editor', 'user']))

<head>
    <style>
        body {
    font-family: 'Poppins', sans-serif;
    background-color: #fff5f5; /* Fondo rosita pastel */
    color: #5a3e36; /* Color cafecito para el texto */
    overflow-x: hidden;
}

h1, h2, h3 {
    font-family: 'Cookie', cursive;
    color: #ff6f61; /* Rosita más intenso */
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

/* Navbar personalizada */
.navbar-custom {
    background: linear-gradient(135deg, #ff6f61, #ffb6c1); /* Degradado rosado */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    padding: 5px 0; /* Hacemos el navbar más pequeño */
    border-bottom: 2px solid #ff6f61;
    position: relative;
    overflow: hidden;
}

.navbar-custom::before {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 200%;
    height: 20px;
    background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 88.7'%3E%3Cpath fill='%23ff6f61' d='M800 56.9c-155.5 0-204.9-50-405.5-49.9-200 0-250 49.9-394.5 49.9v31.8h800v-.2-31.6z'/%3E%3C/svg%3E");
    animation: wave 10s linear infinite;
}

@keyframes wave {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

.navbar-brand {
    font-size: 1.5rem; /* Tamaño más pequeño */
    font-weight: bold;
    color: #fff !important; /* Texto blanco */
    font-family: 'Cookie', cursive;
    animation: fadeInDown 1s ease-in-out;
}

.navbar-brand img {
    width: 70px; /* Tamaño más pequeño */
    height: 70px;
    margin-right: 10px;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

.navbar-nav .nav-link {
    color: #fff !important; /* Texto blanco */
    font-size: 0.9rem; /* Tamaño más pequeño */
    margin: 0 10px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    font-family: 'Poppins', sans-serif;
    position: relative;
}

.navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #fff;
    transition: width 0.3s ease;
}

.navbar-nav .nav-link:hover::after {
    width: 100%;
}

.navbar-nav .nav-link i {
    margin-right: 5px; /* Menor espacio entre ícono y texto */
    font-size: 1rem; /* Tamaño más pequeño */
}

.navbar-toggler {
    border: none;
    color: #fff;
}

.navbar-toggler-icon {
    background-color: #fff;
}

/* Contenido principal */
.container {
    padding: 20px ;
    margin-top: 0px; /* Ajustamos el margen superior para subir el contenido */
}

/* Footer personalizado */
footer {
    background-color: #ffb6c1; /* Rosita pastel */
    color: #5a3e36; /* Color cafecito */
    padding: 20px 0;
    margin-top: 50px;
    text-align: center;
    box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.1);
    border-top: 2px solid #ff6f61;
}

footer p {
    margin: 0;
    font-size: 1rem;
    font-family: 'Cookie', cursive;
}

/* Iconos animados */
.icon-animate {
    animation: bounce 2s infinite;
}

/* Botones personalizados */
.btn-custom {
    background-color: #ff6f61; /* Rosita más intenso */
    color: #fff; /* Blanco */
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Cookie', cursive;
    font-size: 1rem; /* Tamaño más pequeño */
}

.btn-custom i {
    margin-right: 8px;
}

.btn-custom:hover {
    background-color: #ff4a3a; /* Rosita más oscuro */
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* Animación de fondo */
body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('https://www.transparenttextures.com/patterns/candy.png');
    opacity: 0.1;
    z-index: -1;
}


.cereza-container-cakes {
    margin-top: 80px;
    padding: 20px;
}

.cereza-title {
    font-family: 'Cookie', cursive;
    font-size: 3rem;
    color: #ff6f61;
    text-align: center;
    margin-bottom: 40px;
    position: relative;
}

.cereza-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background-color: #ff6f61;
}

.cereza-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; 
    justify-content: center;
}

.cereza-card-hover {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #fff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 350px; 
    display: flex;
    flex-direction: column;
    height: 100%; /* Asegura que todas las tarjetas tengan la misma altura */
}

.cereza-card-hover:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.cereza-card-img-top {
    border-radius: 15px 15px 0 0;
    height: 250px; /* Tamaño fijo para todas las imágenes */
    width: 100%; /* Asegura que la imagen ocupe todo el ancho */
    object-fit: cover; /* Ajusta la imagen para que cubra el espacio sin distorsionarse */
    transition: transform 0.3s ease;
}

.cereza-card-hover:hover .cereza-card-img-top {
    transform: scale(1.05); 
}

.cereza-card-body {
    padding: 20px;
    text-align: center;
    flex-grow: 1; /* Asegura que el cuerpo de la tarjeta ocupe el espacio restante */
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Distribuye el espacio entre los elementos */
}

.cereza-card-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #5a3e36;
    font-family: 'Cookie', cursive;
    margin-bottom: 10px;
}

.cereza-card-title i {
    margin-right: 8px;
    color: #ff6f61;
}

.cereza-card-text {
    font-size: 1rem;
    color: #5a3e36;
    margin-bottom: 10px;
}

.cereza-card-text i {
    margin-right: 5px;
    color: #ff6f61; 
}

.cereza-btn-custom {
    background-color: #ff6f61; 
    color: #fff; 
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-family: 'Cookie', cursive;
    font-size: 1.2rem;
    width: 100%; 
}

.cereza-btn-custom i {
    margin-right: 8px;
}

.cereza-btn-custom:hover {
    background-color: #ff4a3a; 
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

@media (max-width: 768px) {
    .cereza-title {
        font-size: 2.5rem;
    }

    .cereza-card-hover {
        max-width: 100%; 
    }

    .cereza-card-img-top {
        height: 200px; 
    }
}


.frijolito-cart-container {
    margin-top: 80px;
    padding: 20px;
}

.frijolito-title {
    font-family: 'Cookie', cursive;
    font-size: 2.5rem;
    color: #ff6f61; /* Rosita más intenso */
    text-align: center;
    margin-bottom: 40px;
}

.frijolito-alert-info {
    background-color: #ffb6c1; /* Rosita pastel */
    border-color: #ff6f61; /* Rosita más intenso */
    color: #5a3e36; /* Color cafecito */
    text-align: center;
    padding: 20px;
    border-radius: 15px;
}

.frijolito-alert-info a.frijolito-btn-primary {
    background-color: #ff6f61; /* Rosita más intenso */
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-family: 'Cookie', cursive;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.frijolito-alert-info a.frijolito-btn-primary:hover {
    background-color: #ff4a3a; /* Rosita más oscuro */
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.frijolito-cart-item {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #fff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.frijolito-cart-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.frijolito-cart-item img {
    border-radius: 15px;
    height: 150px;
    object-fit: cover;
}

.frijolito-cart-item .frijolito-card-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #5a3e36; /* Color cafecito */
    font-family: 'Cookie', cursive;
}

.frijolito-cart-item .frijolito-card-text {
    font-size: 1rem;
    color: #5a3e36; /* Color cafecito */
}

.frijolito-btn-danger {
    background-color: #ff6f61; /* Rosita más intenso */
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-family: 'Cookie', cursive;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.frijolito-btn-danger:hover {
    background-color: #ff4a3a; /* Rosita más oscuro */
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.frijolito-cart-summary {
    border: none;
    border-radius: 15px;
    background-color: #fff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-top: 20px;
}

.frijolito-cart-total {
    font-size: 1.8rem;
    font-weight: bold;
    color: #5a3e36; /* Color cafecito */
    font-family: 'Cookie', cursive;
}

#paypal-button-container {
    margin-top: 20px;
}

/* Estilos para dispositivos móviles */
@media (max-width: 768px) {
    .frijolito-title {
        font-size: 2rem;
    }

    .frijolito-cart-item img {
        height: 120px;
    }

    .frijolito-cart-item .frijolito-card-title {
        font-size: 1.2rem;
    }

    .frijolito-cart-item .frijolito-card-text {
        font-size: 0.9rem;
    }

    .frijolito-btn-danger {
        font-size: 0.9rem;
        padding: 8px 16px;
    }

    .frijolito-cart-total {
        font-size: 1.5rem;
    }
}


h1, h2, h3, h4, h5, h6 {
    font-family: 'Cookie', cursive;
    color: #ff6f61; /* Rosita más intenso */
    text-shadow: 2px 2px 4px rgba(255, 111, 97, 0.3);
}

.tomatito-container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Animaciones */
@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

/* Sección del Chef */
.tomatito-chef-section {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    margin-top: 50px;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    animation: pulse 3s infinite;
}

.tomatito-chef-section img {
    width: 100%;
    max-width: 400px;
    animation: float 4s infinite;
}

.tomatito-chef-section .tomatito-info {
    flex: 1;
    padding: 20px;
}

.tomatito-chef-section h3 {
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.tomatito-chef-section p {
    font-size: 1.2rem;
    line-height: 1.8;
}

.tomatito-chef-section .tomatito-btn-custom {
    display: inline-block;
    background-color: #ff6f61;
    color: #fff;
    font-family: 'Cookie', cursive;
    font-size: 1.2rem;
    padding: 10px 20px;
    border-radius: 25px;
    text-decoration: none;
    margin-top: 20px;
    transition: all 0.3s ease;
}

.tomatito-chef-section .tomatito-btn-custom:hover {
    background-color: #ff4a3a;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* Modal de la Historia */
.tomatito-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.tomatito-modal-content {
    background-color: #fff5f5;
    padding: 30px;
    border-radius: 15px;
    max-width: 600px;
    width: 90%;
    position: relative;
    animation: float 3s infinite;
}

.tomatito-modal-content h4 {
    font-size: 2rem;
    margin-bottom: 20px;
}

.tomatito-modal-content p {
    font-size: 1.1rem;
    line-height: 1.8;
}

.tomatito-modal-close {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    font-size: 1.5rem;
    color: #5a3e36;
    cursor: pointer;
}

.tomatito-modal-close:hover {
    color: #ff6f61;
}

/* Galería de Galletas */
.tomatito-gallery-section {
    margin-top: 100px;
}

.tomatito-gallery-section .tomatito-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.tomatito-gallery-section .tomatito-card {
    flex: 1 1 calc(33.333% - 40px);
    background-color: #f1cccc;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.tomatito-gallery-section .tomatito-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.tomatito-gallery-section .tomatito-card img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    display: block;
    margin: 0 auto;
}

.tomatito-gallery-section .tomatito-card-content {
    padding: 20px;
}

.tomatito-gallery-section .tomatito-card-content p {
    font-size: 1rem;
    line-height: 1.6;
}

/* Formulario de Contacto */
.tomatito-form-container {
    margin-top: 50px;
}

.tomatito-form-container h3 {
    font-size: 2rem;
    margin-bottom: 20px;
}

.tomatito-form-container form {
    background-color: #f0d1d1;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.tomatito-form-container .tomatito-input-field {
    margin-bottom: 20px;
}

.tomatito-form-container .tomatito-input-field label {
    display: block;
    font-size: 1rem;
    color: #5a3e36;
    margin-bottom: 5px;
}

.tomatito-form-container .tomatito-input-field input,
.tomatito-form-container .tomatito-input-field textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ffb6c1;
    border-radius: 10px;
    font-size: 1rem;
    color: #5a3e36;
}

.tomatito-form-container .tomatito-input-field input:focus,
.tomatito-form-container .tomatito-input-field textarea:focus {
    border-color: #ff6f61;
    outline: none;
}

.tomatito-form-container button {
    background-color: #ff6f61;
    color: #fff;
    font-family: 'Cookie', cursive;
    font-size: 1.2rem;
    padding: 10px 20px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.tomatito-form-container button:hover {
    background-color: #ff4a3a;
}

/* Mapa */
#tomatito-map {
    height: 400px;
    border-radius: 15px;
    margin-top: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}


.recipes-section {
    padding: 80px 20px;
    background-color: #f9f9f9;
    font-family: 'Merriweather', serif;
}

.recipes-section h2 {
    font-size: 3.5rem;
    font-family: 'Playfair Display', serif;
    color: #2c3e50;
    text-align: center;
    margin-bottom: 50px;
    text-transform: uppercase;
    letter-spacing: 2px;
    animation: fadeInDown 1s ease-in-out;
}

.recipes-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    max-width: 1300px;
    margin: 0 auto;
}

.recipe-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    text-align: left;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #e0e0e0;
}

.recipe-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

.recipe-image-container {
    width: 100%;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    border-radius: 10px;
    margin-bottom: 20px;
    background-color: #333;
}

.recipe-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
    opacity: 0.9;
}

.recipe-card h3 {
    font-size: 1.6rem;
    font-family: 'Playfair Display', serif;
    color: #2c3e50;
    margin-bottom: 15px;
}

.recipe-card p {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 20px;
    line-height: 1.6;
}

.recipe-details {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 20px;
    font-size: 0.9rem;
    color: #555;
}

.recipe-details span {
    flex: 1 1 calc(50% - 10px);
    display: block;
    margin-bottom: 8px;
}

.recipe-ingredients,
.recipe-instructions {
    margin-bottom: 20px;
}

.recipe-ingredients h4,
.recipe-instructions h4 {
    font-size: 1.1rem;
    font-family: 'Playfair Display', serif;
    color: #2c3e50;
    margin-bottom: 10px;
}

.recipe-ingredients ul,
.recipe-instructions ol {
    padding-left: 20px;
    color: #555;
    line-height: 1.6;
}

.recipe-ingredients li,
.recipe-instructions li {
    margin-bottom: 8px;
}

.comments-section {
    margin-top: 40px;
    padding: 20px;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.comment-card {
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 15px;
    border-left: 4px solid #2c3e50;
}

.comment-card strong {
    font-size: 1rem;
    color: #2c3e50;
    display: block;
    margin-bottom: 5px;
}

.comment-card span {
    font-size: 0.85rem;
    color: #777;
    display: block;
    margin-bottom: 10px;
}

.comment-card p {
    font-size: 0.95rem;
    color: #555;
    margin-top: 10px;
}

.stars {
    color: #ffc107; 
    font-size: 1.5rem; 
    margin-top: 10px;
}

.stars i {
    margin-right: 5px; 
}

.add-comment {
    margin-top: 30px;
    padding: 20px;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.add-comment textarea {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #e0e0e0;
    margin-bottom: 10px;
    font-family: 'Merriweather', serif;
    font-size: 0.95rem;
}

.add-comment input[type="number"] {
    width: 100px;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #e0e0e0;
    margin-bottom: 10px;
    font-family: 'Merriweather', serif;
    font-size: 0.95rem;
}

.add-comment button {
    background-color: #2c3e50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-family: 'Merriweather', serif;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

.add-comment button:hover {
    background-color: #1a252f;
}

.btn-comentar {
    background-color: #2c3e50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    margin-top: 20px;
    font-family: 'Merriweather', serif;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

.btn-comentar:hover {
    background-color: #1a252f;
}

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
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
@endif
