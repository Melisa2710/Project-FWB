<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;

class AdminDeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::with('order')->latest()->get();
        return view('admin.deliveries.index', compact('deliveries'));
    }
}
