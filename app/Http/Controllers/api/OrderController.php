<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Client;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\PizzaSize;
use App\Models\ExtraIngredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['client.user', 'branch', 'deliveryPerson', 'pizzas.pizza', 'extraIngredients'])->get();
        return response()->json($orders, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'branch_id' => 'required|exists:branches,id',
            'delivery_type' => 'required|in:en_local,a_domicilio',
            'delivery_person_id' => 'nullable|exists:employees,id',
            'pizzas' => 'required|array',
            'pizzas.*.id' => 'required|exists:pizza_size,id',
            'pizzas.*.quantity' => 'required|integer|min:1',
            'extra_ingredients' => 'nullable|array',
            'extra_ingredients.*.id' => 'required|exists:extra_ingredients,id',
            'extra_ingredients.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'client_id' => $validated['client_id'],
            'branch_id' => $validated['branch_id'],
            'delivery_type' => $validated['delivery_type'],
            'delivery_person_id' => $validated['delivery_person_id'] ?? null,
            'status' => 'pendiente',
            'total_price' => 0,
        ]);

        $total = 0;

        foreach ($validated['pizzas'] as $pizza) {
            $pizzaSize = PizzaSize::find($pizza['id']);
            $order->pizzas()->attach($pizzaSize->id, ['quantity' => $pizza['quantity']]);
            $total += $pizzaSize->price * $pizza['quantity'];
        }

        if (!empty($validated['extra_ingredients'])) {
            foreach ($validated['extra_ingredients'] as $extra) {
                $extraIngredient = ExtraIngredient::find($extra['id']);
                $order->extraIngredients()->attach($extraIngredient->id, ['quantity' => $extra['quantity']]);
                $total += $extraIngredient->price * $extra['quantity'];
            }
        }

        $order->update(['total_price' => $total]);

        return response()->json($order->load(['pizzas', 'extraIngredients']), 201);
    }

    public function show(Order $order)
    {
        $order->load(['client.user', 'branch', 'deliveryPerson', 'pizzas.pizza', 'extraIngredients']);
        return response()->json($order, 200);
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'branch_id' => 'required|exists:branches,id',
            'delivery_type' => 'required|in:en_local,a_domicilio',
            'delivery_person_id' => 'nullable|exists:employees,id',
            'status' => 'required|in:pendiente,en_preparacion,listo,entregado',
            'pizzas' => 'required|array',
            'pizzas.*.id' => 'required|exists:pizza_size,id',
            'pizzas.*.quantity' => 'required|integer|min:1',
            'extra_ingredients' => 'nullable|array',
            'extra_ingredients.*.id' => 'required|exists:extra_ingredients,id',
            'extra_ingredients.*.quantity' => 'required|integer|min:1',
        ]);

        $order->update([
            'client_id' => $validated['client_id'],
            'branch_id' => $validated['branch_id'],
            'delivery_type' => $validated['delivery_type'],
            'delivery_person_id' => $validated['delivery_person_id'] ?? null,
            'status' => $validated['status'],
        ]);

        $order->pizzas()->detach();
        $order->extraIngredients()->detach();

        $total = 0;

        foreach ($validated['pizzas'] as $pizza) {
            $pizzaSize = PizzaSize::find($pizza['id']);
            $order->pizzas()->attach($pizzaSize->id, ['quantity' => $pizza['quantity']]);
            $total += $pizzaSize->price * $pizza['quantity'];
        }

        if (!empty($validated['extra_ingredients'])) {
            foreach ($validated['extra_ingredients'] as $extra) {
                $extraIngredient = ExtraIngredient::find($extra['id']);
                $order->extraIngredients()->attach($extraIngredient->id, ['quantity' => $extra['quantity']]);
                $total += $extraIngredient->price * $extra['quantity'];
            }
        }

        $order->update(['total_price' => $total]);

        return response()->json($order->load(['pizzas', 'extraIngredients']), 200);
    }

    public function destroy(Order $order)
    {
        $order->pizzas()->detach();
        $order->extraIngredients()->detach();
        $order->delete();

        return response()->json(null, 204);
    }
}