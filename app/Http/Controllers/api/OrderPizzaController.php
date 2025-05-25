<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\OrderPizza;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderPizzaController extends Controller
{
    public function index()
    {
        return response()->json(OrderPizza::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'pizza_id' => 'required|exists:pizzas,id',
            'pizza_size_id' => 'required|exists:pizza_sizes,id',
            'quantity' => 'required|integer|min:1', // Si usas cantidad
        ]);

        $orderPizza = OrderPizza::create($validated);
        return response()->json($orderPizza, 201);
    }

    public function show($id)
    {
        $orderPizza = OrderPizza::find($id);

        if (!$orderPizza) {
            return response()->json(['message' => 'Order Pizza not found'], 404);
        }

        return response()->json($orderPizza, 200);
    }

    public function update(Request $request, $id)
    {
        $orderPizza = OrderPizza::find($id);

        if (!$orderPizza) {
            return response()->json(['message' => 'Order Pizza not found'], 404);
        }

        $validated = $request->validate([
            'order_id' => 'sometimes|required|exists:orders,id',
            'pizza_id' => 'sometimes|required|exists:pizzas,id',
            'pizza_size_id' => 'sometimes|required|exists:pizza_sizes,id',
            'quantity' => 'sometimes|required|integer|min:1',
        ]);

        $orderPizza->update($validated);

        return response()->json($orderPizza, 200);
    }

    public function destroy($id)
    {
        $orderPizza = OrderPizza::find($id);

        if (!$orderPizza) {
            return response()->json(['message' => 'Order Pizza not found'], 404);
        }

        $orderPizza->delete();

        return response()->json(['message' => 'Order Pizza deleted successfully'], 200);
    }
}