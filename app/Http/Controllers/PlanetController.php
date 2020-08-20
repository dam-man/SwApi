<?php

namespace App\Http\Controllers;

use App\Classes\Swapi;
use App\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    public function import()
    {
        $api = new Swapi;

        if (empty($planets = $api->request('planets')))
        {
            return redirect('/')->with('failure', 'Could not fetch data from the API, please try again.');
        }

        foreach ($planets as $planet)
        {
            $id = $api->fetchIdFromUrl($planet->url);

            $people                  = Planet::query()->firstOrCreate(['planet_id' => $id]);
            $people->planet_id       = $id;
            $people->name            = $planet->name;
            $people->climate         = $planet->climate;
            $people->terrain         = $planet->terrain;
            $people->diameter        = $planet->diameter != 'unknown' ? $planet->diameter : 0;
            $people->population      = $planet->population != 'unknown' ? $planet->population : 0;
            $people->rotation_period = $planet->rotation_period != 'unknown' ? $planet->rotation_period : 0;
            $people->orbital_period  = $planet->orbital_period != 'unknown' ? $planet->orbital_period : 0;
            $people->surface_water   = $planet->surface_water != 'unknown' ? $planet->surface_water : 0;
            $people->created         = $planet->created;
            $people->edited          = $planet->edited;

            $people->save();
        }

        return redirect('/home')->with('success', 'People has been imported from the starwars API.');
    }
}
