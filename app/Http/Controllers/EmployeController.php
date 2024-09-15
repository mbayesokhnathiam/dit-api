<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Employe::all();

        return response()->json([
            'status' => 200,
            'data' => $employes
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

        $saved = Employe::create($data);

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
        $employe = Employe::find($id);

        if(is_null($employe)){
            return response()->json([
                'status' => 404,
                'message' => 'Employé non trouvé'
            ]);
        }

        return response()->json([
            'status' => 200,
            'data' => $employe
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
        $employe = Employe::find($id);

        if(is_null($employe)){
            return response()->json([
                'status' => 404,
                'message' => 'Employé non trouvé'
            ]);
        }

        $data = $request->all();

        $updated = $employe->update($data);

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
        $employe = Employe::find($id);

        if(is_null($employe)){
            return response()->json([
                'status' => 404,
                'message' => 'Employé non trouvé'
            ]);
        }

        $employe->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Employé suprimé'
        ]);
    }
}
