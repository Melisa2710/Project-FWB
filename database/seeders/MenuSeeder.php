<?php

namespace Database\Seeders;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::insert([
            ['nama_makanan' => 'Nasi Goreng', 'harga' => 15000],
            ['nama_makanan' => 'Ayam Bakar', 'harga' => 20000],
            ['nama_makanan' => 'Sate Ayam', 'harga' => 18000],
        ]);
        
         
    }
}
