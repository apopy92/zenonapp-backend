<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación muchos a muchos con galpones
     */
    public function galpones(): BelongsToMany
    {
        return $this->belongsToMany(Galpon::class);
    }

    /**
     * Producciones creadas por el usuario
     */
    public function producciones(): HasMany
    {
        return $this->hasMany(Produccion::class, 'created_by');
    }

    /**
     * Mortandades registradas por el usuario
     */
    public function mortandades(): HasMany
    {
        return $this->hasMany(Mortandad::class, 'created_by');
    }

    /**
     * Gastos registrados por el usuario
     */
    public function gastos(): HasMany
    {
        return $this->hasMany(Gasto::class, 'created_by');
    }

    /**
     * Stocks registrados por el usuario
     */
    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class, 'created_by');
    }
}
