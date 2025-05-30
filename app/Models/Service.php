<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;


class Service extends Model
{

    protected $connection = 'mongodb';
    protected $collection = 'services';

    protected $fillable = ['name', 'description'];


    public function freelancers()
    {
        return $this->hasMany(Freelancer::class);
    }
}
