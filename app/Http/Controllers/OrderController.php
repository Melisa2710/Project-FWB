<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function index()
    {
        return Order::with(['menu', 'user'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'menu_id' => 'required|exists:menus,id',
            'status' => 'required|in:menunggu,diproses,selesai'
        ]);

        return Order::create($data);
    }

    public function show(Order $order)
    {
        return $order->load(['menu', 'user']);
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai'
        ]);

        $order->update($data);
        return $order;
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->noContent();
    }
}