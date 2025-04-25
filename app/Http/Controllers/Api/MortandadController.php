<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mortandades;
use Illuminate\Http\Request;

class MortandadController extends Controller
{
    public function index()
    {
        return Mortandad::with('galpon')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'galpon_id' => 'required|exists:galpones,id',
            'fecha' => 'required|date',
            'cantidad' => 'required|integer',
            'causa' => 'nullable|string',
        ]);

        $validated['created_by'] = 2; // ID fijo por ahora

        $mortandad = Mortandades::create($validated);

        return response()->json($mortandad, 201);
    }
}
