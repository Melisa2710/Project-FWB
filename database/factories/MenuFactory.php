<?php

namespace Database\Factories;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_makanan' => $this->faker->randomElement([
        'Nasi Goreng', 'Mie Ayam', 'Sate Ayam', 'Bakso', 'Soto Ayam'
        ]),
        'harga' => $this->faker->numberBetween(10000, 50000),
        ];
    }
}
