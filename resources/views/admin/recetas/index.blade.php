@extends('layouts.app')

@section('content')
<div class="main-content animate__animated animate__fadeIn">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.recetas.create') }}" class="nucita-btn nucita-btn-primary">
            <i class="fas fa-plus"></i> Crear nueva receta
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
                        <th>Descripción</th>
                        <th>Tiempo</th>
                        <th>Dificultad</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recetas as $receta)
                    <tr class="animate__animated animate__fadeIn" style="animation-delay: {{ $loop->index * 0.05 }}s;">
                        <td>{{ $receta->nombre }}</td>
                        <td>{{ Str::limit($receta->descripcion, 30) }}</td>
                        <td>{{ $receta->tiempo_preparacion }} min</td>
                        <td>
                            <span class="badge" style="background-color: 
                                {{ $receta->dificultad == 'Fácil' ? '#28a745' : 
                                   ($receta->dificultad == 'Media' ? '#ffc107' : '#dc3545') }}; 
                                color: white; padding: 0.3rem 0.6rem; border-radius: 50px;">
                                {{ $receta->dificultad }}
                            </span>
                        </td>
                        <td>
                            @if($receta->imagen)
                                <img src="{{ asset('storage/' . $receta->imagen) }}" alt="{{ $receta->nombre }}" width="60" style="border-radius: 8px;">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.recetas.edit', $receta->id) }}" class="nucita-btn nucita-btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.recetas.destroy', $receta->id) }}" method="POST" class="nucita-delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="nucita-btn nucita-btn-danger btn-sm" onclick="return confirmDelete(event)">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(event) {
        event.preventDefault();
        const form = event.target.closest('form');
        
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
        
        return false;
    }
</script>
@endsection