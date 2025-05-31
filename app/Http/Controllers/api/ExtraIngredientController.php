<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ExtraIngredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExtraIngredientController extends Controller
{
    public function index()
    {
        return response()->json(ExtraIngredient::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $extraIngredient = ExtraIngredient::create($validated);

        return response()->json($extraIngredient, 201); // 201: Created
    }

    public function show($id)
    {
        $extraIngredient = ExtraIngredient::find($id);

        if (!$extraIngredient) {
            return response()->json(['message' => 'Extra Ingredient not found'], 404);
        }

        return response()->json($extraIngredient, 200);
    }

    public function update(Request $request, $id)
    {
        $extraIngredient = ExtraIngredient::find($id);

        if (!$extraIngredient) {
            return response()->json(['message' => 'Extra Ingredient not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
        ]);

        $extraIngredient->update($validated);

        return response()->json($extraIngredient, 200);
    }

    public function destroy($id)
    {
        $extraIngredient = ExtraIngredient::find($id);

        if (!$extraIngredient) {
            return response()->json(['message' => 'Extra Ingredient not found'], 404);
        }

        $extraIngredient->delete();

        return response()->json(null, 204); // 204: No Content
    }
}