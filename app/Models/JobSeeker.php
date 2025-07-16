<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobSeeker extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'experience',
        'notice_period',
        'skills',
        'city_id',
        'resume',
        'photo',
        'password',
    ];

    protected $hidden = ['password'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
