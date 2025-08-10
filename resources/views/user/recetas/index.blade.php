@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<br>
<br>
<br>
<div class="recipes-section">
    <h2>Recetas</h2>
    <div class="recipes-grid">
        @foreach($recetas as $receta)
        <div class="recipe-card">
            <div class="recipe-image-container">
<img src="{{ asset($receta->imagen) }}" alt="{{ $receta->nombre }}">
            </div>
            <h3>{{ $receta->nombre }}</h3>
            <p>{{ $receta->descripcion }}</p>
            <div class="recipe-details">
                <span><strong>Tiempo de preparación:</strong> {{ $receta->tiempo_preparacion }}</span>
                <span><strong>Tiempo de cocción:</strong> {{ $receta->tiempo_coccion }}</span>
                <span><strong>Porciones:</strong> {{ $receta->porciones }}</span>
                <span><strong>Dificultad:</strong> {{ $receta->dificultad }}</span>
            </div>
            <div class="recipe-ingredients">
                <h4>Ingredientes</h4>
                <ul>
                    @foreach(json_decode($receta->ingredientes) as $ingrediente)
                        <li>
                            {{ $ingrediente->nombre }}
                            @if(!empty($ingrediente->cantidad))
                                ({{ $ingrediente->cantidad }} 
                                @if(!empty($ingrediente->unidad)){{ $ingrediente->unidad }}@endif)
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="recipe-instructions">
                <h4>Instrucciones</h4>
                <ol>
                    @foreach(explode(',', $receta->instrucciones) as $instruccion)
                    <li>{{ $instruccion }}</li>
                    @endforeach
                </ol>
            </div>

            @if(auth()->check())
                @php
                    $calificacionUsuario = $receta->calificaciones->where('user_id', auth()->id())->first();
                @endphp
                @if($calificacionUsuario)
                    <div class="stars">
                        <strong>Tu calificación:</strong>
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $calificacionUsuario->estrellas)
                                <i class="fas fa-star"></i> 
                            @else
                                <i class="far fa-star"></i> 
                            @endif
                        @endfor
                    </div>
                @else
                    <p>No has calificado esta receta.</p>
                @endif
            @endif

            <a href="#comentarios-form" class="btn-comentar" data-receta-id="{{ $receta->id }}">Comentar</a>
        </div>
        @endforeach
    </div>
</div>

<div class="comments-section" id="comentarios">
    <h4>Comentarios y Calificaciones</h4>
    @foreach($recetas as $receta)
        @foreach($receta->comentarios as $comentario)
        <div class="comment-card">
            <strong>{{ $comentario->user->name }}</strong>
            <span>{{ $comentario->created_at->format('d/m/Y H:i') }}</span>
            <p><strong>Receta:</strong> {{ $comentario->receta->nombre }}</p>
            <p>{{ $comentario->comentario }}</p>
        </div>
        @endforeach
    @endforeach
</div>

@auth
<div class="add-comment" id="comentarios-form">
    <h4>Agregar Comentario y Calificación</h4>
    <form id="form-comentario" action="{{ route('comentarios.store', ['receta' => '__RECETA_ID__']) }}" method="POST">
        @csrf
        <textarea name="comentario" placeholder="Escribe tu comentario..." required></textarea>
        <input type="number" name="estrellas" min="1" max="5" placeholder="Calificación (1-5)" required>
        <button type="submit">Enviar</button>
    </form>
</div>
@endauth

<script>
    document.querySelectorAll('.btn-comentar').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); 
            const recetaId = this.getAttribute('data-receta-id'); 
            const form = document.querySelector('#form-comentario');
            const action = form.getAttribute('action').replace('__RECETA_ID__', recetaId); 
            form.setAttribute('action', action); 
            document.querySelector('#comentarios-form').scrollIntoView({
                behavior: 'smooth' 
            });
        });
    });
</script>
@endsection