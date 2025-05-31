<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
            $clients = Client::with('user')->get(); 
            return response()->json($clients, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $client = Client::create($validated);

        return response()->json($client, 201); // 201: Created
    }

    public function show($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        return response()->json($client, 200);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $validated = $request->validate([
            'address' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
        ]);

        $client->update($validated);

        return response()->json($client, 200);
    }

public function destroy($id)
{
    $client = Client::find($id);

    if (!$client) {
        return response()->json(['success' => false, 'message' => 'Cliente no encontrado'], 404);
    }

    $client->delete();

    return response()->json(['success' => true, 'message' => 'Cliente eliminado correctamente']);
}

}