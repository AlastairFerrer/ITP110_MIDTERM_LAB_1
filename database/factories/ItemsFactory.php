<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Items;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Items>
 */
class ItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(50 , 1000),
            'quantity' => $this->faker->numberBetween(1 , 100),
            'is_active' => $this->faker->numberBetween(1 , 3)
        ];
    }
}
