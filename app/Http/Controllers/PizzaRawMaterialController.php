<?php

namespace App\Http\Controllers;

use App\Models\PizzaRawMaterial;
use App\Models\Pizza;
use App\Models\RawMaterial;
use Illuminate\Http\Request;

class PizzaRawMaterialController extends Controller
{
    public function index()
    {
        $pizzaRawMaterials = PizzaRawMaterial::with(['pizza', 'rawMaterial'])->get();
        return view('pizza_raw_material.index', compact('pizzaRawMaterials'));
    }

    public function create()
    {
        $pizzas = Pizza::all();
        $rawMaterials = RawMaterial::all();
        return view('pizza_raw_material.create', compact('pizzas', 'rawMaterials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:0.01',
        ]);

        PizzaRawMaterial::create($request->all());

        return redirect()->route('pizza_raw_materials.index')->with('success', 'Materia prima asignada correctamente a la pizza.');
    }

    public function edit($id)
    {
        $pizzaRawMaterial = PizzaRawMaterial::findOrFail($id);
        $pizzas = Pizza::all();
        $rawMaterials = RawMaterial::all();

        return view('pizza_raw_material.edit', compact('pizzaRawMaterial', 'pizzas', 'rawMaterials'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:0.01',
        ]);

        $pizzaRawMaterial = PizzaRawMaterial::findOrFail($id);
        $pizzaRawMaterial->update($request->all());

        return redirect()->route('pizza_raw_materials.index')->with('success', 'Asignación actualizada correctamente.');
    }

    public function destroy($id)
    {
        $pizzaRawMaterial = PizzaRawMaterial::findOrFail($id);
        $pizzaRawMaterial->delete();

        return redirect()->route('pizza_raw_materials.index')->with('success', 'Materia prima eliminada de la pizza.');
    }
}
