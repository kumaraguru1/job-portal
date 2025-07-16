<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .dashboard-card {
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 sidebar d-flex flex-column p-0">
            <div class="p-4 text-center border-bottom">
                <h5>Admin Panel</h5>
            </div>
            <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
            <a href="{{ url('/admin/job-seekers') }}">Job Seekers</a>
            <a href="{{ url('/') }}">Back to Home</a>
            <form method="POST" action="{{ route('admin.logout') }}" class="mt-auto">
                @csrf
                <button type="submit" class="btn btn-link w-100 text-start text-white">Logout</button>
            </form>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            <h2 class="mb-4">Welcome, Admin</h2>

            <div class="row g-4">
                <!-- Total Candidates -->
                <div class="col-md-4">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Candidates</h5>
                            <h3>{{ $totalCandidates ?? 0 }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Candidates with > 5 Years -->
                <div class="col-md-4">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <h5 class="card-title">> 5 Years Exp</h5>
                            <h3>{{ $expAbove5 ?? 0 }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Candidates with Notice Period <= 30 -->
                <div class="col-md-4">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <h5 class="card-title">Notice ≤ 30 Days</h5>
                            <h3>{{ $noticeBelow30 ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
