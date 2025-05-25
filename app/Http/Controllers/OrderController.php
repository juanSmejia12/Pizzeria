<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\PizzaSize;
use App\Models\ExtraIngredient;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['client.user', 'branch', 'deliveryPerson'])->get();
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::with('user')->get();
        $branches = Branch::all();
        $employees = Employee::all();
        $pizzaSizes = PizzaSize::with('pizza')->get();
        $extraIngredients = ExtraIngredient::all();

        return view('order.create', compact('clients', 'branches', 'employees', 'pizzaSizes', 'extraIngredients'));
    }

    public function store(Request $request)
    {
        $request->validate([
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
            'client_id' => $request->client_id,
            'branch_id' => $request->branch_id,
            'total_price' => 0, 
            'status' => 'pendiente',
            'delivery_type' => $request->delivery_type,
            'delivery_person_id' => $request->delivery_person_id,
        ]);

        $total = 0;

        foreach ($request->pizzas as $pizza) {
            $pizzaSize = PizzaSize::find($pizza['id']);
            $quantity = $pizza['quantity'];
            $order->pizzas()->attach($pizzaSize->id, ['quantity' => $quantity]);
            $total += $pizzaSize->price * $quantity;
        }

        if ($request->has('extra_ingredients')) {
            foreach ($request->extra_ingredients as $extra) {
                $extraIngredient = ExtraIngredient::find($extra['id']);
                $quantity = $extra['quantity'];
                $order->extraIngredients()->attach($extraIngredient->id, ['quantity' => $quantity]);
                $total += $extraIngredient->price * $quantity;
            }
        }

        $order->update(['total_price' => $total]);

        return redirect()->route('orders.index')->with('success', 'Pedido creado correctamente.');
    }

    public function show(Order $order)
    {
        $order->load(['client.user', 'branch', 'deliveryPerson', 'pizzas.pizza', 'extraIngredients']);
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $clients = Client::with('user')->get();
        $branches = Branch::all();
        $employees = Employee::all();
        $pizzaSizes = PizzaSize::with('pizza')->get();
        $extraIngredients = ExtraIngredient::all();

        $order->load(['pizzas', 'extraIngredients']);

        return view('orders.edit', compact('order', 'clients', 'branches', 'employees', 'pizzaSizes', 'extraIngredients'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
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
            'client_id' => $request->client_id,
            'branch_id' => $request->branch_id,
            'delivery_type' => $request->delivery_type,
            'delivery_person_id' => $request->delivery_person_id,
            'status' => $request->status,
        ]);

        $order->pizzas()->detach();
        $order->extraIngredients()->detach();

        $total = 0;

        foreach ($request->pizzas as $pizza) {
            $pizzaSize = PizzaSize::find($pizza['id']);
            $quantity = $pizza['quantity'];
            $order->pizzas()->attach($pizzaSize->id, ['quantity' => $quantity]);
            $total += $pizzaSize->price * $quantity;
        }

        if ($request->has('extra_ingredients')) {
            foreach ($request->extra_ingredients as $extra) {
                $extraIngredient = ExtraIngredient::find($extra['id']);
                $quantity = $extra['quantity'];
                $order->extraIngredients()->attach($extraIngredient->id, ['quantity' => $quantity]);
                $total += $extraIngredient->price * $quantity;
            }
        }

        $order->update(['total_price' => $total]);

        return redirect()->route('orders.index')->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy(Order $order)
    {
        $order->pizzas()->detach();
        $order->extraIngredients()->detach();
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Pedido eliminado correctamente.');
    }
}
