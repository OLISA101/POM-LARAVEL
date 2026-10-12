<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POMS - Patient Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    @include('partials.admin-navbar')

    <div class="container py-5">

        <!-- Header -->

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h1>Patient Portal</h1>

                <p class="text-muted mb-0">
                    Welcome, {{ $patient->full_name }}
                </p>
            </div>

            <form method="POST" action="/logout">
                @csrf

                <button type="submit" class="btn btn-danger">
                    Logout
                </button>
            </form>

        </div>


        <!-- Patient Information -->

        <div class="card shadow-sm border-0 mb-5">

            <div class="card-body">

                <h4 class="mb-4">My Information</h4>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <strong>Full Name</strong>
                        <p>{{ $patient->full_name }}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <strong>Phone</strong>
                        <p>{{ $patient->phone }}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <strong>Email</strong>
                        <p>{{ $patient->email ?? 'N/A' }}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <strong>Date of Birth</strong>
                        <p>{{ $patient->date_of_birth ?? 'N/A' }}</p>
                    </div>

                    <div class="col-12">
                        <strong>Address</strong>
                        <p>{{ $patient->address ?? 'N/A' }}</p>
                    </div>

                </div>

            </div>

        </div>


        <!-- Prescriptions -->

        <h2 class="mb-3">My Prescriptions</h2>

        <div class="table-responsive mb-5">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Device</th>
                        <th>Date Prescribed</th>
                        <th>Order Status</th>
                        <th>Fitting Status</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($prescriptions as $prescription)

                        <tr>

                            <td>
                                {{ $prescription->device->device_name }}
                            </td>

                            <td>
                                {{ $prescription->date_prescribed }}
                            </td>

                            <td>
                                {{ ucfirst($prescription->order->order_status) }}
                            </td>

                            <td>
                                {{ ucfirst($prescription->order->fitting_status) }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center">
                                No prescriptions yet.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <!-- Appointments -->

        <h2 class="mb-3">My Appointments</h2>

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Purpose</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($appointments as $appointment)

                        <tr>

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
                                {{ ucfirst($appointment->status) }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center">
                                No appointments yet.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</body>
</html>