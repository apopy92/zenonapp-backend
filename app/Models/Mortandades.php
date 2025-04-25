<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mortandades extends Model
{
    use HasFactory;

    protected $fillable = [
        'galpon_id',
        'fecha',
        'cantidad',
        'causa',
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
