<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class GastoController extends Controller
{
    public function index()
    {
        return Gasto::with('galpon')->get();
    }

    public function store(Request $request)
    {
        try {
            // Validación
            $validator = Validator::make($request->all(), [
                'galpon_id' => 'required|exists:galpones,id',
                'fecha' => 'required|date',
                'concepto' => 'required|string|max:255',
                'monto' => 'required|numeric|min:0',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Asignación temporal de usuario
            $data = $validator->validated();
            $data['created_by'] = 2;

            // Registro en logs
            Log::info('Registro de gasto recibido:', $data);

            // Crear gasto
            $gasto = Gasto::create($data);

            return response()->json($gasto, 201);
        } catch (\Exception $e) {
            Log::error('Error al registrar gasto: ' . $e->getMessage());

            return response()->json([
                'message' => 'Error del servidor',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
