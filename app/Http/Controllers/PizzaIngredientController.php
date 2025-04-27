<?php

namespace App\Http\Controllers;

use App\Models\PizzaIngredient;
use Illuminate\Http\Request;

class PizzaIngredientController extends Controller
{
    public function index()
    {
        $pizzaIngredients = PizzaIngredient::all();
        return response()->json($pizzaIngredients);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        $pizzaIngredient = PizzaIngredient::create($request->all());
        return response()->json($pizzaIngredient, 201);
    }

    public function show($id)
    {
        $pizzaIngredient = PizzaIngredient::find($id);
        if ($pizzaIngredient) {
            return response()->json($pizzaIngredient);
        }

        return response()->json(['message' => 'Pizza Ingredient not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $pizzaIngredient = PizzaIngredient::find($id);
        if (!$pizzaIngredient) {
            return response()->json(['message' => 'Pizza Ingredient not found'], 404);
        }

        $pizzaIngredient->update($request->all());
        return response()->json($pizzaIngredient);
    }

    public function destroy($id)
    {
        $pizzaIngredient = PizzaIngredient::find($id);
        if (!$pizzaIngredient) {
            return response()->json(['message' => 'Pizza Ingredient not found'], 404);
        }

        $pizzaIngredient->delete();
        return response()->json(['message' => 'Pizza Ingredient deleted successfully']);
    }
}
