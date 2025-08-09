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
    $cake = Cake::findOrFail($id);

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

    if ($request->wantsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Pastel agregado al carrito'
        ]);
    }

    return redirect()->route('user.cakes.index')->with('success', 'Pastel agregado al carrito!');
}
}
