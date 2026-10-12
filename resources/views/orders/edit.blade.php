<!DOCTYPE html>
<html>
<head>
    <title>POMS - Update Order</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>
    @include('partials.admin-navbar')

<div class="container mt-5">

    <div class="mb-4">
        <h1>Update Order #{{ $order->id }}</h1>

        <p class="text-muted">
            Update the order and fitting status.
        </p>
    </div>


    <div class="card">

        <div class="card-body">

            <p>
                <strong>Patient:</strong>
                {{ $order->prescription->patient->full_name }}
            </p>

            <p>
                <strong>Device:</strong>
                {{ $order->prescription->device->device_name }}
            </p>

            <hr>

            <form method="POST" action="/orders/{{ $order->id }}">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Order Status
                    </label>

                    <select name="order_status" class="form-select">

                        <option value="pending"
                            {{ $order->order_status === 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="processing"
                            {{ $order->order_status === 'processing' ? 'selected' : '' }}>
                            Processing
                        </option>

                        <option value="delivered"
                            {{ $order->order_status === 'delivered' ? 'selected' : '' }}>
                            Delivered
                        </option>

                    </select>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Fitting Status
                    </label>

                    <select name="fitting_status" class="form-select">

                        <option value="pending"
                            {{ $order->fitting_status === 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="fitting"
                            {{ $order->fitting_status === 'fitting' ? 'selected' : '' }}>
                            Fitting
                        </option>

                        <option value="completed"
                            {{ $order->fitting_status === 'completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                    </select>

                </div>


                <a href="/orders" class="btn btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Update Order
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>