<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan daftar order untuk merchant
    public function index()
    {
        $orders = Order::where('merchant_id', Auth::id())->get();
        return view('order.index', compact('orders'));
    }

    // Menampilkan detail order
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('order.show', compact('order'));
    }
}
