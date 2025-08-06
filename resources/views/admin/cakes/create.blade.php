@extends('layouts.app')

@section('content')
<div class="animate__animated animate__fadeIn">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 style="color: var(--nucita-accent); font-family: 'Cookie', cursive; font-size: 2.5rem;">
                {{ isset($cake) ? 'Editar Pastel' : 'Crear Pastel' }}
            </h1>
        </div>
        <a href="{{ route('admin.cakes.index') }}" class="nucita-btn nucita-btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <div class="nucita-card animate__animated animate__fadeInUp">
        <form action="{{ isset($cake) ? route('admin.cakes.update', $cake->id) : route('admin.cakes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($cake))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" class="nucita-form-control" value="{{ $cake->name ?? '' }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="price">Precio:</label>
                        <input type="number" step="0.01" name="price" id="price" class="nucita-form-control" value="{{ $cake->price ?? '' }}" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="nucita-form-group">
                        <label for="description">Descripción:</label>
                        <textarea name="description" id="description" class="nucita-form-control" rows="3" required>{{ $cake->description ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="stock">Stock disponible:</label>
                        <input type="number" name="stock" id="stock" class="nucita-form-control" 
                               value="{{ $cake->stock ?? '' }}" required min="0">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="nucita-form-group">
                        <label for="image">Imagen:</label>
                        <input type="file" name="image" id="image" class="nucita-form-control" {{ !isset($cake) ? 'required' : '' }}>
                        @if(isset($cake) && $cake->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $cake->image) }}" alt="{{ $cake->name }}" width="120" style="border-radius: 8px;">
                                <p class="text-muted mt-1">Imagen actual</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="nucita-btn nucita-btn-primary">
                    <i class="fas fa-save"></i> {{ isset($cake) ? 'Actualizar' : 'Crear' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection