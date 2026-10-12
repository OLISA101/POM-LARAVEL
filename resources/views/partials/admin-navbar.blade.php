```html
<style>
    body {
        padding-left: 260px;
    }

    .poms-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 260px;
        background: #111827;
        color: #ffffff;
        padding: 28px 18px;
        display: flex;
        flex-direction: column;
        z-index: 1000;
        overflow-y: auto;
    }

    .poms-brand {
        font-size: 23px;
        font-weight: 700;
        letter-spacing: 1px;
        padding: 0 12px;
        margin-bottom: 8px;
    }

    .poms-subtitle {
        color: #9ca3af;
        font-size: 12px;
        padding: 0 12px;
        margin-bottom: 32px;
    }

    .poms-nav-label {
        color: #9ca3af;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 1.2px;
        padding: 0 12px;
        margin-bottom: 12px;
    }

    .poms-sidebar .nav-link {
        color: #cbd5e1;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        margin-bottom: 5px;
        border-radius: 9px;
        font-size: 14px;
        transition: background 0.2s, color 0.2s;
    }

    .poms-sidebar .nav-link:hover {
        background: #1f2937;
        color: #ffffff;
    }

    .poms-sidebar .nav-link.active {
        background: #2563eb;
        color: #ffffff;
        font-weight: 600;
    }

    .poms-sidebar .nav-link i {
        font-size: 18px;
    }

    .poms-sidebar .poms-logout {
        margin-top: auto;
        padding-top: 20px;
        border-top: 1px solid #374151;
    }

    .poms-sidebar .poms-logout button {
        width: 100%;
        text-align: left;
        padding: 11px 12px;
        border-radius: 9px;
    }

    @media (max-width: 767px) {
        body {
            padding-left: 78px;
        }

        .poms-sidebar {
            width: 78px;
            padding: 24px 10px;
        }

        .poms-brand {
            font-size: 17px;
            padding: 0;
            text-align: center;
        }

        .poms-subtitle,
        .poms-nav-label,
        .poms-sidebar .nav-text {
            display: none;
        }

        .poms-sidebar .nav-link {
            justify-content: center;
            padding: 13px 8px;
        }

        .poms-sidebar .nav-link i {
            font-size: 21px;
        }

        .poms-sidebar .poms-logout button {
            text-align: center;
            padding: 12px 5px;
        }
    }
</style>

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

<aside class="poms-sidebar">

    <div class="poms-brand">POMS<span class="text-primary">.</span></div>

    <div class="poms-subtitle">
        Prosthetics & Orthotics Management
    </div>

    <div class="poms-nav-label">WORKSPACE</div>

    <nav class="nav flex-column">

        <a href="/dashboard"
           class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2"></i>
            <span class="nav-text">Dashboard</span>
        </a>

        <a href="/patients"
           class="nav-link {{ request()->is('patients*') ? 'active' : '' }}">
            <i class="bi bi-people"></i>
            <span class="nav-text">Patients</span>
        </a>

        <a href="/devices"
           class="nav-link {{ request()->is('devices*') ? 'active' : '' }}">
            <i class="bi bi-box-seam"></i>
            <span class="nav-text">Devices</span>
        </a>

        <a href="/prescriptions"
           class="nav-link {{ request()->is('prescriptions*') ? 'active' : '' }}">
            <i class="bi bi-clipboard2-pulse"></i>
            <span class="nav-text">Prescriptions</span>
        </a>

        <a href="/orders"
           class="nav-link {{ request()->is('orders*') ? 'active' : '' }}">
            <i class="bi bi-bag-check"></i>
            <span class="nav-text">Orders</span>
        </a>

        <a href="/appointments"
           class="nav-link {{ request()->is('appointments*') ? 'active' : '' }}">
            <i class="bi bi-calendar2-week"></i>
            <span class="nav-text">Appointments</span>
        </a>

        <a href="/history"
           class="nav-link {{ request()->is('history*') ? 'active' : '' }}">
            <i class="bi bi-clock-history"></i>
            <span class="nav-text">History</span>
        </a>

    </nav>

    <div class="poms-logout">
        <form method="POST" action="/logout">
            @csrf

            <button type="submit" class="btn btn-outline-light">
                <i class="bi bi-box-arrow-left me-2"></i>
                <span class="nav-text">Logout</span>
            </button>
        </form>
    </div>

</aside>
```
