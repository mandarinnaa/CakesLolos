<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\GitHubLoginController;
use App\Http\Controllers\Auth\GoogleLoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CakeController as AdminCakeController;
use App\Http\Controllers\Admin\RecetaController;
use App\Http\Controllers\Admin\RecetaControllers;
use App\Http\Controllers\CakeUserController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Autenticación con Google y GitHub
Route::get('/login/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);
Route::get('/login/github', [GitHubLoginController::class, 'redirectToGitHub'])->name('login.github');
Route::get('/login/github/callback', [GitHubLoginController::class, 'handleGitHubCallback']);

// Registro, login y recuperación de contraseña
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/welcome', [AuthController::class, 'welcome']);

Route::get('/password/reset', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

// Ruta de error
Route::get('/error/unauthorized', function () {
    return view('errors.unauthorized');
})->name('error.unauthorized');

// Rutas protegidas para el administrador
Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    // Dashboard y gestión general

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/recetas', [AdminController::class, 'recetas'])->name('admin.recetas');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/mensajes', [MessagesController::class, 'index'])->name('admin.mensajes');
    Route::get('/admin/pedidos', [AdminController::class, 'pedidos'])->name('admin.pedidos');
    Route::put('/admin/pedidos/{pedido}', [AdminController::class, 'actualizarPedido'])->name('admin.pedidos.update');
    Route::get('/admin/ranking', [AdminController::class, 'ranking'])->name('admin.ranking');

    // Gestión de pasteles
    Route::prefix('/admin/cakes')->group(function () {
        Route::get('/', [AdminCakeController::class, 'index'])->name('admin.cakes.index');
        Route::get('/create', [AdminCakeController::class, 'create'])->name('admin.cakes.create');
        Route::post('/', [AdminCakeController::class, 'store'])->name('admin.cakes.store');
        Route::get('/{cake}/edit', [AdminCakeController::class, 'edit'])->name('admin.cakes.edit');
        Route::put('/{cake}', [AdminCakeController::class, 'update'])->name('admin.cakes.update');
        Route::delete('/{cake}', [AdminCakeController::class, 'destroy'])->name('admin.cakes.destroy');
    });

    // Gestión de usuarios
    Route::prefix('/admin/users')->group(function () {
        Route::get('/', [AdminUserController::class, 'list'])->name('admin.users');
        Route::get('/create', [AdminUserController::class, 'create'])->name('admin.users.create'); 
        Route::post('/', [AdminUserController::class, 'store'])->name('admin.users.store');
        Route::get('/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{user}', [AdminUserController::class, 'update'])->name('admin.users.update'); 
        Route::delete('/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    });

    Route::prefix('/admin/recetas')->group(function () {
        Route::get('/', [RecetaController::class, 'index'])->name('admin.recetas.index');
        Route::get('/create', [RecetaController::class, 'create'])->name('admin.recetas.create');
        Route::post('/', [RecetaController::class, 'store'])->name('admin.recetas.store');
        Route::get('/{receta}/edit', [RecetaController::class, 'edit'])->name('admin.recetas.edit');
        Route::put('/{receta}', [RecetaController::class, 'update'])->name('admin.recetas.update');
        Route::delete('/{receta}', [RecetaController::class, 'destroy'])->name('admin.recetas.destroy');
    });
});

// Rutas protegidas para usuarios autenticados
Route::middleware(['auth', 'user'])->group(function () {
    // Pasteles y carrito
    Route::get('/user/cakes', [CakeUserController::class, 'index'])->name('user.cakes.index');
    Route::post('/user/cakes/add-to-cart/{id}', [CakeUserController::class, 'addToCart'])->name('user.cart.add');    Route::post('/recetas/{receta}/comentarios', [UserController::class, 'storeComentario'])->name('comentarios.store');
    // Carrito de compras
    Route::prefix('/user/cart')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('user.cart.index');
        Route::post('/add/{bookId}', [CartController::class, 'addToCart'])->name('user.cart.add');
        Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('user.cart.remove');
        Route::post('/clear', [CartController::class, 'clearCart'])->name('user.cart.clear');
    });

    Route::get('/recetas', [UserController::class, 'recetas'])->name('user.recetas.index');
    Route::post('/recetas/{receta}/comentarios', [UserController::class, 'storeComentario'])->name('comentarios.store');
    Route::post('/recetas/{receta}/calificaciones', [UserController::class, 'storeCalificacion'])->name('calificaciones.store');

    // Checkout y mensajes
    Route::post('/user/checkout', [OrderController::class, 'checkout'])->name('user.checkout');
    Route::post('/user/send-message', [MessagesController::class, 'store'])->name('user.send');


    // Otras rutas de usuario
    Route::get('/user/messages', [UserController::class, 'messages'])->name('user.messages');
    Route::get('/user/about', [UserController::class, 'about'])->name('user.about');
});

// Rutas protegidas para el editor
Route::middleware(['auth', 'checkrole:editor'])->group(function () {
    Route::get('/editor/dashboard', [EditorController::class, 'dashboard'])->name('editor.dashboard');
    Route::get('/editor/mensajes', [EditorController::class, 'mensajes'])->name('editor.mensajes');
    
    // Acciones de moderación
    Route::patch('/editor/mensajes/{message}/approve', [EditorController::class, 'approve'])->name('editor.mensajes.approve');
    Route::patch('/editor/mensajes/{message}/reject', [EditorController::class, 'reject'])->name('editor.mensajes.reject');
    Route::patch('/editor/mensajes/{message}/restore', [EditorController::class, 'restore'])->name('editor.mensajes.restore');
    Route::delete('/editor/mensajes/{message}', [EditorController::class, 'destroy'])->name('editor.mensajes.destroy');
});