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
