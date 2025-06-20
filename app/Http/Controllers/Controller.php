<?php

namespace App\Http\Controllers;
use App\Models\Menu;

abstract class Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('customer.dashboard', compact('menus'));
    }
}
