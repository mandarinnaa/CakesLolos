@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Lista de Pasteles</h1>

    @if($cakes->isEmpty())
        <div class="alert alert-info">
            No hay pasteles disponibles por el momento.
        </div>
    @else
        <div class="row">
            @foreach($cakes as $cake)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($cake->image && file_exists(public_path('storage/' . $cake->image)))
                            <img src="{{ asset('storage/' . $cake->image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $cake->name }}">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=Sin+Imagen" 
                                 class="card-img-top" 
                                 alt="Sin imagen">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $cake->name }}</h5>
                            <p class="card-text">{{ $cake->description ?? 'Sin descripción' }}</p>
                            <p class="card-text">
                                <strong>Precio:</strong> ${{ number_format($cake->price, 2) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
