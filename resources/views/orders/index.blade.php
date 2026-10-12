<!DOCTYPE html>
<html>
<head>
    <title>POMS - Orders</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>
    @include('partials.admin-navbar')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1>Orders</h1>

            <p class="text-muted mb-0">
                Manage patient device orders and fitting progress.
            </p>
        </div>

        <a href="/dashboard" class="btn btn-secondary">
            Dashboard
        </a>

    </div>


    <div class="card">

        <div class="card-body">

            @if ($orders->count() > 0)

                <div class="table-responsive">

                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Patient</th>
                                <th>Device</th>
                                <th>Order Status</th>
                                <th>Fitting Status</th>
                                <th>Last Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($orders as $order)

                                <tr>

                                    <td>
                                        {{ $order->id }}
                                    </td>

                                    <td>
                                        {{ $order->prescription->patient->full_name }}
                                    </td>

                                    <td>
                                        {{ $order->prescription->device->device_name }}
                                    </td>

                                    <td>
                                        <span class="badge bg-warning text-dark">
                                            {{ ucfirst($order->order_status) }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ ucfirst($order->fitting_status) }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $order->last_updated ?? 'Not updated' }}
                                    </td>

                                    <td>
    <a
        href="/orders/{{ $order->id }}/edit"
        class="btn btn-sm btn-primary"
    >
        Edit
    </a>
</td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <p class="text-muted mb-0">
                    No orders have been created yet.
                </p>

            @endif

        </div>

    </div>

</div>

</body>
</html>