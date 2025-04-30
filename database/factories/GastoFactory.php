<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Gasto;

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
            'galpon_id' => fake()->randomNumber(),
            'fecha' => fake()->date(),
            'concepto' => fake()->regexify('[A-Za-z0-9]{255}'),
            'monto' => fake()->randomFloat(2, 0, 99999999.99),
            'created_by' => fake()->randomNumber(),
        ];
    }
}
