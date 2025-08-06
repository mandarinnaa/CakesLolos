@extends('layouts.app')

@section('content')
<div class="editor-dashboard-container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="dashboard-header">
        <h1>Bienvenido, Editor</h1>
        <p>Panel de control para la gestión de contenido</p>
    </div>

    <div class="quick-actions">
        <div class="action-card">
            <a href="{{ route('editor.mensajes') }}">
                <i class="fas fa-envelope"></i>
                <h3>Mensajes</h3>
                <p>Gestiona los mensajes registrados en el sistema</p>
                @if($pendingCount > 0)
                    <span class="notification-badge">{{ $pendingCount }}</span>
                @endif
            </a>
        </div>
    </div>
</div>
@endsection