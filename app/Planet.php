<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'climate', 'terrain', 'diameter', 'population', 'rotation_period', 'orbital_period', 'surface_water','created', 'edited', 'created_at',
        'updated_at',
    ];
}
