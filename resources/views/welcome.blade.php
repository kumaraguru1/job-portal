<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Job Portal</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-caption {
            background: rgba(0, 0, 0, 0.6);
            padding: 1rem 2rem;
            border-radius: 10px;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.6);
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .hero {
            height: 100vh;
            color: #fff;
            position: relative;
        }

        .feature-box {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="#">Job Portal</a>
        <div class="ms-auto">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-light me-2">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
                @endif
            @endauth
        </div>
    </nav>

    <!-- Hero with Background Slider -->
    <div id="heroCarousel" class="carousel slide hero" data-bs-ride="carousel">
        <div class="carousel-inner h-100">
            <div class="carousel-item active h-100" style="background: url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;">
                <div class="overlay d-flex align-items-center justify-content-center">
                    <div class="carousel-caption">
                        <h1 class="display-5 fw-bold">Launch Your Career</h1>
                        <p>Find your dream job with us and grow professionally.</p>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-3">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item h-100" style="background: url('https://images.unsplash.com/photo-1515165562835-c5f6f7a9e6c4?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;">
                <div class="overlay d-flex align-items-center justify-content-center">
                    <div class="carousel-caption">
                        <h1 class="display-5 fw-bold">Connect with Top Employers</h1>
                        <p>Join a platform trusted by recruiters and professionals.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item h-100" style="background: url('https://images.unsplash.com/photo-1560264280-88b68371db39?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;">
                <div class="overlay d-flex align-items-center justify-content-center">
                    <div class="carousel-caption">
                        <h1 class="display-5 fw-bold">Manage Your Profile</h1>
                        <p>Track applications, update resumes, and stay ahead.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Why Choose Our Job Portal?</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="feature-box">
                        <h5>Easy Registration</h5>
                        <p>Create your profile quickly and start applying to jobs within minutes.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <h5>Search & Apply</h5>
                        <p>Advanced filters help you find jobs matching your skills and experience.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <h5>Track Your Progress</h5>
                        <p>Monitor your job applications and get updates from recruiters.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-4 bg-dark text-white">
        <p>&copy; {{ date('Y') }} Job Portal. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
