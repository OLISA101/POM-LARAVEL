<!DOCTYPE html>
<html>
<head>
    <title>POMS - Add Device</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>
    @include('partials.admin-navbar')

<div class="container mt-5">

    <div class="mb-4">
        <h1>Add Device</h1>
        <p class="text-muted">
            Add a new prosthetic or orthotic device to inventory.
        </p>
    </div>

    <div class="card">
        <div class="card-body">

            <form method="POST" action="/devices">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Device Name</label>

                    <input
                        type="text"
                        name="device_name"
                        class="form-control"
                        value="{{ old('device_name') }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Device Type</label>

                    <input
                        type="text"
                        name="device_type"
                        class="form-control"
                        value="{{ old('device_type') }}"
                        placeholder="e.g. Prosthetic, Orthotic"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>

                    <input
                        type="number"
                        name="quantity"
                        class="form-control"
                        value="{{ old('quantity') }}"
                        min="0"
                        required
                    >
                </div>

                <a href="/devices" class="btn btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Add Device
                </button>

            </form>

        </div>
    </div>

</div>

</body>
</html>