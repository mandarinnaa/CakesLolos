@extends('layouts.app')

@section('content')
<div class="main-content animate__animated animate__fadeIn">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.cakes.create') }}" class="nucita-btn nucita-btn-primary">
            <i class="fas fa-plus"></i> {{__("Create New Cake")}}
        </a>
    </div>

    @if(session('success'))
    <div class="nucita-alert alert-success animate__animated animate__fadeIn">
        {{ session('success') }}
    </div>
    @endif

    <div class="nucita-card animate__animated animate__fadeInUp">
        <div class="table-responsive">
            <table class="nucita-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cakes as $cake)
                    <tr class="animate__animated animate__fadeIn" style="animation-delay: {{ $loop->index * 0.05 }}s;">
                        <td>{{ $cake->name }}</td>
                        <td>{{ Str::limit($cake->description, 30) }}</td>
                        <td>{{ $cake->stock }}</td>
                        <td>${{ number_format($cake->price, 2) }}</td>
                        <td>
                            @if($cake->image)
                                <img src="{{ asset('storage/' . $cake->image) }}" alt="{{ $cake->name }}" width="60" style="border-radius: 8px;">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.cakes.edit', $cake->id) }}" class="nucita-btn nucita-btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.cakes.destroy', $cake->id) }}" method="POST" class="nucita-delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="nucita-btn nucita-btn-danger btn-sm" onclick="return confirmDelete(event, '{{ $cake->name }}')">
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
    function confirmDelete(event, cakeName) {
        event.preventDefault();
        const form = event.target.closest('form');

        Swal.fire({
            title: `¿Eliminar ${cakeName}?`,
            text: "¡Esta acción no se puede deshacer!",
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
