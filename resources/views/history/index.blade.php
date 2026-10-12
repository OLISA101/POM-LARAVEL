<!DOCTYPE html>
<html>
<head>
    <title>POMS History</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('partials.admin-navbar')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>POMS History</h1>

        <a href="/dashboard" class="btn btn-secondary">
            Dashboard
        </a>
    </div>


    <!-- Delivered Orders -->

    <h2 class="mb-3">Delivered Orders</h2>

    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped">

            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Patient</th>
                    <th>Device</th>
                    <th>Order Status</th>
                    <th>Fitting Status</th>
                    <th>Last Updated</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($orders as $order)

                    <tr>
                        <td>{{ $order->id }}</td>

                        <td>
                            {{ $order->prescription->patient->full_name }}
                        </td>

                        <td>
                            {{ $order->prescription->device->device_name }}
                        </td>

                        <td>
                            <span class="badge bg-success">
                                {{ ucfirst($order->order_status) }}
                            </span>
                        </td>

                        <td>
                            {{ ucfirst($order->fitting_status) }}
                        </td>

                        <td>
                            {{ $order->last_updated }}
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            No delivered orders yet.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>


    <!-- Appointment History -->

    <h2 class="mb-3">Appointment History</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead class="table-dark">
                <tr>
                    <th>Appointment ID</th>
                    <th>Patient</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Purpose</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($appointments as $appointment)

                    <tr>
                        <td>{{ $appointment->id }}</td>

                        <td>
                            {{ $appointment->patient->full_name }}
                        </td>

                        <td>
                            {{ $appointment->appointment_date }}
                        </td>

                        <td>
                            {{ $appointment->appointment_time }}
                        </td>

                        <td>
                            {{ $appointment->purpose }}
                        </td>

                        <td>
                            @if ($appointment->status === 'completed')
                                <span class="badge bg-success">
                                    Completed
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    Cancelled
                                </span>
                            @endif
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            No appointment history yet.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>

</body>
</html>