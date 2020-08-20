<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'classification', 'designation', 'average_height', 'skin_colors', 'hair_colors', 'eye_colors', 'average_lifespan', 'homeworld',
        'language', 'created', 'edited', 'created_at',
        'updated_at',
    ];

    /**
     * Relations to people
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function people()
    {
        return $this->belongsToMany(Person::class, 'species_to_people', 'people_id', 'people_id');
    }
}
