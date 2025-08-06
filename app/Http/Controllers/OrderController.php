<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    // Procesar el checkout (pago)
    public function checkout(Request $request)
    {
        try {
            $user = Auth::user();
            $cartItems = $user->carts()->with('cake')->get();
    
            foreach ($cartItems as $item) {
                if (!$item->cake->hasStock($item->quantity)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'El pastel "'.$item->cake->name.'" no tiene suficiente stock disponible.',
                    ], 400);
                }
            }


            $total = $cartItems->sum(function ($item) {
                return $item->cake->price * $item->quantity;
            });
    
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $total,
                'payment_status' => 'completed',
            ]);
    
            foreach ($cartItems as $cartItem) {
                $order->cakes()->attach($cartItem->cake_id, [
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->cake->price,
                ]);
                $cartItem->cake->decreaseStock($cartItem->quantity);

            }
    
            // Vaciar el carrito
            $user->carts()->delete();
    
            return response()->json(['success' => true, 'message' => 'Pago completado exitosamente.']);
        } catch (\Exception $e) {
            Log::error('Error en el checkout: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Hubo un error al procesar el pago.'], 500);
        }
    }
}