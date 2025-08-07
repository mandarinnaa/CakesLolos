@extends('layouts.app')

@section('content')
<div class="main-content animate__animated animate__fadeIn">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.users.create') }}" class="nucita-btn nucita-btn-primary">
            <i class="fas fa-plus"></i> Crear Usuario
        </a>
    </div>

    @if(session('success'))
    <div class="nucita-alert alert-success animate__animated animate__fadeIn">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="nucita-alert alert-danger animate__animated animate__fadeIn">
        {{ session('error') }}
    </div>
    @endif

    <div class="nucita-card animate__animated animate__fadeInUp">
        <div class="table-responsive">
            <table class="nucita-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="animate__animated animate__fadeIn" style="animation-delay: {{ $loop->index * 0.05 }}s;">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge" style="background-color: 
                                {{ $user->role == 'admin' ? 'var(--nucita-accent)' : 
                                   ($user->role == 'editor' ? 'var(--nucita-primary)' : '#6c757d') }}; 
                                color: white; padding: 0.3rem 0.6rem; border-radius: 50px;">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="nucita-btn nucita-btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="nucita-delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="nucita-btn nucita-btn-danger btn-sm" onclick="return confirmDelete(event, '{{ $user->name }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(event, userName) {
        event.preventDefault();
        const form = event.target.closest('form');
        
        Swal.fire({
            title: `¿Eliminar usuario ${userName}?`,
            text: "Esta acción no se puede deshacer. ¿Estás seguro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
        
        return false;
    }
</script>
@endsection