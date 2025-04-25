<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        return Stock::with('galpon')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'galpon_id' => 'required|exists:galpones,id',
            'fecha' => 'required|date',
            'cantidad' => 'required|integer',
            'tipo' => 'required|string',
        ]);

        $stock = Stock::create($validated);

        return response()->json($stock, 201);
    }
}
