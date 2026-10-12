<!DOCTYPE html>
<html>
<head>
    <title>POMS - Devices</title>

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
            <h1>Devices</h1>
            <p class="text-muted mb-0">
                Manage prosthetic and orthotic devices.
            </p>
        </div>

        <div>
            <a href="/dashboard" class="btn btn-secondary">
                Dashboard
            </a>

            <a href="/devices/create" class="btn btn-primary">
                Add Device
            </a>
        </div>

    </div>


    <div class="card">

        <div class="card-body">

            @if ($devices->count() > 0)

                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Device Name</th>
                            <th>Device Type</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($devices as $device)

                            <tr>
                                <td>{{ $device->id }}</td>
                                <td>{{ $device->device_name }}</td>
                                <td>{{ $device->device_type }}</td>
                                <td>{{ $device->quantity }}</td>
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <p class="text-muted mb-0">
                    No devices have been added yet.
                </p>

            @endif

        </div>

    </div>

</div>

</body>
</html>