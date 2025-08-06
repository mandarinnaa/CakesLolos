<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    // Mostrar el carrito del usuario
    public function index()
    {
        $user = Auth::user();
        $carts = $user->carts()->with('cake')->get();
        $total = $carts->sum(function ($item) {
            return $item->cake->price * $item->quantity;
        });

        return view('user.cart.index', compact('carts', 'total'));
    }

    // Vaciar el carrito
    public function clearCart(Request $request)
    {
        try {
            $user = Auth::user();
            $user->carts()->delete(); // Eliminar todos los items del carrito

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error al limpiar el carrito: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Hubo un error al limpiar el carrito.'], 500);
        }
    }

    public function addToCart(Request $request, $cakeId)
    {
        $cake = Cake::findOrFail($cakeId);
        $user = Auth::user();

        if (!$cake->hasStock(1)) {
            return response()->json([
                'success' => false,
                'message' => 'No hay suficiente stock disponible para este pastel.',
            ], 400);
        }

        $cartItem = $user->carts()->where('cake_id', $cake->id)->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $cartItem->quantity + 1]);
        } else {
            $user->carts()->create([
                'cake_id' => $cakeId,
                'quantity' => 1,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Pastel agregado al carrito correctamente.',
        ]);
    
        return response()->json([
            'success' => false,
            'message' => 'No se pudo agregar el pastel al carrito.',
        ], 400);

        return redirect()->back()->with('success', 'Pastel agregado al carrito.');
    }

    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Pastel eliminado del carrito.');
    }
}