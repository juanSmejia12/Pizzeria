<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'total_price' => 'required|numeric',
            'status' => 'required|string|in:pendiente,en_proceso,entregado',
        ]);

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function show($id)
    {
        $order = Order::find($id);
        if ($order) {
            return response()->json($order);
        }

        return response()->json(['message' => 'Order not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->update($request->all());
        return response()->json($order);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }
}
