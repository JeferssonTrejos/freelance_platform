<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Review  extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'reviews';

    protected $fillable = [
        'project_id',
        'reviewer_id',
        'reviewer_type',
        'reviewed_id',
        'reviewed_type',
        'rating',
        'comments',
    ];

    public function getRouteKeyName()
    {
        return '_id';
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function reviewed()
    {
        return $this->belongsTo(User::class, 'reviewed_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
