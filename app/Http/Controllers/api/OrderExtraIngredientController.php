<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\OrderExtraIngredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderExtraIngredientController extends Controller
{
    public function index()
    {
        return response()->json(OrderExtraIngredient::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
            'quantity' => 'required|integer|min:1', // Agregado si lo manejas en la tabla pivot
        ]);

        $orderExtraIngredient = OrderExtraIngredient::create($validated);

        return response()->json($orderExtraIngredient, 201);
    }

    public function show($id)
    {
        $item = OrderExtraIngredient::find($id);

        if (!$item) {
            return response()->json(['message' => 'Order Extra Ingredient not found'], 404);
        }

        return response()->json($item, 200);
    }

    public function update(Request $request, $id)
    {
        $item = OrderExtraIngredient::find($id);

        if (!$item) {
            return response()->json(['message' => 'Order Extra Ingredient not found'], 404);
        }

        $validated = $request->validate([
            'order_id' => 'sometimes|required|exists:orders,id',
            'extra_ingredient_id' => 'sometimes|required|exists:extra_ingredients,id',
            'quantity' => 'sometimes|required|integer|min:1',
        ]);

        $item->update($validated);

        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        $item = OrderExtraIngredient::find($id);

        if (!$item) {
            return response()->json(['message' => 'Order Extra Ingredient not found'], 404);
        }

        $item->delete();

        return response()->json(['message' => 'Order Extra Ingredient deleted successfully'], 200);
    }
}