<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with(['user', 'menu'])->get();
        return view('admin.feedback.index', compact('feedbacks'));
        
    }
}
