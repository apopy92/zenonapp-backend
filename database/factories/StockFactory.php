<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Galpon;
use App\Models\Stock;
use App\Models\User;

class StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stock::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'galpon_id' => Galpon::factory(),
            'fecha' => fake()->date(),
            'tipo' => fake()->randomElement(["comercial","incubable","roto"]),
            'cantidad' => fake()->numberBetween(-10000, 10000),
            'created_by' => User::factory()->create()->created_by,
        ];
    }
}
