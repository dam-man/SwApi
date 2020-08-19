<?php

namespace App;

use App\Specie;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'planet_id', 'people_id', 'name', 'height', 'mass', 'hair_color', 'skin_color', 'eye_color', 'birth_year', 'gender', 'created', 'edited',
        'created_at',
        'updated_at',
    ];

    /**
     * A planet belongs to a people, lets assign it here so we can use it in ORM.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function planet()
    {
        return $this->belongsTo(Planet::class, 'planet_id', 'planet_id');
    }
}
