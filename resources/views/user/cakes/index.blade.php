
<div class="cereza-container-cakes">
    <br>
    <br>
    <h1 class="cereza-title"><i class="fas fa-birthday-cake"></i> Pasteles Disponibles</h1>
    <div class="cereza-row">
        @foreach($cakes as $cake)
        <div class="col-md-4 mb-4">
            <div class="cereza-card-hover">
                <img src="{{ asset('storage/' . $cake->image) }}" class="cereza-card-img-top" alt="{{ $cake->name }}">
                <div class="cereza-card-body">
                    <h5 class="cereza-card-title"><i class="fas fa-cake"></i> {{ $cake->name }}</h5>
                    <p class="cereza-card-text">{{ $cake->description }}</p>
                    <p class="cereza-card-text"><i class="fas fa-box"></i> <strong>Disponibles:</strong> {{ $cake->stock }}</p>
                    <p class="cereza-card-text"><i class="fas fa-tag"></i> <strong>Precio:</strong> ${{ number_format($cake->price, 2) }}</p>
                    <form action="{{ route('user.cart.add', $cake->id) }}" method="POST" class="add-to-cart-form">
                        @csrf
                        <button type="submit" class="cereza-btn-custom">
                            <i class="fas fa-cart-plus"></i> Agregar al carrito
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('.add-to-cart-form');

        forms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); 

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Gracias por elegirnos!',
                            text: 'Puedes ir a tu carrito cuando desees y pagar.',
                            confirmButtonText: 'Ir al carrito',
                            showCancelButton: true,
                            cancelButtonText: 'Seguir comprando',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('user.cart.index') }}"; 
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No se pudo agregar el pastel al carrito.',
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un problema al agregar el pastel al carrito.',
                    });
                });
            });
        });
    });
</script>
@endsection