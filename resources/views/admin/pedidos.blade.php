@extends('layouts.app')

@section('content')
<div class="animate__animated animate__fadeIn">
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="nucita-card animate__animated animate__fadeInUp">
        <div class="table-responsive">
            <table class="nucita-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                    <tr class="animate__animated animate__fadeIn" style="animation-delay: {{ $loop->index * 0.05 }}s;">
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->user->name }}</td>
                        <td>${{ number_format($pedido->total_amount, 2) }}</td>
                        <td>{{ $pedido->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="#" class="nucita-btn nucita-btn-primary btn-sm">
                                <i class="fas fa-eye"></i> Ver
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection