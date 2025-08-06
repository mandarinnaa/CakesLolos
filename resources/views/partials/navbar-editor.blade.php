@if(Auth::check() && Auth::user()->role === 'editor')
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