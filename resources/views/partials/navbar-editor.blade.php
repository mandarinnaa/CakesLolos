@if(Auth::check() && Auth::user()->role === 'editor')
<style>:root {
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
}</style>
<nav class="navbar-admin">
    <div class="navbar-admin-container">
        <div class="navbar-admin-brand">
            <a href="{{ route('editor.dashboard') }}">
                <img src="{{ asset('images/Log.png') }}" alt="Logo Lolo's Cake" class="navbar-admin-logo">
                <span class="navbar-admin-title">Lolo's Cake Editor</span>
            </a>
        </div>
        
        <button class="navbar-admin-toggler" type="button" id="navbarAdminToggle">
            <i class="fas fa-bars"></i>
        </button>
        
        <div class="navbar-admin-collapse" id="navbarAdminCollapse">
            <ul class="navbar-admin-nav">
                <li class="nav-item">
                    <a href="{{ route('editor.dashboard') }}" class="nav-link">
                        <i class="fas fa-user"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('editor.mensajes') }}" class="nav-link">
                        <i class="fas fa-envelope"></i> <span>Mensajes</span>
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