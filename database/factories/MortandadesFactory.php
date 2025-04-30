<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Mortandades;

class MortandadesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mortandades::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'galpon_id' => fake()->randomNumber(),
            'fecha' => fake()->date(),
            'cantidad' => fake()->numberBetween(-10000, 10000),
            'causa' => fake()->text(),
            'created_by' => fake()->randomNumber(),
        ];
    }
}
