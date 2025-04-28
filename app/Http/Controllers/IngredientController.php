<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return response()->json($ingredients);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $ingredient = Ingredient::create($request->all());
        return response()->json($ingredient, 201);
    }

    public function show($id)
    {
        $ingredient = Ingredient::find($id);
        if ($ingredient) {
            return response()->json($ingredient);
        }

        return response()->json(['message' => 'Ingredient not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::find($id);
        if (!$ingredient) {
            return response()->json(['message' => 'Ingredient not found'], 404);
        }

        $ingredient->update($request->all());
        return response()->json($ingredient);
    }

    public function destroy($id)
    {
        $ingredient = Ingredient::find($id);
        if (!$ingredient) {
            return response()->json(['message' => 'Ingredient not found'], 404);
        }

        $ingredient->delete();
        return response()->json(['message' => 'Ingredient deleted successfully']);
    }
}
