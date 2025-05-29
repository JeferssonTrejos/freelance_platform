<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'skills';

    protected $fillable = [
        'name',
        'category',
    ];

    public function getRouteKeyName()
    {
        return '_id';
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_skill', 'skill_id', 'project_id');
    }
    public function freelancers()
    {
        return $this->belongsToMany(Freelancer::class, 'freelancer_skill', 'skill_id', 'freelancer_id');
    }
}
