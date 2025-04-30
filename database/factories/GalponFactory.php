<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Galpon;

class GalponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Galpon::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->regexify('[A-Za-z0-9]{255}'),
            'ubicacion' => fake()->regexify('[A-Za-z0-9]{255}'),
            'capacidad' => fake()->numberBetween(-10000, 10000),
            'created_by' => fake()->randomNumber(),
            'users' => fake()->word(),
        ];
    }
}
