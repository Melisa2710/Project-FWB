<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{

    public function run()
    {
        $menus = [
            ['nama_makanan' => 'Nasi Goreng', 'harga' => 15000],
            ['nama_makanan' => 'Mie Goreng', 'harga' => 14000],
            ['nama_makanan' => 'Ayam Geprek', 'harga' => 18000],
            ['nama_makanan' => 'Sate Ayam', 'harga' => 20000],
            ['nama_makanan' => 'Bakso', 'harga' => 12000],
            ['nama_makanan' => 'Soto Ayam', 'harga' => 16000],
            ['nama_makanan' => 'Nasi Uduk', 'harga' => 13000],
            ['nama_makanan' => 'Rendang', 'harga' => 25000],
            ['nama_makanan' => 'Pecel Lele', 'harga' => 17000],
            ['nama_makanan' => 'Tahu Tek', 'harga' => 11000],
            ['nama_makanan' => 'Gado-Gado', 'harga' => 13000],
            ['nama_makanan' => 'Nasi Kuning', 'harga' => 14000],
            ['nama_makanan' => 'Capcay', 'harga' => 15000],
            ['nama_makanan' => 'Nasi Campur', 'harga' => 18000],
            ['nama_makanan' => 'Mie Ayam', 'harga' => 13000],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
     
    }
}
