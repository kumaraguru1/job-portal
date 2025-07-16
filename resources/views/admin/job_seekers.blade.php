@extends('layouts.admin')

@section('title', 'Job Seekers List')

@section('content')
    <h2 class="mb-4">Job Seekers List</h2>

    <!-- Filter Form -->
    <form method="GET" action="{{ url('/admin/job-seekers') }}" class="row g-3 mb-4">
        <div class="col-md-2">
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ request('name') }}">
        </div>
        <div class="col-md-2">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ request('email') }}">
        </div>
        <div class="col-md-2">
            <input type="number" name="min_experience" class="form-control" placeholder="Min Exp" value="{{ request('min_experience') }}">
        </div>
        <div class="col-md-2">
            <input type="number" name="max_experience" class="form-control" placeholder="Max Exp" value="{{ request('max_experience') }}">
        </div>
        <div class="col-md-2">
            <input type="text" name="skills" class="form-control" placeholder="Skills" value="{{ request('skills') }}">
        </div>
        <div class="col-md-2">
            <select name="city_id" class="form-select">
                <option value="">Location</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ url('/admin/job-seekers') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="jobSeekersTable">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Experience</th>
                    <th>Photo</th>
                    <th>Resume</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($jobSeekers as $seeker)
                <tr>
                    <td>{{ $seeker->name }}</td>
                    <td>{{ $seeker->email }}</td>
                    <td>{{ $seeker->phone }}</td>
                    <td>{{ $seeker->experience }} yrs</td>
                    <td>
                        @if($seeker->photo)
                            <img src="{{ asset('storage/' . $seeker->photo) }}" class="table-avatar">
                        @endif
                    </td>
                    <td>
                        @if($seeker->resume)
                            <a href="{{ asset('storage/' . $seeker->resume) }}" class="btn btn-sm btn-outline-success" target="_blank">Download</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/admin/job-seeker/' . $seeker->id) }}" class="btn btn-sm btn-info mb-1">View</a>
                        <form action="{{ url('/admin/job-seeker/' . $seeker->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No job seekers found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#jobSeekersTable').DataTable({
            paging: false,
            searching: false,
            info: false,
            ordering: true
        });
    });
</script>
@endsection
