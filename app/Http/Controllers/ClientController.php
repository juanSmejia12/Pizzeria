<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);
    
        Client::create($request->all());
    
        return redirect()->route('clients.index')->with('success', 'Cliente creado correctamente.');
    }

    public function show($id)
    {
        $client = Client::find($id);
        if ($client) {
            return response()->json($client);
        }

        return response()->json(['message' => 'Client not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $client->update($request->all());
        return response()->json($client);
    }

    public function destroy($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return redirect()->route('clients.index')->with('error', 'Cliente no encontrado.');
        }
    
        if ($client->user) {
            return redirect()->route('users.index', ['from' => 'client', 'client_id' => $client->id])
                ->with('error', 'Para eliminar este cliente, primero elimine su usuario asociado.');
        }
        
    }
    public function create(Request $request)
    {
        if (!$request->has('user_id')) {
            return redirect()->route('users.create')
                ->with('info', 'Primero debes crear un usuario con el rol de cliente.');//como la tabla cliente depende del id del ususario para ser creado, es necesario pasar el dato 
        }
        return view('client.create', ['user_id' => $request->user_id]);
    }
}
