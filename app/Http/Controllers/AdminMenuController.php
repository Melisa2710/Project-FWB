<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;


class AdminMenuController extends Controller
{

    public function index()
    {
        $menus = \App\Models\Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menus.edit', compact('menu'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update([
            'nama_makanan' => $request->nama_makanan,
            'harga' => $request->harga,
        ]);
        $menu->save();

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('images'), $gambarName);

        Menu::create([
            'nama_makanan' => $request->nama_makanan,
            'harga' => $request->harga,
            'gambar' => $gambarName,
        ]);
        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }
}
