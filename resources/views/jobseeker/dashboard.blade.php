@extends('layouts.job_seeker')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h3 class="fw-bold">Welcome, {{ auth()->user()->name }}</h3>
        <p class="text-muted">This is your job seeker dashboard.</p>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card text-bg-info mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">Edit Profile</h5>
                <p class="card-text">Update your personal and professional information.</p>
                <a href="{{ url('/edit-profile') }}" class="btn btn-light btn-sm">Go to Profile</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card text-bg-warning mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">Change Password</h5>
                <p class="card-text">Keep your account secure by changing your password regularly.</p>
                <a href="{{ url('/change-password') }}" class="btn btn-light btn-sm">Change Password</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card text-bg-danger mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">Logout</h5>
                <p class="card-text">Log out securely from your account.</p>
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
