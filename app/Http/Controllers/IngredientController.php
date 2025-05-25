<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredient.index', compact('ingredients')); 
    }

    public function create()
    {
        return view('ingredient.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        Ingredient::create($request->all());
        return redirect()->route('ingredients.index')->with('success', 'Ingrediente creado correctamente');
    }

    public function show($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredient.show', compact('ingredient')); 
    }

    public function edit($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredient.edit', compact('ingredient')); 
    }

    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $ingredient->update($request->all());
        return redirect()->route('ingredients.index')->with('success', 'Ingrediente actualizado correctamente');
    }

    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return redirect()->route('ingredients.index')->with('success', 'Ingrediente eliminado correctamente');
    }
}
