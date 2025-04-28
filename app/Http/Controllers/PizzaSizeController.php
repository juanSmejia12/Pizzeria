<?php

namespace App\Http\Controllers;

use App\Models\PizzaSize;
use Illuminate\Http\Request;

class PizzaSizeController extends Controller
{
    public function index()
    {
        $sizes = PizzaSize::all();
        return response()->json($sizes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'size' => 'required|string|max:50',
            'price' => 'required|numeric',
        ]);

        $size = PizzaSize::create($request->all());
        return response()->json($size, 201);
    }

    public function show($id)
    {
        $size = PizzaSize::find($id);
        if ($size) {
            return response()->json($size);
        }

        return response()->json(['message' => 'Size not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $size = PizzaSize::find($id);
        if (!$size) {
            return response()->json(['message' => 'Size not found'], 404);
        }

        $size->update($request->all());
        return response()->json($size);
    }

    public function destroy($id)
    {
        $size = PizzaSize::find($id);
        if (!$size) {
            return response()->json(['message' => 'Size not found'], 404);
        }

        $size->delete();
        return response()->json(['message' => 'Size deleted successfully']);
    }
}
