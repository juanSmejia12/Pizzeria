<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
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
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'price_per_unit' => 'required|numeric',
        ]);

        $rawMaterial = RawMaterial::create($request->all());
        return response()->json($rawMaterial, 201);
    }

    public function show($id)
    {
        $rawMaterial = RawMaterial::find($id);
        if ($rawMaterial) {
            return response()->json($rawMaterial);
        }

        return response()->json(['message' => 'Raw Material not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $rawMaterial = RawMaterial::find($id);
        if (!$rawMaterial) {
            return response()->json(['message' => 'Raw Material not found'], 404);
        }

        $rawMaterial->update($request->all());
        return response()->json($rawMaterial);
    }

    public function destroy($id)
    {
        $rawMaterial = RawMaterial::find($id);
        if (!$rawMaterial) {
            return response()->json(['message' => 'Raw Material not found'], 404);
        }

        $rawMaterial->delete();
        return response()->json(['message' => 'Raw Material deleted successfully']);
    }
}
