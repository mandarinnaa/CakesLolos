@extends('layouts.app')

@section('content')
<div class="main-content animate__animated animate__fadeIn">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 style="color: var(--nucita-accent); font-family: 'Cookie', cursive; font-size: 2.5rem;">Editar Usuario</h1>
            <p style="color: var(--nucita-text);">Actualiza la información del usuario.</p>
        </div>
        <a href="{{ route('admin.users') }}" class="nucita-btn nucita-btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    @if(session('success'))
    <div class="nucita-alert alert-success animate__animated animate__fadeIn">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="nucita-alert alert-danger animate__animated animate__fadeIn">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="nucita-card animate__animated animate__fadeInUp">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="name"><i class="fas fa-user"></i> Nombre</label>
                        <input type="text" name="name" id="name" class="nucita-form-control" value="{{ $user->name }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" name="email" id="email" class="nucita-form-control" value="{{ $user->email }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="role"><i class="fas fa-user-tag"></i> Rol</label>
                        <select name="role" id="role" class="nucita-form-control" required>
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Usuario</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador</option>
                            <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Editor</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="password"><i class="fas fa-key"></i> Nueva Contraseña (opcional)</label>
                        <input type="password" name="password" id="password" class="nucita-form-control">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4 gap-2">
                <button type="submit" class="nucita-btn nucita-btn-primary">
                    <i class="fas fa-save"></i> Actualizar
                </button>
                <a href="{{ route('admin.users') }}" class="nucita-btn nucita-btn-secondary">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection