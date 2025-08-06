@extends('layouts.app')

@section('title', 'Acerca de Nosotros')

@section('content')

<br>
<br>
<br>
<br>
<br>
    <div class="tomatito-container tomatito-chef-section">
        <div class="image">
            <img src="{{ asset('images/jimin.png') }}" alt="Chef Jimin">
        </div>
        <div class="tomatito-info">
            <h3>Nuestro Chef Estrella</h3>
            <p>
                Nuestro chef estrella, <span class="highlight">Park Jimin</span>, no solo es un talentoso artista global, sino también un apasionado de la repostería. Con su creatividad y dedicación, cada pastel que prepara es una obra de arte llena de sabor y amor.
            </p>
            <a href="#tomatito-historyModal" class="tomatito-btn-custom">Conoce Nuestra Historia</a>
        </div>
    </div>

    <div id="tomatito-historyModal" class="tomatito-modal">
        <div class="tomatito-modal-content">
            <button class="tomatito-modal-close">&times;</button>
            <h4>La Historia de Lolos's</h4>
            <p>
                En el año <span class="highlight">1949</span>, nació una pequeña pastelería en honor a <span class="highlight">Elisa</span>, la madre de mi abuelo <span class="highlight">José Luis</span>. Con su nombre, la pastelería se convirtió en un lugar donde los sabores tradicionales y el amor por la repostería se transmitían de generación en generación. Hoy, seguimos honrando esa tradición con cada pastel que creamos.
            </p>
        </div>
    </div>

    <div class="tomatito-container tomatito-gallery-section">
        <h2>Nuestras Galletas</h2>
        <div class="tomatito-row">
            <div class="tomatito-card">
                <img src="{{ asset('images/chocolate.png') }}" alt="Galleta de Chocolate">
                <div class="tomatito-card-content">
                    <p><strong>Galleta de Chocolate</strong>: Deliciosa galleta con chispas de chocolate.</p>
                </div>
            </div>
            <div class="tomatito-card">
                <img src="{{ asset('images/fresa.png') }}" alt="Galleta de Fresa">
                <div class="tomatito-card-content">
                    <p><strong>Galleta de Fresa</strong>: Galleta suave con relleno de fresa.</p>
                </div>
            </div>
            <div class="tomatito-card">
                <img src="{{ asset('images/lotus.png') }}" alt="Galleta de Lotus">
                <div class="tomatito-card-content">
                    <p><strong>Galleta de Lotus</strong>: Galleta crujiente con crema de Lotus.</p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="tomatito-container tomatito-form-container">
        <h3>Contáctanos</h3>
        <form action="{{ route('user.send') }}" method="POST">
            @csrf
            <div class="tomatito-input-field">
                <label for="name">Nombre</label>
                <input type="text" name="name" required>
            </div>
            <div class="tomatito-input-field">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" required>
            </div>
            <div class="tomatito-input-field">
                <label for="subject">Asunto</label>
                <input type="text" name="subject" required>
            </div>
            <div class="tomatito-input-field">
                <label for="message">Mensaje</label>
                <textarea name="message" rows="5" required></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>

    <div class="tomatito-container">
        <h2>Nuestra Ubicación</h2>
        <div id="tomatito-map"></div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const map = L.map('tomatito-map').setView([20.4475, -97.3244], 3);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([20.4475, -97.3244]).addTo(map)
                .bindPopup('Biblioteca de Papantla<br>Lolos aquí')
                .openPopup();

            L.marker([19.4326, -99.1332]).addTo(map)
                .bindPopup('Biblioteca de la Ciudad de México<br>Lolos aquí');

            L.marker([20.6597, -103.3496]).addTo(map)
                .bindPopup('Biblioteca de Guadalajara<br>Lolos aquí');

            L.marker([25.6866, -100.3161]).addTo(map)
                .bindPopup('Biblioteca de Monterrey<br>Lolos aquí');

            const pinkIcon = L.icon({
                iconUrl: '{{ asset('images/Log.png') }}',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
            });

            L.marker([37.5665, 126.9780], { icon: pinkIcon }).addTo(map)
                .bindPopup('Pastelería en Corea del Sur<br>¡Ven a visitarnos!');
        });

        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('tomatito-historyModal');
            const modalClose = document.querySelector('.tomatito-modal-close');
            const modalTrigger = document.querySelector('.tomatito-btn-custom');

            modalTrigger.addEventListener('click', () => {
                modal.style.display = 'flex';
            });

            modalClose.addEventListener('click', () => {
                modal.style.display = 'none';
            });

            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
@endsection