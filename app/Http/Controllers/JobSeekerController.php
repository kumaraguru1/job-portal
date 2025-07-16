<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\JobSeeker;
use App\Models\City;

class JobSeekerController extends Controller
{
    public function dashboard()
    {
        return view('jobseeker.dashboard');
    }

    public function edit()
    {
        $cities = City::all();
        $jobSeeker = Auth::user();
        return view('jobseeker.edit_profile', compact('jobSeeker', 'cities'));
    }

    public function update(Request $request)
    {
        $jobSeeker = Auth::user();

        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'experience' => 'required|integer|min:0',
            'notice_period' => 'required|integer|min:0',
            'skills' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'photo' => 'nullable|image|max:1024',
        ]);

        $data = $request->only([
            'name', 'phone', 'experience', 'notice_period', 'skills', 'city_id'
        ]);

        if ($request->hasFile('resume')) {
            if ($jobSeeker->resume) {
                Storage::disk('public')->delete($jobSeeker->resume);
            }
            $data['resume'] = $request->file('resume')->store('resumes', 'public');
        }

        if ($request->hasFile('photo')) {
            if ($jobSeeker->photo) {
                Storage::disk('public')->delete($jobSeeker->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $jobSeeker->update($data);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
