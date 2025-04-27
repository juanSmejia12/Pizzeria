<?php

namespace App\Http\Controllers;

use App\Models\ExtraIngredient;
use Illuminate\Http\Request;

class ExtraIngredientController extends Controller
{
    public function index()
    {
        $extraIngredients = ExtraIngredient::all();
        return response()->json($extraIngredients);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $extraIngredient = ExtraIngredient::create($request->all());
        return response()->json($extraIngredient, 201);
    }

    public function show($id)
    {
        $extraIngredient = ExtraIngredient::find($id);
        if ($extraIngredient) {
            return response()->json($extraIngredient);
        }

        return response()->json(['message' => 'Extra Ingredient not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $extraIngredient = ExtraIngredient::find($id);
        if (!$extraIngredient) {
            return response()->json(['message' => 'Extra Ingredient not found'], 404);
        }

        $extraIngredient->update($request->all());
        return response()->json($extraIngredient);
    }

    public function destroy($id)
    {
        $extraIngredient = ExtraIngredient::find($id);
        if (!$extraIngredient) {
            return response()->json(['message' => 'Extra Ingredient not found'], 404);
        }

        $extraIngredient->delete();
        return response()->json(['message' => 'Extra Ingredient deleted successfully']);
    }
}
