<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PizzaRawMaterial;
use App\Models\Pizza;
use App\Models\RawMaterial;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PizzaRawMaterialController extends Controller
{
    public function index()
    {
        $pizzaRawMaterials = PizzaRawMaterial::with(['pizza', 'rawMaterial'])->get();
        return response()->json($pizzaRawMaterials);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:0.01',
        ]);

        // Validar duplicado opcional
        $exists = PizzaRawMaterial::where('pizza_id', $request->pizza_id)
                                  ->where('raw_material_id', $request->raw_material_id)
                                  ->exists();

        if ($exists) {
            return response()->json(['message' => 'Esta materia prima ya está asignada a esta pizza.'], 409);
        }

        $pizzaRawMaterial = PizzaRawMaterial::create($request->all());

        return response()->json($pizzaRawMaterial, 201);
    }

    public function show($id)
    {
        $pizzaRawMaterial = PizzaRawMaterial::with(['pizza', 'rawMaterial'])->find($id);

        if (!$pizzaRawMaterial) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json($pizzaRawMaterial);
    }

    public function update(Request $request, $id)
    {
        $pizzaRawMaterial = PizzaRawMaterial::find($id);

        if (!$pizzaRawMaterial) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:0.01',
        ]);

        $pizzaRawMaterial->update($request->all());

        return response()->json($pizzaRawMaterial);
    }

    public function destroy($id)
    {
        $pizzaRawMaterial = PizzaRawMaterial::find($id);

        if (!$pizzaRawMaterial) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $pizzaRawMaterial->delete();

        return response()->json(['message' => 'Materia prima eliminada correctamente.']);
    }
}