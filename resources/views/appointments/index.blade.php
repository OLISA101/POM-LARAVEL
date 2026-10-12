<!DOCTYPE html>
<html>
<head>
    <title>POMS - Appointments</title>

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
            <h1>Appointments</h1>

            <p class="text-muted mb-0">
                Schedule and manage patient appointments.
            </p>
        </div>

        <a href="/dashboard" class="btn btn-secondary">
            Dashboard
        </a>

    </div>


    <!-- Schedule Appointment -->

    <div class="card mb-4">

        <div class="card-body">

            <h4 class="mb-3">Schedule Appointment</h4>

            <form method="POST" action="/appointments">

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


                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Appointment Date
                        </label>

                        <input
                            type="date"
                            name="appointment_date"
                            class="form-control"
                            required
                        >

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Appointment Time
                        </label>

                        <input
                            type="time"
                            name="appointment_time"
                            class="form-control"
                            required
                        >

                    </div>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Purpose
                    </label>

                    <input
                        type="text"
                        name="purpose"
                        class="form-control"
                        placeholder="e.g. Fitting, Follow-up, Consultation"
                        required
                    >

                </div>


                <button type="submit" class="btn btn-primary">
                    Schedule Appointment
                </button>

            </form>

        </div>

    </div>


    <!-- Appointment List -->

    <div class="card">

        <div class="card-body">

            <h4 class="mb-3">Appointments</h4>

            @if ($appointments->count() > 0)

                <div class="table-responsive">

                    <table class="table table-bordered table-striped">

                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Patient</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Purpose</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($appointments as $appointment)

                                <tr>

                                    <td>
                                        {{ $appointment->id }}
                                    </td>

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
                                        <span class="badge bg-primary">
                                            {{ ucfirst($appointment->status) }}
                                        </span>
                                    </td>

                                    <td>
    <a href="/appointments/{{ $appointment->id }}/edit"
       class="btn btn-sm btn-primary">
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
                    No appointments have been scheduled yet.
                </p>

            @endif

        </div>

    </div>

</div>

</body>
</html>