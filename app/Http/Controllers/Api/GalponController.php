<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Galpones;

class GalponController extends Controller
{
    public function index()
    {
        return Galpones::select('id', 'nombre')->get();
    }
}
