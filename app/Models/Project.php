<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;

class Project extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'projects';

    protected $fillable = [
        'client_id',
        'title',
        'description',
        'budget',
        'expected_timeline',
        'specific_deliverables',
        'evaluation_criteria',
        'required_skills',
        'project_proposals',
    ];

    // Relación con clientes
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Relación con las propuestas
    public function proposalsData(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }
}
