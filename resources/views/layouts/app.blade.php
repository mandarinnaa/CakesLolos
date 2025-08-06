<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lolos Cake')</title>
    <style>
        
<head>
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
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}

@keyframes fadeInScale {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}

@keyframes wave {
    0% { transform: rotate(0deg); }
    25% { transform: rotate(5deg); }
    75% { transform: rotate(-5deg); }
    100% { transform: rotate(0deg); }
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
    animation: fadeInDown 0.5s ease;
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
</head>

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
    width: 150%;
    height: 150%;
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
    color: rgb(14, 13, 13);
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
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}

@keyframes fadeInScale {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}

@keyframes wave {
    0% { transform: rotate(0deg); }
    25% { transform: rotate(5deg); }
    75% { transform: rotate(-5deg); }
    100% { transform: rotate(0deg); }
}


/* Estilos generales para el editor */
.editor-dashboard-container, .messages-container {
    max-width: 1200px;
    margin: 30px auto;
    padding: 20px;
    background-color: var(--nucita-blanco);
    border-radius: 15px;
    box-shadow: var(--sombra-suave);
}

.dashboard-header, .messages-header {
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 2px solid var(--nucita-cream);
}

.dashboard-header h1, .messages-header h1 {
    color: var(--nucita-accent);
    font-family: 'Cookie', cursive;
    font-size: 2.5rem;
}

/* Quick Actions */
.quick-actions {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

.action-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(210, 180, 140, 0.1);
    position: relative;
    border: 1px solid var(--nucita-cream);
}

.action-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(210, 180, 140, 0.2);
}

.action-card a {
    text-decoration: none;
    color: var(--nucita-text);
    display: block;
}

.action-card i {
    font-size: 2rem;
    color: var(--nucita-rosa);
    margin-bottom: 15px;
}

.action-card h3 {
    color: var(--nucita-accent);
    margin-bottom: 10px;
}

.action-card p {
    color: var(--nucita-text);
    font-size: 0.9rem;
}

.notification-badge {
    position: absolute;
    top: -10px;
    right: -10px;
    background-color: var(--nucita-berry);
    color: white;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    font-weight: bold;
}

/* Filtros */
.filter-buttons {
    display: flex;
    gap: 10px;
    margin: 20px 0;
}

.filter-btn {
    padding: 8px 15px;
    border-radius: 20px;
    background-color: var(--nucita-cream);
    color: var(--nucita-text);
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.filter-btn.active, .filter-btn:hover {
    background-color: var(--nucita-rosa);
    color: white;
}

/* Mensajes */
.messages-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.message-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(210, 180, 140, 0.1);
    border: 1px solid var(--nucita-cream);
}

.message-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.message-header h3 {
    color: var(--nucita-accent);
    margin: 0;
}

.message-header h3 span {
    font-size: 0.9rem;
    color: var(--nucita-text);
    font-weight: normal;
}

.status-badge {
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: bold;
}

.status-pendiente {
    background-color: var(--nucita-amarillo);
    color: var(--nucita-text);
}

.status-approved {
    background-color: #a3d8a3;
    color: #2a5a2a;
}

.status-rejected {
    background-color: #ffb6b6;
    color: #8a2a2a;
}

.message-content p {
    color: var(--nucita-text);
    line-height: 1.6;
}

.message-content small {
    color: var(--nucita-cafe);
    font-size: 0.8rem;
}

.message-actions {
    display: flex;
    gap: 10px;
    margin-top: 15px;
    flex-wrap: wrap;
}

.btn-action {
    padding: 8px 15px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 5px;
}

.btn-approve {
    background-color: #a3d8a3;
    color: #2a5a2a;
}

.btn-approve:hover {
    background-color: #8bc78b;
}

.btn-reject {
    background-color: #ffb6b6;
    color: #8a2a2a;
}

.btn-reject:hover {
    background-color: #ff9e9e;
}

.btn-restore {
    background-color: var(--nucita-amarillo);
    color: var(--nucita-text);
}

.btn-restore:hover {
    background-color: #f5d166;
}

.btn-delete {
    background-color: #f8f8f8;
    color: var(--nucita-text);
    border: 1px solid #ddd;
}

.btn-delete:hover {
    background-color: #eee;
}

/* Paginación */
.pagination {
    margin-top: 30px;
    display: flex;
    justify-content: center;
}

.pagination .page-item.active .page-link {
    background-color: var(--nucita-rosa);
    border-color: var(--nucita-rosa);
}

.pagination .page-link {
    color: var(--nucita-accent);
}

/* Alertas */
.alert {
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.alert-success {
    background-color: rgba(163, 216, 163, 0.3);
    border-left: 4px solid #a3d8a3;
    color: #2a5a2a;
}

.alert-danger {
    background-color: rgba(255, 182, 193, 0.3);
    border-left: 4px solid var(--nucita-berry);
    color: #8a2a2a;
}

.empty-message {
    text-align: center;
    padding: 40px;
    color: var(--nucita-cafe);
    font-size: 1.1rem;
}

/* Responsive */
@media (max-width: 768px) {
    .quick-actions {
        grid-template-columns: 1fr;
    }
    
    .filter-buttons {
        flex-wrap: wrap;
    }
    
    .message-actions {
        flex-direction: column;
    }
    
    .btn-action {
        width: 100%;
        justify-content: center;
    }
}
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
