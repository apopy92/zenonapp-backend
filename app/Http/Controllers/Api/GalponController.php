<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Galpon;

class GalponController extends Controller
{
    public function index()
    {
        return Galpon::select('id', 'nombre')->get();
    }
}
