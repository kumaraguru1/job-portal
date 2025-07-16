@extends('layouts.job_seeker')

@section('title', 'Edit Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Edit Your Profile</h5>
            </div>
            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/update-profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name', $jobSeeker->name) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $jobSeeker->phone) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Experience (Years)</label>
                        <input type="number" name="experience" value="{{ old('experience', $jobSeeker->experience) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Notice Period (Days)</label>
                        <input type="number" name="notice_period" value="{{ old('notice_period', $jobSeeker->notice_period) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Skills</label>
                        <input type="text" name="skills" value="{{ old('skills', $jobSeeker->skills) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Job Location</label>
                        <select name="city_id" class="form-select" required>
                            <option value="">-- Select City --</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ $city->id == old('city_id', $jobSeeker->city_id) ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Resume</label><br>
                        @if($jobSeeker->resume)
                            <a href="{{ asset('storage/' . $jobSeeker->resume) }}" target="_blank" class="btn btn-sm btn-outline-secondary mb-2">Download Current</a><br>
                        @endif
                        <input type="file" name="resume" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Photo</label><br>
                        @if($jobSeeker->photo)
                            <img src="{{ asset('storage/' . $jobSeeker->photo) }}" width="100" class="img-thumbnail mb-2"><br>
                        @endif
                        <input type="file" name="photo" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">Update Profile</button>
                    <a href="{{ url('/dashboard') }}" class="btn btn-secondary ms-2">← Back to Dashboard</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
