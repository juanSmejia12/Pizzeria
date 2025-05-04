<?php

namespace App\Http\Controllers;

use App\Models\PizzaSize;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaSizeController extends Controller
{
    public function index()
    {
        $pizzaSizes = PizzaSize::with('pizza')->get();
        return view('pizza_size.index', compact('pizzaSizes'));
    }

    public function create()
    {
        $pizzas = Pizza::all();
        return view('pizza_size.create', compact('pizzas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0',
        ]);

        PizzaSize::create($request->all());

        return redirect()->route('pizza_sizes.index')->with('success', 'Tamaño de pizza creado correctamente.');
    }

    public function edit($id)
    {
        $pizzaSize = PizzaSize::findOrFail($id);
        $pizzas = Pizza::all();
        return view('pizza_size.edit', compact('pizzaSize', 'pizzas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0',
        ]);

        $pizzaSize = PizzaSize::findOrFail($id);
        $pizzaSize->update($request->all());

        return redirect()->route('pizza_sizes.index')->with('success', 'Tamaño de pizza actualizado correctamente.');
    }

    public function destroy($id)
    {
        $pizzaSize = PizzaSize::findOrFail($id);
        $pizzaSize->delete();

        return redirect()->route('pizza_sizes.index')->with('success', 'Tamaño de pizza eliminado correctamente.');
    }
}
