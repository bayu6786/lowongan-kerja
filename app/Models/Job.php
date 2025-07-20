<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
        protected $table = 'job_listings';

    protected $fillable = [
        'company_name',
        'position',
        'location',
        'job_description',
        'qualification',
        'expiration_date',
        'contact',
        'salary',
        'job_type',
    ];
}
