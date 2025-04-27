<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::all();
        return response()->json($pizzas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pizza = Pizza::create($request->all());
        return response()->json($pizza, 201);
    }

    public function show($id)
    {
        $pizza = Pizza::find($id);
        if ($pizza) {
            return response()->json($pizza);
        }

        return response()->json(['message' => 'Pizza not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $pizza = Pizza::find($id);
        if (!$pizza) {
            return response()->json(['message' => 'Pizza not found'], 404);
        }

        $pizza->update($request->all());
        return response()->json($pizza);
    }

    public function destroy($id)
    {
        $pizza = Pizza::find($id);
        if (!$pizza) {
            return response()->json(['message' => 'Pizza not found'], 404);
        }

        $pizza->delete();
        return response()->json(['message' => 'Pizza deleted successfully']);
    }
}
