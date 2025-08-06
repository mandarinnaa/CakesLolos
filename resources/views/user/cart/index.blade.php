@extends('layouts.app')

@section('title', 'Tu Carrito')

@section('content')

<div class="container frijolito-cart-container">
    <br>
    <br>
    <h2 class="frijolito-title">Tu Carrito</h2>
    @if($carts->isEmpty())
        <div class="frijolito-alert-info alert-info text-center">
            <p>Tu carrito está vacío.</p>
            <a href="{{ route('user.cakes.index') }}" class="frijolito-btn-primary btn btn-primary">Explorar Pasteles</a>
        </div>
    @else
        <div class="frijolito-cart-items">
            @foreach($carts as $cart)
                <div class="frijolito-cart-item card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img src="{{ asset('storage/' . $cart->cake->image) }}" alt="{{ $cart->cake->name }}" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h3 class="frijolito-card-title">{{ $cart->cake->name }}</h3>
                                <p class="frijolito-card-text">Cantidad: {{ $cart->quantity }}</p>
                                <p class="frijolito-card-text">Stock disponible: {{ $cart->cake->stock }}</p>
                                <p class="frijolito-card-text">Precio Unitario: ${{ number_format($cart->cake->price, 2) }}</p>
                                <p class="frijolito-card-text">Subtotal: ${{ number_format($cart->cake->price * $cart->quantity, 2) }}</p>
                            </div>
                            <div class="col-md-3 text-right">
                                <form action="{{ route('user.cart.remove', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="frijolito-btn-danger btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="frijolito-cart-summary card">
            <div class="card-body">
                <h4 class="frijolito-cart-total text-right">Total: ${{ number_format($total, 2) }}</h4>
                <div id="paypal-button-container" class="mt-3"></div>
            </div>
        </div>
    @endif
</div>

<!-- Modal de confirmación -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-header" style="background-color: #ff6b6b; border-bottom: none;">
                <div class="text-center w-100">
                    <!-- Aquí coloca tu logo -->
                    <img src="{{ asset('images/Log.png') }}" alt="Logo" style="max-height: 80px; margin-bottom: 15px;">
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center py-4">
                <h3 style="color: #ff6b6b; font-family: 'Cookie', cursive; font-size: 2rem;">
                    ¡Gracias por tu compra!
                </h3>
                <p class="mt-3" style="font-size: 1.1rem;">
                    Esperamos que disfrutes de tus deliciosos pasteles. 
                    <br>¡Vuelve pronto!
                </p>
                <div class="mt-4">
                    <button type="button" class="btn" 
                            style="background-color: #ff6b6b; color: white; border-radius: 25px; padding: 8px 25px;"
                            data-dismiss="modal">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.paypal.com/sdk/js?client-id=AfDSwNi-uMyXfbQwNBE6VqmlAnvI5kW03PHJn1W-fGW-y_UXm9YPjXYjnuLagsr6s4VNvGGMpX055IGZ&currency=USD"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $total }}'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    fetch("{{ route('user.checkout') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            orderID: data.orderID,
                            payerID: details.payer.payer_id
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                if (err.message && err.message.includes('stock')) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error de stock',
                                        text: err.message,
                                    });
                                } else {
                                    throw new Error(err.message || 'Error en la solicitud: ' + response.statusText);
                                }
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            // Mostrar el modal de éxito
                            $('#successModal').modal('show');
                            
                            // Redirigir después de 3 segundos (opcional)
                            setTimeout(function() {
                                window.location.href = "{{ route('user.cakes.index') }}";
                            }, 3000);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Hubo un error al procesar el pago.',
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error al procesar el pago:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: error.message || 'Hubo un error al procesar el pago.',
                        });
                    });
                });
            }
        }).render('#paypal-button-container');
    });
</script>
@endsection