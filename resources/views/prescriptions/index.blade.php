<!DOCTYPE html>
<html>
<head>
    <title>POMS - Prescriptions</title>

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
            <h1>Prescriptions</h1>

            <p class="text-muted mb-0">
                Prescribe devices to registered patients.
            </p>
        </div>

        <div>
            <a href="/dashboard" class="btn btn-secondary">
                Dashboard
            </a>
        </div>

    </div>


    <div class="card">

        <div class="card-body">

            <form method="POST" action="/prescriptions">

                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        Patient
                    </label>

                    <select name="patient_id" class="form-select" required>

                        <option value="">
                            Select Patient
                        </option>

                        @foreach ($patients as $patient)

                            <option value="{{ $patient->id }}">
                                {{ $patient->full_name }}
                            </option>

                        @endforeach

                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        Device
                    </label>

                    <select name="device_id" class="form-select" required>

                        <option value="">
                            Select Device
                        </option>

                        @foreach ($devices as $device)

                            <option value="{{ $device->id }}">
                                {{ $device->device_name }}
                                ({{ $device->quantity }} in stock)
                            </option>

                        @endforeach

                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        Date Prescribed
                    </label>

                    <input
                        type="date"
                        name="date_prescribed"
                        class="form-control"
                        value="{{ date('Y-m-d') }}"
                        required
                    >
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        Notes
                    </label>

                    <textarea
                        name="notes"
                        class="form-control"
                        rows="3"
                        placeholder="Optional notes about the prescription"
                    ></textarea>
                </div>


                <button type="submit" class="btn btn-primary">
                    Create Prescription
                </button>

            </form>

            <hr class="my-4">

<h3 class="mb-3">Prescription History</h3>

@if ($prescriptions->count() > 0)

    <div class="table-responsive">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Device</th>
                    <th>Date Prescribed</th>
                    <th>Order Status</th>
                    <th>Fitting Status</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($prescriptions as $prescription)

                    <tr>
                        <td>{{ $prescription->id }}</td>

                        <td>
                            {{ $prescription->patient->full_name }}
                        </td>

                        <td>
                            {{ $prescription->device->device_name }}
                        </td>

                        <td>
                            {{ $prescription->date_prescribed }}
                        </td>

                        <td>
                            <span class="badge bg-warning text-dark">
                                {{ ucfirst($prescription->order->order_status) }}
                            </span>
                        </td>

                        <td>
                            <span class="badge bg-secondary">
                                {{ ucfirst($prescription->order->fitting_status) }}
                            </span>
                        </td>
                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@else

    <p class="text-muted">
        No prescriptions have been created yet.
    </p>

@endif

        </div>

    </div>

</div>

</body>
</html>