<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'proposals';

    protected $fillable = [
        'freelancer_id',
        'project_id',
        'approach',
        'timeline_details',
        'budget_breakdown', // Array nativo en MongoDB
        'examples',         // Array nativo en MongoDB
        'terms',           // Array nativo en MongoDB
        'status',
    ];

    public function getRouteKeyName()
    {
        return '_id';
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'freelancer_id', '_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', '_id');
    }
}
