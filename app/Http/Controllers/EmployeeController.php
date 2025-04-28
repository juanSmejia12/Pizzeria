<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'position' => 'required|string|in:cajero,administrador,cocinero,mensajero',
            'identification_number' => 'required|string|max:20',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
        ]);

        $employee = Employee::create($request->all());
        return response()->json($employee, 201);
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            return response()->json($employee);
        }

        return response()->json(['message' => 'Employee not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employee->update($request->all());
        return response()->json($employee);
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
