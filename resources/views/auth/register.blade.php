<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Seeker Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f3f5;
        }
        .register-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
        }
        .form-title {
            text-align: center;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="register-container">
        <h2 class="form-title">Job Seeker Registration</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Experience (Years)</label>
                    <input type="number" name="experience" class="form-control" value="{{ old('experience') }}" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Notice Period (Days)</label>
                    <input type="number" name="notice_period" class="form-control" value="{{ old('notice_period') }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Skills</label>
                <input type="text" name="skills" class="form-control" value="{{ old('skills') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Job Location</label>
                <select name="city_id" class="form-select" required>
                    <option value="">Select Job Location</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Resume (PDF, DOC)</label>
                <input type="file" name="resume" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Photo (JPG, PNG)</label>
                <input type="file" name="photo" class="form-control" required>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success">Register</button>
            </div>

        </form>

        <p class="text-center mt-3">
            Already registered?
            <a href="{{ route('login') }}">Login here</a>
        </p>
    </div>
</div>

</body>
</html>
