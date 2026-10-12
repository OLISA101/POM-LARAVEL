<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POMS - Add Patient</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    @include('partials.admin-navbar')

    <div class="container py-5">

        <div class="mb-4">
            <h1>Add Patient</h1>
            <p class="text-muted">Register a new patient in POMS.</p>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <form method="POST" action="/patients">

                    @csrf
                    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Please fix the following:</strong>

        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    <h5 class="mb-3">Patient Information</h5>

                    <div class="mb-3">
                        <label for="full_name" class="form-label">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="full_name"
                            id="full_name"
                            class="form-control"
                            value="{{ old('full_name') }}"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            id="phone"
                            class="form-control"
                            value="{{ old('phone') }}"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            value="{{ old('email') }}"
                        >
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">
                            Address
                        </label>

                        <textarea
                            name="address"
                            id="address"
                            class="form-control"
                            rows="3"
                        >{{ old('address') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="date_of_birth" class="form-label">
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            name="date_of_birth"
                            id="date_of_birth"
                            class="form-control"
                            value="{{ old('date_of_birth') }}"
                        >
                    </div>

                    <hr class="mb-4">

                    <h5 class="mb-3">Patient Login Account</h5>

                    <div class="mb-3">
                        <label for="username" class="form-label">
                            Username
                        </label>

                        <input
                            type="text"
                            name="username"
                            id="username"
                            class="form-control"
                            value="{{ old('username') }}"
                            required
                        >
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Register Patient
                    </button>

                    <a href="/patients" class="btn btn-secondary">
                        Cancel
                    </a>

                </form>

            </div>
        </div>

    </div>

</body>
</html>