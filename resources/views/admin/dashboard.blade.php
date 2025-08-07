@extends('layouts.app')

@section('content')
  

<div class="main-content animate__animated animate__fadeIn">
    <h1 class="mb-4" style="color: var(--nucita-accent); font-family: 'Cookie', cursive; font-size: 3rem;">Bienvenido, Administrador</h1>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="nucita-card animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
                <div class="text-center mb-3">
                    <i class="fas fa-user-friends fa-3x" style="color: var(--nucita-primary);"></i>
                </div>
                <h3 class="text-center"><a href="{{ route('admin.users') }}" style="color: var(--nucita-accent); text-decoration: none;">Usuarios</a></h3>
                <p class="text-center">Gestiona los usuarios registrados en el sistema.</p>
                <div class="text-center mt-3">
                    <a href="{{ route('admin.users') }}" class="nucita-btn nucita-btn-primary">Administrar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="nucita-card animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                <div class="text-center mb-3">
                    <i class="fas fa-envelope fa-3x" style="color: var(--nucita-primary);"></i>
                </div>
                <h3 class="text-center"><a href="{{ route('admin.mensajes') }}" style="color: var(--nucita-accent); text-decoration: none;">Mensajes</a></h3>
                <p class="text-center">Gestiona los mensajes registrados en el sistema.</p>
                <div class="text-center mt-3">
                    <a href="{{ route('admin.mensajes') }}" class="nucita-btn nucita-btn-primary">Ver mensajes</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="nucita-card animate__animated animate__fadeInUp" style="animation-delay: 0.3s;">
                <div class="text-center mb-3">
                    <i class="fas fa-shopping-cart fa-3x" style="color: var(--nucita-primary);"></i>
                </div>
                <h3 class="text-center"><a href="{{ route('admin.pedidos') }}" style="color: var(--nucita-accent); text-decoration: none;">Pasteles Pagados</a></h3>
                <p class="text-center">Gestionar los pedidos de tus pasteles pagados.</p>
                <div class="text-center mt-3">
                    <a href="{{ route('admin.pedidos') }}" class="nucita-btn nucita-btn-primary">Ver pedidos</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="nucita-card animate__animated animate__fadeInUp" style="animation-delay: 0.4s;">
                <div class="text-center mb-3">
                    <i class="fas fa-birthday-cake fa-3x" style="color: var(--nucita-primary);"></i>
                </div>
                <h3 class="text-center"><a href="{{ route('admin.cakes.index') }}" style="color: var(--nucita-accent); text-decoration: none;">Pasteles</a></h3>
                <p class="text-center">Gestiona la ventas de tus pasteles.</p>
                <div class="text-center mt-3">
                    <a href="{{ route('admin.cakes.index') }}" class="nucita-btn nucita-btn-primary">Administrar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="nucita-card animate__animated animate__fadeInUp" style="animation-delay: 0.5s;">
                <div class="text-center mb-3">
                    <i class="fas fa-book fa-3x" style="color: var(--nucita-primary);"></i>
                </div>
                <h3 class="text-center"><a href="{{ route('admin.recetas.index') }}" style="color: var(--nucita-accent); text-decoration: none;">Recetas</a></h3>
                <p class="text-center">Gestiona tus recetas secretas.</p>
                <div class="text-center mt-3">
                    <a href="{{ route('admin.recetas.index') }}" class="nucita-btn nucita-btn-primary">Ver recetas</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="nucita-card animate__animated animate__fadeInUp" style="animation-delay: 0.6s;">
                <div class="text-center mb-3">
                    <i class="fas fa-star fa-3x" style="color: var(--nucita-primary);"></i>
                </div>
                <h3 class="text-center"><a href="{{ route('admin.ranking') }}" style="color: var(--nucita-accent); text-decoration: none;">Ranking</a></h3>
                <p class="text-center">Gestiona el ranking de tus recetas.</p>
                <div class="text-center mt-3">
                    <a href="{{ route('admin.ranking') }}" class="nucita-btn nucita-btn-primary">Ver ranking</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Efecto hover en tarjetas
    const cards = document.querySelectorAll('.nucita-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        
        card.addEventListener('mouseenter', () => {
            card.classList.add('animate__animated', 'animate__pulse');
        });
        
        card.addEventListener('mouseleave', () => {
            card.classList.remove('animate__animated', 'animate__pulse');
        });
    });
    
    // Efecto en filas de tabla
    const tableRows = document.querySelectorAll('.nucita-table tbody tr');
    tableRows.forEach((row, index) => {
        row.style.animationDelay = `${index * 0.05}s`;
        row.classList.add('animate__animated', 'animate__fadeIn');
        
        row.addEventListener('mouseenter', () => {
            row.classList.add('nucita-wave');
        });
        
        row.addEventListener('mouseleave', () => {
            row.classList.remove('nucita-wave');
        });
    });
    
    // SweetAlert personalizado
    const deleteForms = document.querySelectorAll('.nucita-delete-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#A67C52',
                cancelButtonColor: '#FFB6C1',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                background: 'var(--nucita-blanco)',
                backdrop: `
                    rgba(255, 214, 125, 0.2)
                `
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
    
    // Efecto de carga progresiva
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 100);
});
</script>
@endsection