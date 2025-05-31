<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with(['supplier', 'rawMaterial'])->get();
        return response()->json($purchases);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:0.01',
            'purchase_date' => 'required|date',
        ]);

        $purchase = Purchase::create($validated);

        return response()->json($purchase, 201);
    }

    public function show($id)
    {
        $purchase = Purchase::with(['supplier', 'rawMaterial'])->find($id);

        if (!$purchase) {
            return response()->json(['message' => 'Compra no encontrada'], 404);
        }

        return response()->json($purchase);
    }

    public function update(Request $request, $id)
    {
        $purchase = Purchase::find($id);

        if (!$purchase) {
            return response()->json(['message' => 'Compra no encontrada'], 404);
        }

        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:0.01',
            'purchase_date' => 'required|date',
        ]);

        $purchase->update($validated);

        return response()->json($purchase);
    }

    public function destroy($id)
    {
        $purchase = Purchase::find($id);

        if (!$purchase) {
            return response()->json(['message' => 'Compra no encontrada'], 404);
        }

        $purchase->delete();

        return response()->json(['message' => 'Compra eliminada correctamente']);
    }
}
