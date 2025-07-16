<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobSeeker;
use Illuminate\Support\Facades\Storage;
use App\Models\City;

class AdminController extends Controller
{

    public function dashboard()
    {
        $totalCandidates = JobSeeker::count();
        $expAbove5 = JobSeeker::where('experience', '>', 5)->count();
        $noticeBelow30 = JobSeeker::where('notice_period', '<=', 30)->count();
        
        return view('admin.dashboard', compact('totalCandidates', 'expAbove5', 'noticeBelow30'));
    }

    public function index(Request $request)
    {
        $query = JobSeeker::query()->whereNull('deleted_at');

        // Filters
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }

        if ($request->filled('min_experience')) {
            $query->where('experience', '>=', $request->min_experience);
        }

        if ($request->filled('max_experience')) {
            $query->where('experience', '<=', $request->max_experience);
        }

        if ($request->filled('skills')) {
            $query->where('skills', 'LIKE', '%' . $request->skills . '%');
        }

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        $jobSeekers = $query->latest()->paginate(10);
        $cities = City::all();

        return view('admin.job_seekers', compact('jobSeekers', 'cities'));
    }

    public function jobSeekerList(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $query = JobSeeker::with('city');

        if ($request->filled('name')) {
            $query->where('name', 'like', "%{$request->name}%");
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->email}%");
        }
        if ($request->filled('min_exp')) {
            $query->where('experience', '>=', $request->min_exp);
        }
        if ($request->filled('max_exp')) {
            $query->where('experience', '<=', $request->max_exp);
        }
        if ($request->filled('skills')) {
            $query->where('skills', 'like', "%{$request->skills}%");
        }
        if ($request->filled('location')) {
            $query->whereHas('city', fn($q) => $q->where('name', $request->location));
        }

        $jobSeekers = $query->paginate(10);

        return view('admin.job_seekers', compact('jobSeekers'));
    }

    public function viewJobSeeker($id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $jobSeeker = JobSeeker::with('city')->findOrFail($id);
        return view('admin.view_job_seeker', compact('jobSeeker'));
    }

    public function softDelete($id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $jobSeeker = JobSeeker::findOrFail($id);

        if ($jobSeeker->photo) {
            Storage::disk('public')->delete($jobSeeker->photo);
        }

        if ($jobSeeker->resume) {
            Storage::disk('public')->delete($jobSeeker->resume);
        }

        $jobSeeker->delete();

        return back()->with('success', 'Job Seeker deleted successfully (soft delete).');
    }
}
