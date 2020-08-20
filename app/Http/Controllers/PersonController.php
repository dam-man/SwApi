<?php

namespace App\Http\Controllers;

use App\Person;
use App\Classes\Swapi;

class PersonController extends Controller
{
    public function import()
    {
        $api = new Swapi;

        if (empty($persons = $api->request('people')))
        {
            return redirect('/')->with('failure', 'Could not fetch data from the API, please try again.');
        }

        foreach ($persons as $person)
        {
            $id = $api->fetchIdFromUrl($person->url);

            $people             = Person::query()->firstOrCreate(['people_id' => $id]);
            $people->planet_id  = $api->fetchIdFromUrl($person->homeworld);
            $people->name       = $person->name;
            $people->height     = $person->height;
            $people->mass       = $person->mass;
            $people->hair_color = $person->hair_color;
            $people->skin_color = $person->skin_color;
            $people->eye_color  = $person->eye_color;
            $people->birth_year = $person->birth_year;
            $people->gender     = $person->gender;
            $people->created    = $person->created;
            $people->edited     = $person->edited;

            $people->save();
        }

        return redirect('/home')->with('success', 'People has been imported from the starwars API.');
    }
}
