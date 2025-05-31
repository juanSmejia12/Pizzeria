<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\RawMaterial;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    public function index()
    {
        $rawMaterials = RawMaterial::all();
        return response()->json($rawMaterials);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'price_per_unit' => 'required|numeric|min:0.01',
        ]);

        $rawMaterial = RawMaterial::create($validated);
        return response()->json($rawMaterial, 201);
    }

    public function show($id)
    {
        $rawMaterial = RawMaterial::find($id);

        if (!$rawMaterial) {
            return response()->json(['message' => 'Materia prima no encontrada'], 404);
        }

        return response()->json($rawMaterial);
    }

    public function update(Request $request, $id)
    {
        $rawMaterial = RawMaterial::find($id);

        if (!$rawMaterial) {
            return response()->json(['message' => 'Materia prima no encontrada'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'price_per_unit' => 'required|numeric|min:0.01',
        ]);

        $rawMaterial->update($validated);

        return response()->json($rawMaterial);
    }

    public function destroy($id)
    {
        $rawMaterial = RawMaterial::find($id);

        if (!$rawMaterial) {
            return response()->json(['message' => 'Materia prima no encontrada'], 404);
        }

        $rawMaterial->delete();

        return response()->json(['message' => 'Materia prima eliminada correctamente']);
    }
}