<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('customer.menus.index', compact('menus'));
    }
}
