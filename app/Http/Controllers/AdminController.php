<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cake;
use App\Models\Calificacion;
use App\Models\Message;
use App\Models\Order;
use App\Models\Recetas;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  


    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function mensajes()
    {
        $messages = Message::with('user')->latest()->get(); 
        return view('admin.mensajes', compact('messages'));
    }
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,admin,editor,repartidor',
        ]);

        $user->update(['role' => $request->role]);

        return back()->with('success', 'Rol actualizado correctamente.');
    }


    public function pasteles()
    {
        $pasteles = Cake::latest()->get();
        return view('admin.pasteles', compact('pasteles'));
    }

    public function pedidos()
    {
        $pedidos = Order::with('user')->latest()->get();
        return view('admin.pedidos', compact('pedidos'));
    }

    public function cakes()
    {
        $cakes = Cake::latest()->get(); 
        return view('admin.cakes.index', compact('cakes')); 
    }

    public function ranking()
{
    $calificaciones = Calificacion::with(['receta', 'user'])->get();
    return view('admin.ranking', compact('calificaciones'));
}
    
}
