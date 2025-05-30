<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use App\Models\ProjectProposal;
use App\Models\Payment;

class Milestone extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'milestones';

    protected $fillable = [
        'proposal_id',
        'title',
        'due_date',
        'deliverables',
        'status',
        'payment_id',
    ];

    protected $casts = [
        'deliverables' => 'array',
        'due_date' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return '_id';
    }

    public function proposal()
    {
        return $this->belongsTo(ProjectProposal::class, 'proposal_id', '_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', '_id');
    }
}