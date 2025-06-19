<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class FeedbackController extends Controller
{
    // Menampilkan semua feedback
    public function index()
    {
        $feedbacks = Feedback::with(['user', 'menu', 'order'])->get();
        return view('admin.feedback.index', compact('feedbacks'));
    }

    
    public function create($order_id)
    {
        $order = Order::with('menu')->findOrFail($order_id); // Pastikan relasi orders -> menu ada
        $menu = $order->menu;

        return view('customer.feedback.create', compact('order', 'menu'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'menu_id' => 'required|exists:menus,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:255',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Anda harus login untuk memberi ulasan.');
        }
        Feedback::create([
            'user_id' => Auth::id(),
            'menu_id' => $request->menu_id,
            'order_id' => $request->order_id,
            'rating' => $request->rating, // PENTING!
            'komentar' => $request->komentar,
        ]);


        return redirect()->route('customer.feedback.index')->with('success', 'Ulasan berhasil dikirim!');
    }



    // Menampilkan detail feedback tertentu
    public function show(Feedback $feedback)
    {
        return $feedback->load(['user', 'menu', 'order']);
    }

    // Memperbarui feedback
    public function update(Request $request, Feedback $feedback)
    {
        $data = $request->validate([
            'rating' => 'sometimes|integer|min:1|max:5',
            'komentar' => 'nullable|string'
        ]);

        $feedback->update($data);
        return $feedback;
    }

    // Menghapus feedback
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return response()->noContent();
    }
}
