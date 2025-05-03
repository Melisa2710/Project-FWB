<?php

namespace Database\Seeders;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;


class OrderSeeder extends Seeder
{
    public function run(): void
    {
    Order::create([
        'user_id' => 3, // ID Customer
        'menu_id' => 1, // Nasi Goreng
        'jumlah' => 2,
        'status' => 'pending'
    ]);

    }
}
