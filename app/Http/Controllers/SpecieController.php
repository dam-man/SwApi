<?php

namespace App\Http\Controllers;

use App\Classes\Swapi;
use App\Specie;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    public function import()
    {
        $api = new Swapi;

        if (empty($species = $api->request('species')))
        {
            return redirect('/')->with('failure', 'Could not fetch data from the API, please try again.');
        }

        foreach ($species as $specie)
        {
            $id = $api->fetchIdFromUrl($specie->url);

            $people                   = Specie::query()->firstOrCreate(['id' => $id]);
            $people->name             = $specie->name;
            $people->classification   = $specie->classification;
            $people->designation      = $specie->designation;
            $people->average_height   = $specie->average_height != 'n/a' ? $specie->average_height : 0;
            $people->skin_colors      = $specie->skin_colors != 'n/a' ? $specie->skin_colors : null;
            $people->hair_colors      = $specie->hair_colors != 'n/a' ? $specie->hair_colors : null;
            $people->eye_colors       = $specie->eye_colors != 'n/a' ? $specie->eye_colors : null;
            $people->average_lifespan = $specie->average_lifespan != 'n/a' ? $specie->average_lifespan : null;
            $people->language         = $specie->language != 'n/a' ? $specie->language : null;
            $people->created          = $specie->created;
            $people->edited           = $specie->edited;

            $people->save();
        }

        return redirect('/')->with('success', 'People has been imported from the starwars API.');
    }
}
