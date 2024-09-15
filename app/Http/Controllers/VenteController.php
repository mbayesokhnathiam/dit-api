<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use App\Models\Produit;
use App\Models\DetailVente;
use Illuminate\Http\Request;

class VenteController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'data' => Vente::all()
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
        try{
            $produit = Produit::find($request->produitId);
            if(is_null($produit)){
                return response()->json([
                    'status' => 404,
                    'message' => 'Produit non trouvé dans la base de donnée'
                ]);
            }else{
                if($produit->quantite < $request->quantite){
                    return response()->json([
                        'status' => 500,
                        'message' => "On a pas cette quantité en stock, il reste que ".$produit->quantite
                    ]);
                }
            }
            $vente = new Vente();
            $vente->generateCodeVente();
            $vente->clientId = $request->clientId;
            $vente->vendeurId = $request->vendeurId;

            $vente->save();

      
            $detail = new DetailVente();
            $detail->venteId = $vente->id;
            $detail->produitId = $request->produitId;
            $detail->quantite = $request->quantite;
            $detail->prix = $request->prix;

            $savedDetail = $detail->save();

            $produit = Produit::find($request->produitId);
            $produit->quantite = $produit->quantite - $request->quantite;
            $produit->save();
            

            return response()->json([
                'status' => 200,
                'data' => $vente
            ]);
        }catch(Exception $e){
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
