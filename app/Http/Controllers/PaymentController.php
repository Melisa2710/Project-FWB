<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
class PaymentController extends Controller
{
    // Menampilkan semua data pembayaran
    public function index()
    {
        return Payment::with(['order'])->get();
    }

    // Menyimpan data pembayaran baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'metode_pembayaran' => 'required|string',
            'jumlah' => 'required|numeric',
            'status' => 'required|in:pending,paid,failed',
            'tanggal_pembayaran' => 'nullable|date'
        ]);

        return Payment::create($data);
    }

    // Menampilkan detail pembayaran tertentu
    public function show(Payment $payment)
    {
        return $payment->load(['order']);
    }

    // Memperbarui data pembayaran
    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'metode_pembayaran' => 'sometimes|string',
            'jumlah' => 'sometimes|numeric',
            'status' => 'sometimes|in:pending,paid,failed',
            'tanggal_pembayaran' => 'nullable|date'
        ]);

        $payment->update($data);
        return $payment;
    }

    // Menghapus data pembayaran
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return response()->noContent();
    }
}