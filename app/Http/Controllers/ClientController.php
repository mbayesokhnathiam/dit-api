<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();

        return response()->json([
            'status' => 200,
            'data' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $saved = Client::create($data);

        return response()->json([
            'status' => 200,
            'data' => $saved
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::find($id);

        if(is_null($client)){
            return response()->json([
                'status' => 404,
                'message' => 'Client non trouvé'
            ]);
        }

        return response()->json([
            'status' => 200,
            'data' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);

        if(is_null($client)){
            return response()->json([
                'status' => 404,
                'message' => 'Client non trouvé'
            ]);
        }

        $data = $request->all();

        $updated = $client->update($data);

        return response()->json([
            'status' => 200,
            'data' => $updated
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);

        if(is_null($client)){
            return response()->json([
                'status' => 404,
                'message' => 'Client non trouvé'
            ]);
        }

        $client->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Client suprimé'
        ]);
    }
}
