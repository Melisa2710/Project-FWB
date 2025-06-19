<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class ChefOrderController extends Controller
{
    public function index()
    {
        // Ambil semua pesanan dengan relasi user dan menu
        $orders = Order::with(['user', 'menu'])->get();

        // Kirim data ke view chef.orders.index
        return view('chef.orders.index', compact('orders'));
    }
}
