<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Produccion;

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
            'galpon_id' => fake()->randomNumber(),
            'fecha' => fake()->date(),
            'cantidad' => fake()->numberBetween(-10000, 10000),
            'tipo' => fake()->regexify('[A-Za-z0-9]{100}'),
            'created_by' => fake()->randomNumber(),
        ];
    }
}
