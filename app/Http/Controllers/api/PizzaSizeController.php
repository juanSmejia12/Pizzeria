<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PizzaSize;
use App\Models\Pizza;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PizzaSizeController extends Controller
{
    public function index()
    {
        $pizzaSizes = PizzaSize::with('pizza')->get();
        return response()->json($pizzaSizes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0',
        ]);

        $pizzaSize = PizzaSize::create($request->all());

        return response()->json($pizzaSize, 201);
    }

    public function show($id)
    {
        $pizzaSize = PizzaSize::with('pizza')->find($id);

        if (!$pizzaSize) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json($pizzaSize);
    }

    public function update(Request $request, $id)
    {
        $pizzaSize = PizzaSize::find($id);

        if (!$pizzaSize) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0',
        ]);

        $pizzaSize->update($request->all());

        return response()->json($pizzaSize);
    }

    public function destroy($id)
    {
        $pizzaSize = PizzaSize::find($id);

        if (!$pizzaSize) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $pizzaSize->delete();

        return response()->json(['message' => 'Tamaño de pizza eliminado correctamente.']);
    }
}