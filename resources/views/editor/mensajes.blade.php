@extends('layouts.app')

@section('content')
<div class="messages-container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="messages-header">
        <h1>Moderación de Comentarios</h1>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="filter-buttons">
            <a href="{{ route('editor.mensajes') }}?status=all" class="filter-btn {{ $status == 'all' ? 'active' : '' }}">
                Todos
            </a>
            <a href="{{ route('editor.mensajes') }}?status=pendiente" class="filter-btn {{ $status == 'pendiente' ? 'active' : '' }}">
                Pendientes
            </a>
            <a href="{{ route('editor.mensajes') }}?status=approved" class="filter-btn {{ $status == 'approved' ? 'active' : '' }}">
                Aprobados
            </a>
            <a href="{{ route('editor.mensajes') }}?status=rejected" class="filter-btn {{ $status == 'rejected' ? 'active' : '' }}">
                Rechazados
            </a>
        </div>
    </div>

    @if ($messages->isEmpty())
        <div class="empty-message">
            <p>No hay mensajes con este filtro.</p>
        </div>
    @else
        <div class="messages-list">
            @foreach ($messages as $message)
                <div class="message-card">
                    <div class="message-header">
                        <h3>{{ $message->name }} <span>({{ $message->email }})</span></h3>
                        <span class="status-badge status-{{ $message->status }}">
                            @if($message->status == 'pendiente')
                                Pendiente
                            @elseif($message->status == 'approved')
                                Aprobado
                            @else
                                Rechazado
                            @endif
                        </span>
                    </div>
                    
                    <div class="message-content">
                        <p>{{ $message->message }}</p>
                        <small>Enviado: {{ $message->created_at->format('d/m/Y H:i') }}</small>
                    </div>

                    <div class="message-actions">
                        @if(in_array(strtolower($message->status), ['pendiente', 'pending']))
                            <form action="{{ route('editor.mensajes.approve', $message->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn-action btn-approve">
                                    <i class="fas fa-check"></i> Aprobar
                                </button>
                            </form>

                            <form action="{{ route('editor.mensajes.reject', $message->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn-action btn-reject">
                                    <i class="fas fa-times"></i> Rechazar
                                </button>
                            </form>
                        @endif

                        @if(strtolower($message->status) == 'rejected')
                            <form action="{{ route('editor.mensajes.restore', $message->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn-action btn-restore">
                                    <i class="fas fa-undo"></i> Restaurar
                                </button>
                            </form>
                        @endif

                        <form action="{{ route('editor.mensajes.destroy', $message->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $messages->links() }}
        </div>
    @endif
</div>
@endsection