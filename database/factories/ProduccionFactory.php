<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Galpon;
use App\Models\Produccion;
use App\Models\User;

class ProduccionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produccion::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'galpon_id' => Galpon::factory(),
            'fecha' => fake()->date(),
            'huevos_comerciales' => fake()->numberBetween(-10000, 10000),
            'huevos_incubables' => fake()->numberBetween(-10000, 10000),
            'huevos_rotos' => fake()->numberBetween(-10000, 10000),
            'observaciones' => fake()->text(),
            'created_by' => User::factory()->create()->created_by,
        ];
    }
}
