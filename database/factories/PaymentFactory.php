<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'payment_method' => $this->faker->randomElement(['credit_card', 'bank_transfer', 'e_wallet']),
            'payment_status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
            'payment_proof' => $this->faker->imageUrl(640, 480, 'business', true, 'Payment Proof'),
        ];
    }
}
