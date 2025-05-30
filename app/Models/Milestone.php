<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

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
    ];


    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}