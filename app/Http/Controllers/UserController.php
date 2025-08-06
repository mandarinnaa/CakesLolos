<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cake;
use App\Models\Calificacion;
use App\Models\Cart;
use App\Models\Comentario;
use App\Models\Delivery;
use App\Models\Message;
use App\Models\Order;
use App\Models\Receta;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function cakes()
    {
        $cakes  = Cake::all();
        return view('user.index', compact('cakes'));
    }

    public function recetas()
    {
        $recetas = Receta::with(['comentarios.user', 'comentarios.calificacion' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->get();
    
        return view('user.recetas.index', compact('recetas'));
    }

    public function storeComentario(Request $request, Receta $receta)
    {
        $request->validate([
            'comentario' => 'required|string|max:500',
            'estrellas' => 'required|integer|min:1|max:5',
        ]);

        // Guardar el comentario
        $comentario = new Comentario([
            'user_id' => Auth::id(),
            'receta_id' => $receta->id,
            'comentario' => $request->comentario,
        ]);
        $comentario->save();

        // Guardar la calificación
        $calificacion = new Calificacion([
            'user_id' => Auth::id(),
            'receta_id' => $receta->id,
            'comentario_id' => $comentario->id,
            'estrellas' => $request->estrellas,
        ]);
        $calificacion->save();

        return redirect()->back()->with('success', 'Comentario y calificación agregados correctamente.');
    }


    public function storeCalificacion(Request $request, Receta $receta)
    {
        $request->validate([
            'estrellas' => 'required|integer|min:1|max:5',
        ]);

        $calificacion = new Calificacion([
            'user_id' => Auth::id(),
            'receta_id' => $receta->id,
            'estrellas' => $request->estrellas,

        ]);
        $calificacion->save();

        return redirect()->back()->with('success', 'Calificación agregada correctamente.');
    }


    public function about()
    {
        return view('user.about');
    }

    public function messages()
    {
        return view('user.messages');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $user = Auth::user();
        $message = new Message([
            'user_id' => $user->id,
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);
        $message->save();

        return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
    }

    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('admin.users.create');
    }

    // Método para guardar un nuevo usuario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,user,editor',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.users')->with('success', 'Usuario creado exitosamente.');
    }
}
