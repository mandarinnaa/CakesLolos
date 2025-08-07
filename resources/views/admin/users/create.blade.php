@extends('layouts.app')

@section('content')
<div class="main-content animate__animated animate__fadeIn">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 style="color: var(--nucita-accent); font-family: 'Cookie', cursive; font-size: 2.5rem;">Crear Nuevo Usuario</h1>
            <p style="color: var(--nucita-text);">Completa el formulario para agregar un nuevo usuario.</p>
        </div>
        <a href="{{ route('admin.users') }}" class="nucita-btn nucita-btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <div class="nucita-card animate__animated animate__fadeInUp">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" class="nucita-form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="nucita-form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password" class="nucita-form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="password_confirmation">Confirmar Contraseña:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="nucita-form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="nucita-form-group">
                        <label for="role">Rol:</label>
                        <select name="role" id="role" class="nucita-form-control" required>
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                            <option value="user" selected>Usuario</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="nucita-btn nucita-btn-primary">
                    <i class="fas fa-save"></i> Crear Usuario
                </button>
            </div>
        </form>
    </div>
</div>
@endsection