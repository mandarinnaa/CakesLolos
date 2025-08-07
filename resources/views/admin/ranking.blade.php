@extends('layouts.app')

@section('content')
<div class="main-content animate__animated animate__fadeIn">

    <div class="nucita-card animate__animated animate__fadeInUp">
        <div class="table-responsive">
            <table class="nucita-table">
                <thead>
                    <tr>
                        <th>Receta</th>
                        <th>Usuario</th>
                        <th>Estrellas</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($calificaciones as $calificacion)
                    <tr class="animate__animated animate__fadeIn" style="animation-delay: {{ $loop->index * 0.05 }}s;">
                        <td>{{ $calificacion->receta->nombre }}</td>
                        <td>{{ $calificacion->user->name }}</td>
                        <td>
                            <div class="stars" style="color: #FFD700;">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $calificacion->estrellas)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                        </td>
                        <td>{{ $calificacion->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection