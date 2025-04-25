<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galpon extends Model
{
    use HasFactory;

    protected $table = 'galpones';

    protected $fillable = [
        'nombre',
        'ubicacion',
        'capacidad',
        'created_by',
    ];

    /**
     * Relaciones
     */
    public function producciones()
    {
        return $this->hasMany(Produccion::class, 'galpon_id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'galpon_id');
    }

    public function mortandades()
    {
        return $this->hasMany(Mortandad::class, 'galpon_id');
    }

    public function gastos()
    {
        return $this->hasMany(Gasto::class, 'galpon_id');
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class); // Relación con tabla galpon_user
    }
}
