<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Device;
use App\Models\Order;
use App\Models\Appointment;

class DashboardController extends Controller
{
public function index()
{
    $totalPatients = Patient::count();
    $totalDevices = Device::sum('quantity');
    $totalOrders = Order::count();
    $totalAppointments = Appointment::count();

    $pendingOrders = Order::where('order_status', 'pending')->count();
    $processingOrders = Order::where('order_status', 'processing')->count();
    $deliveredOrders = Order::where('order_status', 'delivered')->count();

    $upcomingAppointments = Appointment::where('status', 'upcoming')->count();
    $completedAppointments = Appointment::where('status', 'completed')->count();
    $cancelledAppointments = Appointment::where('status', 'cancelled')->count();

    return view('dashboard', compact(
        'totalPatients',
        'totalDevices',
        'totalOrders',
        'totalAppointments',
        'pendingOrders',
        'processingOrders',
        'deliveredOrders',
        'upcomingAppointments',
        'completedAppointments',
        'cancelledAppointments'
    ));
}
}