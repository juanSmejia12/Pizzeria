<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        return response()->json(Branch::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $branch = Branch::create($validated);
        return response()->json($branch, 201); // 201: Created
    }

    public function show(Branch $branch)
    {
        return response()->json($branch, 200);
    }

    public function update(Request $request, Branch $branch)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $branch->update($validated);
        return response()->json($branch, 200);
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return response()->json(null, 204); // 204: No Content
    }
}