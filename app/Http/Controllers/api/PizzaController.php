<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pizza;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index()
    {
        return response()->json(Pizza::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pizza = Pizza::create($validated);

        return response()->json($pizza, 201);
    }

    public function show($id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json(['message' => 'Pizza not found'], 404);
        }

        return response()->json($pizza, 200);
    }

    public function update(Request $request, $id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json(['message' => 'Pizza not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pizza->update($validated);

        return response()->json($pizza, 200);
    }

    public function destroy($id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json(['message' => 'Pizza not found'], 404);
        }

        $pizza->delete();

        return response()->json(['message' => 'Pizza deleted successfully'], 200);
    }
}