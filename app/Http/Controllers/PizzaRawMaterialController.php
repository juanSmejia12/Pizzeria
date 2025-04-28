<?php

namespace App\Http\Controllers;

use App\Models\PizzaRawMaterial;
use Illuminate\Http\Request;

class PizzaRawMaterialController extends Controller
{
    public function index()
    {
        $pizzaRawMaterials = PizzaRawMaterial::all();
        return response()->json($pizzaRawMaterials);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric',
        ]);

        $pizzaRawMaterial = PizzaRawMaterial::create($request->all());
        return response()->json($pizzaRawMaterial, 201);
    }

    public function show($id)
    {
        $pizzaRawMaterial = PizzaRawMaterial::find($id);
        if ($pizzaRawMaterial) {
            return response()->json($pizzaRawMaterial);
        }

        return response()->json(['message' => 'Pizza Raw Material not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $pizzaRawMaterial = PizzaRawMaterial::find($id);
        if (!$pizzaRawMaterial) {
            return response()->json(['message' => 'Pizza Raw Material not found'], 404);
        }

        $pizzaRawMaterial->update($request->all());
        return response()->json($pizzaRawMaterial);
    }

    public function destroy($id)
    {
        $pizzaRawMaterial = PizzaRawMaterial::find($id);
        if (!$pizzaRawMaterial) {
            return response()->json(['message' => 'Pizza Raw Material not found'], 404);
        }

        $pizzaRawMaterial->delete();
        return response()->json(['message' => 'Pizza Raw Material deleted successfully']);
    }
}
