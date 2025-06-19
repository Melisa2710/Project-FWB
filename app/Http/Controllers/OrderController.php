<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class OrderController extends Controller
{
    // Menampilkan semua pesanan milik customer yang sedang login
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Anda harus login terlebih dahulu.');
        }

        $userId = Auth::user()->id;


        // Ambil pesanan beserta relasi menu dan feedback-nya
        $orders = Order::with(['menu', 'feedback'])
            ->where('user_id', $userId)
            ->get();

        return view('customer.orders.index', compact('orders'));
    }

    // Simpan pesanan baru customer
   public function store(Request $request)
{
    $request->validate([
        'menu_id' => 'required|exists:menus,id',
        'jumlah' => 'required|integer|min:1',
    ]);

    $userId = Auth::id();
    $menuId = $request->menu_id;
    $jumlah = $request->jumlah;

    // Cek apakah sudah ada pesanan yang sama dengan status pending
    $existingOrder = Order::where('user_id', $userId)
        ->where('menu_id', $menuId)
        ->where('status', 'pending')
        ->first();

    if ($existingOrder) {
        $existingOrder->jumlah += $jumlah;
        $existingOrder->save();

        // Logging di sini
        Log::info('Order updated:', [
            'user_id' => $userId,
            'menu_id' => $menuId,
            'jumlah' => $existingOrder->jumlah,
        ]);
    } else {
        Order::create([
            'user_id' => $userId,
            'menu_id' => $menuId,
            'jumlah' => $jumlah,
            'status' => 'pending'
        ]);

        // Logging di sini
        Log::info('Order created:', [
            'user_id' => $userId,
            'menu_id' => $menuId,
            'jumlah' => $jumlah,
        ]);
    }

    return redirect()->back()->with('success', 'Pesanan berhasil dibuat.');
}


    // Hapus pesanan milik customer
    public function destroy(Order $order)
    {
        // Opsional: pastikan user hanya bisa hapus pesanan miliknya
        if ($order->user_id != Auth::id()) {
            abort(403, 'Tidak diizinkan.');
        }

        $order->delete();
        return response()->noContent();
    }
}
