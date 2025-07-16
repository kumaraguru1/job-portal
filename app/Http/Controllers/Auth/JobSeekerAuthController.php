<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\JobSeeker;
use App\Models\City;
use App\Jobs\SendRegistrationMail;
use App\Http\Requests\RegisterJobSeekerRequest;

class JobSeekerAuthController extends Controller
{
    public function registerForm()
    {
        $cities = City::all();
        return view('auth.register', compact('cities'));
    }

    public function register(RegisterJobSeekerRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['resume'] = $request->file('resume')->store('resumes', 'public');
        $data['photo'] = $request->file('photo')->store('photos', 'public');

        $jobSeeker = JobSeeker::create($data);

        // Dispatch registration email
        SendRegistrationMail::dispatch($jobSeeker);

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
