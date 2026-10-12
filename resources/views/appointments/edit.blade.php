<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
@include('partials.admin-navbar')

<div class="container mt-5">

    <h1 class="mb-4">Edit Appointment</h1>

    <div class="card">
        <div class="card-body">

            <p>
                <strong>Patient:</strong>
                {{ $appointment->patient->full_name }}
            </p>

            <p>
                <strong>Date:</strong>
                {{ $appointment->appointment_date }}
            </p>

            <p>
                <strong>Time:</strong>
                {{ $appointment->appointment_time }}
            </p>

            <p>
                <strong>Purpose:</strong>
                {{ $appointment->purpose }}
            </p>

            <form method="POST" action="/appointments/{{ $appointment->id }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Appointment Status</label>

                    <select name="status" class="form-select">
                        <option value="upcoming"
                            {{ $appointment->status === 'upcoming' ? 'selected' : '' }}>
                            Upcoming
                        </option>

                        <option value="completed"
                            {{ $appointment->status === 'completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                        <option value="cancelled"
                            {{ $appointment->status === 'cancelled' ? 'selected' : '' }}>
                            Cancelled
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update Appointment
                </button>

                <a href="/appointments" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>