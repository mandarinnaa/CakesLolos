@extends('layouts.app')

@section('content')
<style>
    .error-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background: linear-gradient(135deg, #6f051c, #8b0000);
        color: white;
        text-align: center;
        font-family: 'Arial', sans-serif;
        overflow: hidden;
    }

    .error-container h1 {
        font-size: 3rem;
        animation: bounce 2s infinite, colorChange 5s infinite;
        margin-bottom: 20px;
    }

    .error-container p {
        font-size: 1.5rem;
        margin-top: 20px;
        animation: fadeInOut 3s infinite;
    }

    .error-container img {
        width: 150px;
        margin-bottom: 20px;
        animation: spin 4s linear infinite, float 3s ease-in-out infinite;
    }

    .error-container .fire {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 100px;
        background: linear-gradient(to top, rgba(255, 69, 0, 0.8), transparent);
        animation: fire 2s infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @keyframes fadeInOut {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    @keyframes colorChange {
        0% { color: #ffcc00; }
        50% { color: #ff6666; }
        100% { color: #ffcc00; }
    }

    @keyframes fire {
        0% { transform: scaleY(1); }
        50% { transform: scaleY(1.2); }
        100% { transform: scaleY(1); }
    }
</style>

<div class="error-container">
    <img src="{{ asset('images/Log.png') }}" alt="Logo">
    <h1>¡NO PUEDES ENTRAR!</h1>
    <h1>¡VETE CHUSCALEE!</h1>
    <p>Por favor, retrocede.... 😊</p>
    <div class="fire"></div>
</div>
@endsection