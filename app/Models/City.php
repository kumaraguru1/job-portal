<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name'];

    public function jobSeekers()
    {
        return $this->hasMany(JobSeeker::class);
    }
}
