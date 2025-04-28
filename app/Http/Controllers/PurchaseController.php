<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::all();
        return response()->json($purchases);
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        $purchase = Purchase::create($request->all());
        return response()->json($purchase, 201);
    }

    public function show($id)
    {
        $purchase = Purchase::find($id);
        if ($purchase) {
            return response()->json($purchase);
        }

        return response()->json(['message' => 'Purchase not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $purchase = Purchase::find($id);
        if (!$purchase) {
            return response()->json(['message' => 'Purchase not found'], 404);
        }

        $purchase->update($request->all());
        return response()->json($purchase);
    }

    public function destroy($id)
    {
        $purchase = Purchase::find($id);
        if (!$purchase) {
            return response()->json(['message' => 'Purchase not found'], 404);
        }

        $purchase->delete();
        return response()->json(['message' => 'Purchase deleted successfully']);
    }
}
