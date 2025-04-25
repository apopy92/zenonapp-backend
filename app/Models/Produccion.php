<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'galpon_id',
        'fecha',
        'cantidad',
        'tipo',
        'created_by', // <-- ¡ahora este campo existe y debe estar incluido!
    ];

    public function galpon()
    {
        return $this->belongsTo(Galpones::class);
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

