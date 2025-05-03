<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
    $user = User::factory()->create(); // Atau ambil dari database jika sudah ada

    return [
        'user_id' => optional($user)->id,
        'menu_id' => $this->faker->numberBetween(1, 10), 
        'jumlah' => $this->faker->numberBetween(1, 5), 
        'status' => $this->faker->randomElement(['tertunda', 'sedang diproses', 'selesai', 'dibatalkan']),
    ];

    }
}
