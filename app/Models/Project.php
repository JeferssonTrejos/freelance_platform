<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'projects';

    protected $fillable = [
        'title',
        'description',
        'budget',
        'timeline',
        'deliverables',
        'evaluation_criteria',
        'skills',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
