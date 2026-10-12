<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POMS Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    @include('partials.admin-navbar')

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

    <h1>POMS Dashboard</h1>

    <form method="POST" action="/logout">
        @csrf

        <button type="submit" class="btn btn-danger">
            Logout
        </button>
    </form>

</div>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Total Patients</h6>
                        <h2>{{ $totalPatients }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Devices in Stock</h6>
                        <h2>{{ $totalDevices }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Orders</h6>
                        <h2>{{ $totalOrders }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Appointments</h6>
                        <h2>{{ $totalAppointments }}</h2>
                    </div>
                </div>
            </div>

            <div class="row mt-4">

    <div class="col-md-6 mb-4">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <h5 class="card-title">
                    Order Status
                </h5>

                <canvas id="orderChart"></canvas>

            </div>
        </div>

    </div>


    <div class="col-md-6 mb-4">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <h5 class="card-title">
                    Appointment Status
                </h5>

                <canvas id="appointmentChart"></canvas>

            </div>
        </div>

    </div>

</div>

        </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Order Status Chart
    const orderChart = document.getElementById('orderChart');

    new Chart(orderChart, {
        type: 'doughnut',

        data: {
            labels: ['Pending', 'Processing', 'Delivered'],

            datasets: [{
                label: 'Orders',
                data: [
                    {{ $pendingOrders }},
                    {{ $processingOrders }},
                    {{ $deliveredOrders }}
                ],
                borderWidth: 1
            }]
        },

        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });


    // Appointment Status Chart
    const appointmentChart = document.getElementById('appointmentChart');

    new Chart(appointmentChart, {
        type: 'doughnut',

        data: {
            labels: ['Upcoming', 'Completed', 'Cancelled'],

            datasets: [{
                label: 'Appointments',
                data: [
                    {{ $upcomingAppointments }},
                    {{ $completedAppointments }},
                    {{ $cancelledAppointments }}
                ],
                borderWidth: 1
            }]
        },

        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
</body>
</html>