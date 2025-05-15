<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
    
        return view('user.index', [
            'users' => $users,
            'from' => $request->query('from'),
            'employee_id' => $request->query('employee_id'),
            'client_id' => $request->query('client_id'),
        ]);
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:cliente,empleado',
        ]);

            $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

        if ($user->role === 'cliente') {
            return redirect()->route('clients.create', ['user_id' => $user->id]);
        } elseif ($user->role === 'empleado') {
            return redirect()->route('employees.create', ['user_id' => $user->id]);
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        }

        return response()->json(['message' => 'User not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|in:admin,empleado',
            'password' => 'nullable|string|min:8',
        ]);
    
        $user = User::findOrFail($id);
    
        $data = $request->only('name', 'email', 'role');
    
        if ($request->filled('password')) {
            $data['password'] = \Hash::make($request->password);
        }
    
        $user->update($data);
    
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado.');
        }
    
        if ($request->has('from') && $request->from === 'employee') {
            $user->delete();
            return redirect()->route('employees.index')->with('success', 'Usuario eliminado correctamente. ');
        }

        if ($request->has('from') && $request->from === 'client') {
            $user->delete();
            return redirect()->route('clients.index')->with('success', 'Usuario eliminado correctamente. ');
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }
}
