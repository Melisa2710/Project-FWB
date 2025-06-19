<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class OrderrController extends Controller
{
    public function index()
    {
        $userId = request()->user()->id;
        $orders = Order::with('menu') // biar nama menunya bisa dipanggil
            ->where('user_id', $userId)
            ->get();

        return view('chef.orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'jumlah' => 'required|integer|min:1',
        ]);


        $userId = request()->user()->id;
        $menuId = $request->menu_id;
        $jumlah = $request->jumlah;

        // Cek apakah sudah ada pesanan yang sama dengan status pending
        $existingOrder = Order::where('user_id', $userId)
            ->where('menu_id', $menuId)
            ->where('status', 'pending')
            ->first();

        if ($existingOrder) {
            // Update jumlahnya saja
            $existingOrder->jumlah += $jumlah;
            $existingOrder->save();
        } else {
            // Buat pesanan baru
            Order::create([
                'user_id' => $userId,
                'menu_id' => $menuId,
                'jumlah' => $jumlah,
                'status' => 'pending'
            ]);
        }

        return redirect()->back()->with('success', 'Pesanan berhasil dibuat.');
    }
}
