<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterJobSeekerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all users to make this request
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:job_seekers,email',
            'phone' => 'required|string|max:20',
            'experience' => 'required|integer|min:0',
            'notice_period' => 'required|integer|min:0',
            'skills' => 'required|string|max:1000',
            'city_id' => 'required|exists:cities,id',
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
            'photo' => 'required|image|max:1024',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
