<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Receta;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    public function index()
    {
        $recetas = Receta::all();
        return view('admin.recetas.index', compact('recetas'));
    }

    public function create()
    {
        return view('admin.recetas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tiempo_preparacion' => 'required|string',
            'tiempo_coccion' => 'required|string',
            'porciones' => 'required|string',
            'dificultad' => 'required|string',
            'ingredientes' => 'required|string',
            'instrucciones' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ingredientesArray = $this->parseIngredientes($request->ingredientes);

        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('recetas'), $filename);
            $imagenPath = 'recetas/' . $filename;
        }

        Receta::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'tiempo_preparacion' => $request->tiempo_preparacion,
            'tiempo_coccion' => $request->tiempo_coccion,
            'porciones' => $request->porciones,
            'dificultad' => $request->dificultad,
            'ingredientes' => json_encode($ingredientesArray),
            'instrucciones' => $request->instrucciones,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('admin.recetas.index')->with('success', 'Receta creada exitosamente.');
    }

    public function update(Request $request, Receta $receta)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tiempo_preparacion' => 'required|string',
            'tiempo_coccion' => 'required|string',
            'porciones' => 'required|string',
            'dificultad' => 'required|string',
            'ingredientes' => 'required|string',
            'instrucciones' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ingredientesArray = $this->parseIngredientes($request->ingredientes);

        if ($request->hasFile('imagen')) {
            // Borra la imagen anterior si existe
            if ($receta->imagen && file_exists(public_path($receta->imagen))) {
                unlink(public_path($receta->imagen));
            }

            $file = $request->file('imagen');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('recetas'), $filename);
            $imagenPath = 'recetas/' . $filename;
        } else {
            $imagenPath = $receta->imagen;
        }

        $receta->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'tiempo_preparacion' => $request->tiempo_preparacion,
            'tiempo_coccion' => $request->tiempo_coccion,
            'porciones' => $request->porciones,
            'dificultad' => $request->dificultad,
            'ingredientes' => json_encode($ingredientesArray),
            'instrucciones' => $request->instrucciones,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('admin.recetas.index')->with('success', 'Receta actualizada exitosamente.');
    }

    protected function parseIngredientes($ingredientesText)
    {
        $lineas = explode("\n", $ingredientesText);
        $ingredientes = [];

        foreach ($lineas as $linea) {
            $linea = trim($linea);
            if (!empty($linea)) {
                $ingredientes[] = [
                    'nombre' => $linea,
                    'cantidad' => '',
                    'unidad' => ''
                ];
            }
        }

        return $ingredientes;
    }

    public function edit(Receta $receta)
    {
        return view('admin.recetas.edit', compact('receta'));
    }

    public function destroy(Receta $receta)
    {
        if ($receta->comentarios()->count() > 0 || $receta->calificaciones()->count() > 0) {
            return redirect()->back()
                ->with('error', 'No se puede eliminar la receta porque tiene comentarios o calificaciones asociadas.');
        }

        if ($receta->imagen && file_exists(public_path($receta->imagen))) {
            unlink(public_path($receta->imagen));
        }
        
        $receta->delete();

        return redirect()->route('admin.recetas.index')->with('success', 'Receta eliminada exitosamente.');
    }
}
