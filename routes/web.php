<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientPortalController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HistoryController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('auth.login');
});


Route::middleware('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/patients', [PatientController::class, 'index']);
    Route::get('/patients/create', [PatientController::class, 'create']);
    Route::post('/patients', [PatientController::class, 'store']);

    Route::get('/devices', [DeviceController::class, 'index']);
    Route::get('/devices/create', [DeviceController::class, 'create']);
    Route::post('/devices', [DeviceController::class, 'store']);

    Route::get('/prescriptions', [PrescriptionController::class, 'index']);
    Route::post('/prescriptions', [PrescriptionController::class, 'store']);

    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit']);
    Route::put('/orders/{order}', [OrderController::class, 'update']);

    Route::get('/appointments', [AppointmentController::class, 'index']);
    Route::post('/appointments', [AppointmentController::class, 'store']);
    Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit']);
    Route::put('/appointments/{appointment}', [AppointmentController::class, 'update']);

    Route::get('/history', [HistoryController::class, 'index']);

});


Route::get('/patient', [PatientPortalController::class, 'index'])
    ->middleware('patient');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);