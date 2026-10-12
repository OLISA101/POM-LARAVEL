<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(
            'prescription.patient',
            'prescription.device'
        )->get();

        return view('orders.index', compact('orders'));
    }
    public function edit(Order $order)
{
    return view('orders.edit', compact('order'));
}

public function update(Request $request, Order $order)
{
    $validated = $request->validate([
        'order_status' => 'required',
        'fitting_status' => 'required',
    ]);

    $order->update([
        'order_status' => $validated['order_status'],
        'fitting_status' => $validated['fitting_status'],
        'last_updated' => now(),
    ]);

    return redirect('/orders');
}
}