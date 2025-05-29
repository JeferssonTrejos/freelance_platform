<?php

namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'clients';
    
    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
        'address'
    ];

    public function getRouteKeyName()
    {
        return '_id';
    }


    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}




