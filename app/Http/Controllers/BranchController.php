<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('branch.index', compact('branches'));
    }

    public function create()
    {
        return view('branch.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        Branch::create($request->all());
        return redirect()->route('branches.index')->with('success', 'Sucursal creada correctamente.');
    }

    public function show(Branch $branch)
    {
        return view('branches.show', compact('branch'));
    }

    public function edit(Branch $branch)
    {
        return view('branch.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $branch->update($request->all());
        return redirect()->route('branches.index')->with('success', 'Sucursal actualizada correctamente.');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')->with('success', 'Sucursal eliminada correctamente.');
    }
}
