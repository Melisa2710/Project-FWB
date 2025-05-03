<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat 1 user dengan role customer
        $user = User::factory()->create([
            'role' => 'customer'
        ]);

        // Buat 1 menu
        $menu = Menu::factory()->create();

        // Buat 1 order terkait user dan menu
        Order::factory()->create([
            'user_id' => $user->id,
            'menu_id' => $menu->id,
        ]);

        // Tambahan akun default lainnya
        User::create([
            'name' => 'Admin Satu',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Chef Satu',
            'email' => 'chef@mail.com',
            'password' => Hash::make('password'),
            'role' => 'chef'
        ]);

        User::create([
            'name' => 'Customer Satu',
            'email' => 'customer@mail.com',
            'password' => Hash::make('password'),
            'role' => 'customer'
        ]);
    }
}
