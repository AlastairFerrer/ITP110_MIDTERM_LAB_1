<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Orders;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_no' => $this->faker->numberBetween(1001 , 9999),
            'customer_name' => $this->faker->word(),
            'order_status' => $this->faker->numberBetween(1 , 3),
        ];
    }
}
