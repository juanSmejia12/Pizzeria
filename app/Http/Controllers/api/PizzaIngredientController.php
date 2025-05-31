<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PizzaIngredient;
use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PizzaIngredientController extends Controller
{
    public function index()
    {
        return response()->json(PizzaIngredient::with(['pizza', 'ingredient'])->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        $exists = PizzaIngredient::where('pizza_id', $request->pizza_id)
                                 ->where('ingredient_id', $request->ingredient_id)
                                 ->exists();

        if ($exists) {
            return response()->json(['message' => 'Esta combinación ya existe.'], 409);
        }

        $pizzaIngredient = PizzaIngredient::create($request->all());
        return response()->json($pizzaIngredient, 201);
    }

    public function show($id)
    {
        $pizzaIngredient = PizzaIngredient::with(['pizza', 'ingredient'])->find($id);

        if (!$pizzaIngredient) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json($pizzaIngredient, 200);
    }

    public function update(Request $request, $id)
    {
        $pizzaIngredient = PizzaIngredient::find($id);

        if (!$pizzaIngredient) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        $pizzaIngredient->update($request->all());
        return response()->json($pizzaIngredient, 200);
    }

public function destroy($id)
{
    $pizzaIngredient = PizzaIngredient::find($id);

    if (!$pizzaIngredient) {
        return response()->json([
            'success' => false,
            'message' => 'No encontrado'
        ], 404);
    }

    $pizzaIngredient->delete();

    $updatedList = PizzaIngredient::with(['pizza', 'ingredient'])->get();

    return response()->json([
        'success' => true,
        'message' => 'Eliminado correctamente',
        'pizza_ingredients' => $updatedList
    ], 200);
}

}