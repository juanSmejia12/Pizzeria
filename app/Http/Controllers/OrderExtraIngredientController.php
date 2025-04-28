<?php

namespace App\Http\Controllers;

use App\Models\OrderExtraIngredient;
use Illuminate\Http\Request;

class OrderExtraIngredientController extends Controller
{
    public function index()
    {
        $orderExtraIngredients = OrderExtraIngredient::all();
        return response()->json($orderExtraIngredients);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
        ]);

        $orderExtraIngredient = OrderExtraIngredient::create($request->all());
        return response()->json($orderExtraIngredient, 201);
    }

    public function show($id)
    {
        $orderExtraIngredient = OrderExtraIngredient::find($id);
        if ($orderExtraIngredient) {
            return response()->json($orderExtraIngredient);
        }

        return response()->json(['message' => 'Order Extra Ingredient not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $orderExtraIngredient = OrderExtraIngredient::find($id);
        if (!$orderExtraIngredient) {
            return response()->json(['message' => 'Order Extra Ingredient not found'], 404);
        }

        $orderExtraIngredient->update($request->all());
        return response()->json($orderExtraIngredient);
    }

    public function destroy($id)
    {
        $orderExtraIngredient = OrderExtraIngredient::find($id);
        if (!$orderExtraIngredient) {
            return response()->json(['message' => 'Order Extra Ingredient not found'], 404);
        }

        $orderExtraIngredient->delete();
        return response()->json(['message' => 'Order Extra Ingredient deleted successfully']);
    }
}
