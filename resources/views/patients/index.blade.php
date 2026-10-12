<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POMS - Patients</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    @include('partials.admin-navbar')

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1>Patients</h1>
        <p class="text-muted mb-0">Manage registered POMS patients.</p>
    </div>

    <div>
        <a href="/dashboard" class="btn btn-secondary">
            Dashboard
        </a>

        <a href="/patients/create" class="btn btn-primary">
            Add Patient
        </a>
    </div>

</div>

        <div class="card shadow-sm border-0">
            <div class="card-body">

                @if ($patients->count() > 0)

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->full_name }}</td>
                                        <td>{{ $patient->phone }}</td>
                                        <td>{{ $patient->email ?? 'N/A' }}</td>
                                        <td>{{ $patient->date_of_birth ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                @else

                    <p class="text-muted mb-0">
                        No patients have been registered yet.
                    </p>

                @endif

            </div>
        </div>

    </div>

</body>
</html>