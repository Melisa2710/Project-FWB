<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::all(); // atau with user_id
        return view('customer.deliveries.index', compact('deliveries'));
    }


    // Menyimpan data pengiriman baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status_pengiriman' => 'required|in:processing,shipped,delivered',
            'waktu_pengiriman' => 'nullable|date',
            'alamat' => 'required|string',
            'kurir' => 'nullable|string',
            'kode_resi' => 'nullable|string'
        ]);

        return Delivery::create($data);
    }

    // Menampilkan detail pengiriman tertentu
    public function show(Delivery $delivery)
    {
        return $delivery->load(['order']);
    }

    // Memperbarui data pengiriman
    public function update(Request $request, Delivery $delivery)
    {
        $data = $request->validate([
            'status_pengiriman' => 'sometimes|in:processing,shipped,delivered',
            'waktu_pengiriman' => 'nullable|date',
            'alamat' => 'sometimes|string',
            'kurir' => 'nullable|string',
            'kode_resi' => 'nullable|string'
        ]);

        $delivery->update($data);
        return $delivery;
    }

    // Menghapus data pengiriman
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return response()->noContent();
    }
}
