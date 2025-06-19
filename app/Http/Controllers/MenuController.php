<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
class MenuController extends Controller
{
    public function index()
    {
        
        return Menu::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        return Menu::create($data);
    }

    public function show(Menu $menu)
    {
        return $menu;
    }

    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'nama_makanan' => 'sometimes|string|max:255',
            'harga' => 'sometimes|numeric',
        ]);

        $menu->update($data);
        return $menu;
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return response()->noContent();
    }
}