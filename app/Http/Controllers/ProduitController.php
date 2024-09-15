<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all();

        return response()->json([
            'status' => 200,
            'data' => $produits
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

        $saved = Produit::create($data);

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
        $produit = Produit::find($id);

        if(is_null($produit)){
            return response()->json([
                'status' => 404,
                'message' => 'produit non trouvé'
            ]);
        }

        return response()->json([
            'status' => 200,
            'data' => $produit
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
        $produit = Produit::find($id);

        if(is_null($produit)){
            return response()->json([
                'status' => 404,
                'message' => 'produit non trouvé'
            ]);
        }

        $data = $request->all();

        $updated = $produit->update($data);

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
        $produit = Produit::find($id);

        if(is_null($produit)){
            return response()->json([
                'status' => 404,
                'message' => 'produit non trouvé'
            ]);
        }

        $produit->delete();

        return response()->json([
            'status' => 200,
            'message' => 'produit suprimé'
        ]);
    }
}
