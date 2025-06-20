<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'menu'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }
}