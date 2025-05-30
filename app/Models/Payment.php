<?php
// Modelo Payment: representa un pago asociado a un proyecto, milestone y usuarios.
namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Payment extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'payments';

    protected $fillable = [
        'project_id',
        'milestone_id',
        'client_id',
        'freelancer_id',
        'amount',
        'status',
        'released_at',
        'disputed_at',
        'released_by',
        'disputed_by',
        'platform_fee',
    ];


    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', '_id');
    }

    public function milestone()
    {
        return $this->belongsTo(Milestone::class, 'milestone_id', '_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', '_id');
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'freelancer_id', '_id');
    }
}
