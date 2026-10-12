<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Appointment;

class HistoryController extends Controller
{
    public function index()
    {
        $orders = Order::with(
            'prescription.patient',
            'prescription.device'
        )
        ->where('order_status', 'delivered')
        ->get();

        $appointments = Appointment::with('patient')
            ->whereIn('status', ['completed', 'cancelled'])
            ->get();

        return view('history.index', compact(
            'orders',
            'appointments'
        ));
    }
}