<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;


class Freelancer extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'freelancers';

    protected $fillable = [
        'name',
        'portfolio',
        'experience',
        'education',
        'certifications',
        'languages',
        'availability',
        'rates',
    ];

    protected $casts = [
        'portfolio' => 'array',
        'experience' => 'array',
        'education' => 'array',
        'rates' => 'array',
        
    ];
}
