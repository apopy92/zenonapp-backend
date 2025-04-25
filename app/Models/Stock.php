<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'galpon_id',
        'fecha',
        'tipo',
        'cantidad',
        'created_by',
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
