<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
class FeedbackController extends Controller
{
    // Menampilkan semua feedback
    public function index()
    {
        return Feedback::with(['user', 'menu', 'order'])->get();
    }

    // Menyimpan feedback baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'menu_id' => 'required|exists:menus,id',
            'order_id' => 'nullable|exists:orders,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string'
        ]);

        return Feedback::create($data);
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