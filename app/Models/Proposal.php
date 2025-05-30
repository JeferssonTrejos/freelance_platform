<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;


class Proposal extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'proposals';

    protected $fillable = [
        'freelancer_id',
        'project_id',
        'approach',
        'timeline_details',
        'budget_breakdown',
        'examples',
        'terms',
        'status',
    ];

    public function getRouteKeyName()
    {
        return '_id';
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
