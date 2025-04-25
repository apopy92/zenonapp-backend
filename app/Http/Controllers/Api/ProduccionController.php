<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produccion;
use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    public function index()
    {
        return Produccion::with('galpon')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'galpon_id' => 'required|exists:galpones,id',
            'fecha' => 'required|date',
            'cantidad' => 'required|integer',
            'tipo' => 'required|string',
            'observaciones' => 'nullable|string',
        ]);

        // Temporal: asignar un usuario fijo
        $validated['created_by'] = 2;

        $produccion = Produccion::create($validated);

        return response()->json($produccion, 201);
    }
}
