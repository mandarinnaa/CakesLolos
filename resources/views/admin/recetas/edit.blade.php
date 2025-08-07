@extends('layouts.app')

@section('content')
<div class="main-content animate__animated animate__fadeIn">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 style="color: var(--nucita-accent); font-family: 'Cookie', cursive; font-size: 2.5rem;">
                {{ isset($receta) ? 'Editar Receta' : 'Crear Receta' }}
            </h1>
        </div>
        <a href="{{ route('admin.recetas.index') }}" class="nucita-btn nucita-btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <div class="nucita-card animate__animated animate__fadeInUp">
        <form action="{{ isset($receta) ? route('admin.recetas.update', $receta->id) : route('admin.recetas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($receta))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="nucita-form-control" value="{{ $receta->nombre ?? '' }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="dificultad">Dificultad:</label>
                        <select id="dificultad" name="dificultad" class="nucita-form-control" required>
                            <option value="Fácil" {{ isset($receta) && $receta->dificultad == 'Fácil' ? 'selected' : '' }}>Fácil</option>
                            <option value="Media" {{ isset($receta) && $receta->dificultad == 'Media' ? 'selected' : '' }}>Media</option>
                            <option value="Difícil" {{ isset($receta) && $receta->dificultad == 'Difícil' ? 'selected' : '' }}>Difícil</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="nucita-form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea id="descripcion" name="descripcion" class="nucita-form-control" rows="3" required>{{ $receta->descripcion ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="nucita-form-group">
                        <label for="tiempo_preparacion">Tiempo de Preparación (min):</label>
                        <input type="number" id="tiempo_preparacion" name="tiempo_preparacion" class="nucita-form-control" value="{{ $receta->tiempo_preparacion ?? '' }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="nucita-form-group">
                        <label for="tiempo_coccion">Tiempo de Cocción (min):</label>
                        <input type="number" id="tiempo_coccion" name="tiempo_coccion" class="nucita-form-control" value="{{ $receta->tiempo_coccion ?? '' }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="nucita-form-group">
                        <label for="porciones">Porciones:</label>
                        <input type="number" id="porciones" name="porciones" class="nucita-form-control" value="{{ $receta->porciones ?? '' }}" required>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="ingredientes">Ingredientes:</label>
                        <textarea id="ingredientes" name="ingredientes" class="nucita-form-control" rows="5" required 
                                  placeholder="Ingresa un ingrediente por línea. Ejemplo:
                - 2 tazas de harina
                - 1 cucharadita de sal">{{ isset($receta) ? implode("\n", array_map(function($i) { return $i['nombre']; }, json_decode($receta->ingredientes, true))) : '' }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="instrucciones">Instrucciones:</label>
                        <textarea id="instrucciones" name="instrucciones" class="nucita-form-control" rows="5" required>{{ $receta->instrucciones ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="nucita-form-group">
                        <label for="imagen">Imagen:</label>
                        <input type="file" id="imagen" name="imagen" class="nucita-form-control" {{ !isset($receta) ? 'required' : '' }}>
                        @if(isset($receta) && $receta->imagen)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $receta->imagen) }}" alt="{{ $receta->nombre }}" width="120" style="border-radius: 8px;">
                                <p class="text-muted mt-1">Imagen actual</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="nucita-btn nucita-btn-primary">
                    <i class="fas fa-save"></i> {{ isset($receta) ? 'Actualizar' : 'Crear' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection