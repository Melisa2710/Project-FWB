<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::whereHas('order', function ($q) {
            $q->where('user_id', Auth::id());
        })->get();

        return view('customer.payment.index', compact('payments'));
    }

    public function create()
    {
        $orders = Order::where('user_id', Auth::id())
            ->whereDoesntHave('payment')
            ->get();

        return view('customer.payment.create', compact('orders'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'metode_pembayaran' => 'required|string',
            'jumlah' => 'required|numeric',
        ]);

        Payment::create([
            'order_id' => $request->order_id,
            'metode_pembayaran' => $request->metode_pembayaran,
            'jumlah' => $request->jumlah,
            'status' => 'pending',
            'tanggal_pembayaran' => now(),
        ]);

        return redirect()->route('customer.payments.index')->with('success', 'Pembayaran berhasil dibuat!');
    }
}
