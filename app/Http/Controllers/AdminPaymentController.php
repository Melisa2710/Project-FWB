<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class AdminPaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('user', 'order')->latest()->get();
        return view('admin.payments.index', compact('payments'));
    }
}
