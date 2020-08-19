<?php

namespace App;

use App\Person;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'planet_id', 'name', 'climate', 'terrain', 'diameter', 'population', 'rotation_period', 'orbital_period', 'surface_water','created', 'edited', 'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function People()
    {
        return $this->hasMany(Person::class, 'planet_id', 'planet_id');
    }
}
