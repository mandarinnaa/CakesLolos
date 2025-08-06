<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cake;
use Illuminate\Http\Request;

class CakeUserController extends Controller
{
    public function index()
    {
        $cakes = Cake::all(); 
        return view('user.cakes.index', compact('cakes')); 
    }

    public function addToCart(Request $request, $id)
    {
        $cake = Cake::find($id); 

        if ($cake) {
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity']++; 
            } else {
                $cart[$id] = [
                    'name' => $cake->name,
                    'price' => $cake->price,
                    'quantity' => 1,
                    'image' => $cake->image, 
                ];
            }

            session()->put('cart', $cart); 
            return redirect()->route('user.pasteles')->with('success', 'Pastel agregado al carrito!');
        }

        return redirect()->route('user.pasteles')->with('error', 'Libro no encontrado');
    }
}
