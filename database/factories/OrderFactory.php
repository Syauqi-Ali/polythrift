<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'buyer_id' => User::factory(),
            'store_id' => Store::factory(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'ongkir' => $this->faker->randomFloat(2, 5, 50),
            'status_order' => $this->faker->randomElement(['pending', 'paid', 'shipped', 'completed', 'cancelled']),
        ];
    }
}
