<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'galpon_id',
        'fecha',
        'concepto',
        'monto',
        'created_by',
    ];

    /**
     * Relación con el modelo Galpones.
     */
    public function galpon()
    {
        return $this->belongsTo(Galpones::class);
    }

    /**
     * Relación con el creador del gasto (usuario).
     */
    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
