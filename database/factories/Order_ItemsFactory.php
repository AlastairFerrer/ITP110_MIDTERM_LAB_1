<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order_items;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Order_ItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'order_id' => $this->faker->numberBetween(1001 , 9999),
                'item_id' => $this->faker->numberBetween(1001 , 9999),
                'quantity' => $this->faker->numberBetween(1, 100),
                'unit_price' => $this->faker->randomFloat(2, 10, 9999)
        ];
    }
}
