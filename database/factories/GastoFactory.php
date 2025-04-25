<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Galpon;
use App\Models\Gasto;
use App\Models\User;

class GastoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gasto::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'galpon_id' => Galpon::factory(),
            'fecha' => fake()->date(),
            'concepto' => fake()->word(),
            'monto' => fake()->randomFloat(2, 0, 99999999.99),
            'created_by' => User::factory()->create()->created_by,
        ];
    }
}
