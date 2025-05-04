<?php

namespace App\Http\Controllers;

use App\Models\PizzaIngredient;
use App\Models\Pizza;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class PizzaIngredientController extends Controller
{
    public function index()
    {
        $pizzaIngredients = PizzaIngredient::with(['pizza', 'ingredient'])->get();
        return view('pizza_ingredient.index', compact('pizzaIngredients'));
    }

    public function create()
    {
        $pizzas = Pizza::all();
        $ingredients = Ingredient::all();
        return view('pizza_ingredient.create', compact('pizzas', 'ingredients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        PizzaIngredient::create($request->all());

        return redirect()->route('pizza_ingredients.index')->with('success', 'Ingrediente agregado a la pizza correctamente.');
    }

    public function edit($id)
    {
        $pizzaIngredient = PizzaIngredient::findOrFail($id);
        $pizzas = Pizza::all();
        $ingredients = Ingredient::all();

        return view('pizza_ingredient.edit', compact('pizzaIngredient', 'pizzas', 'ingredients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        $pizzaIngredient = PizzaIngredient::findOrFail($id);
        $pizzaIngredient->update($request->all());

        return redirect()->route('pizza_ingredients.index')->with('success', 'Ingrediente de pizza actualizado correctamente.');
    }

    public function destroy($id)
    {
        $pizzaIngredient = PizzaIngredient::findOrFail($id);
        $pizzaIngredient->delete();

        return redirect()->route('pizza_ingredients.index')->with('success', 'Ingrediente eliminado de la pizza.');
    }
}
