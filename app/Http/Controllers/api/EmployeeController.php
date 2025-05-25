<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return response()->json(Employee::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'position' => 'required|string|in:cajero,administrador,cocinero,mensajero',
            'identification_number' => 'required|string|max:20',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
        ]);

        $employee = Employee::create($validated);

        return response()->json($employee, 201);
    }

    public function show($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json($employee, 200);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $validated = $request->validate([
            'position' => 'sometimes|required|string|in:cajero,administrador,cocinero,mensajero',
            'identification_number' => 'sometimes|required|string|max:20',
            'salary' => 'sometimes|required|numeric',
            'hire_date' => 'sometimes|required|date',
        ]);

        $employee->update($validated);

        return response()->json($employee, 200);
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        if ($employee->user) {
            return response()->json([
                'message' => 'Para eliminar este empleado, primero elimine su usuario asociado.'
            ], 400);
        }

        $employee->delete();

        return response()->json(null, 204);
    }
}