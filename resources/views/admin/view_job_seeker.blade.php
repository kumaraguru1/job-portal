@extends('layouts.admin')

@section('title', 'Job Seeker Details')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Job Seeker Details</h5>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Name:</strong> {{ $jobSeeker->name }}</p>
                    <p><strong>Email:</strong> {{ $jobSeeker->email }}</p>
                    <p><strong>Phone:</strong> {{ $jobSeeker->phone }}</p>
                    <p><strong>Experience:</strong> {{ $jobSeeker->experience }} years</p>
                    <p><strong>Notice Period:</strong> {{ $jobSeeker->notice_period }} days</p>
                    <p><strong>Skills:</strong> {{ $jobSeeker->skills }}</p>
                    <p><strong>Location:</strong> {{ $jobSeeker->city->name ?? 'N/A' }}</p>
                </div>

                <div class="col-md-6">
                    <p><strong>Photo:</strong></p>
                    @if ($jobSeeker->photo)
                        <img src="{{ asset('storage/' . $jobSeeker->photo) }}" class="img-thumbnail" width="150">
                    @else
                        <p class="text-muted">No photo uploaded.</p>
                    @endif

                    <p class="mt-4"><strong>Resume:</strong></p>
                    @if ($jobSeeker->resume)
                        <a href="{{ asset('storage/' . $jobSeeker->resume) }}" target="_blank" class="btn btn-outline-success btn-sm">
                            Download Resume
                        </a>
                    @else
                        <p class="text-muted">No resume uploaded.</p>
                    @endif
                </div>
            </div>

            <a href="{{ url('/admin/job-seekers') }}" class="btn btn-secondary">← Back to List</a>
        </div>
    </div>
@endsection
