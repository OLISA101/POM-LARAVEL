<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POMS - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-md-5">

                <div class="card shadow border-0">
                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h2 class="fw-bold">POMS</h2>
                            <p class="text-muted">
                                Prosthetics & Orthotics Management System
                            </p>
                        </div>

                        <h4 class="mb-3">Login</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="/login">

                            @csrf

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

                            <div class="mb-3">
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

                            <button type="submit" class="btn btn-primary w-100">
                                Login
                            </button>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

</body>
</html>