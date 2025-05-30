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

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }
}
