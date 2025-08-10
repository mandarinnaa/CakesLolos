<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cake;
use Illuminate\Http\Request;

class CakeController extends Controller
{
    public function index()
    {
        $cakes = Cake::all();
        return view('admin.cakes.index', compact('cakes'));
    }

    public function create()
    {
        return view('admin.cakes.create');
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0', 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('cakes');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $imagePath = 'cakes/' . $filename;
        } else {
            $imagePath = null;
        }

        Cake::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock, 
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.cakes.index')->with('success', 'Pastel creado correctamente.');
    }

    public function update(Request $request, Cake $cake)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Eliminar imagen antigua si existe
            if ($cake->image && file_exists(public_path($cake->image))) {
                unlink(public_path($cake->image));
            }

            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('cakes');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $cake->image = 'cakes/' . $filename;
        }

        $cake->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $cake->image,
        ]);

        return redirect()->route('admin.cakes.index')->with('success', 'Pastel actualizado correctamente.');
    }

    public function edit(Cake $cake)
    {
        return view('admin.cakes.edit', compact('cake'));
    }

    public function destroy(Cake $cake)
    {
        if ($cake->orders()->count() > 0) {
            return redirect()->back()
                ->with('error', 'No se puede eliminar el pastel porque tiene órdenes asociadas.');
        }

        if ($cake->image && file_exists(public_path($cake->image))) {
            unlink(public_path($cake->image));
        }

        $cake->delete();

        return redirect()->route('admin.cakes.index')->with('success', 'Pastel eliminado correctamente.');
    }
}
