<?php

namespace App\Http\Controllers;

use App\Models\OrderPizza;
use Illuminate\Http\Request;

class OrderPizzaController extends Controller
{
    public function index()
    {
        $orderPizzas = OrderPizza::all();
        return response()->json($orderPizzas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'pizza_id' => 'required|exists:pizzas,id',
            'pizza_size_id' => 'required|exists:pizza_sizes,id',
        ]);

        $orderPizza = OrderPizza::create($request->all());
        return response()->json($orderPizza, 201);
    }

    public function show($id)
    {
        $orderPizza = OrderPizza::find($id);
        if ($orderPizza) {
            return response()->json($orderPizza);
        }

        return response()->json(['message' => 'Order Pizza not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $orderPizza = OrderPizza::find($id);
        if (!$orderPizza) {
            return response()->json(['message' => 'Order Pizza not found'], 404);
        }

        $orderPizza->update($request->all());
        return response()->json($orderPizza);
    }

    public function destroy($id)
    {
        $orderPizza = OrderPizza::find($id);
        if (!$orderPizza) {
            return response()->json(['message' => 'Order Pizza not found'], 404);
        }

        $orderPizza->delete();
        return response()->json(['message' => 'Order Pizza deleted successfully']);
    }
}
