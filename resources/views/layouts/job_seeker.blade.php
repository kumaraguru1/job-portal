<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Job Seeker Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar .active {
            background-color: #495057;
        }
    </style>

    @stack('styles')
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 sidebar d-flex flex-column p-0">
            <div class="p-3 border-bottom text-white text-center">
                <h5 class="mb-0">Job Seeker</h5>
            </div>
            <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ url('/edit-profile') }}" class="{{ request()->is('edit-profile') ? 'active' : '' }}">Edit Profile</a>
            <a href="{{ url('/change-password') }}" class="{{ request()->is('change-password') ? 'active' : '' }}">Change Password</a>
            <form method="POST" action="{{ url('/logout') }}" class="mt-auto">
                @csrf
                <button type="submit" class="btn btn-link w-100 text-start text-white">Logout</button>
            </form>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            @yield('content')
        </div>
    </div>
</div>

<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
