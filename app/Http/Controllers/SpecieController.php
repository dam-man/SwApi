<?php

namespace App\Http\Controllers;

use App\Classes\Swapi;
use App\Specie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecieController extends Controller
{
    public function import()
    {
        $api = new Swapi;

        if (empty($species = $api->request('species')))
        {
            return redirect('/home')->with('failure', 'Could not fetch data from the API, please try again.');
        }

        // Remove current items.
        // Todo Making a sync functionality which is also available
        DB::table('species_to_people')->truncate();

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

            if ( ! empty($specie->people))
            {
                if(!$this->updatePeopleToSpecieTable($id, $specie->people))
                {
                    return redirect('/home')->with('failure', 'Could not import species to people from the API.');
                }
            }
        }

        return redirect('/home')->with('success', 'Species has been imported from the starwars API.');
    }

    private function updatePeopleToSpecieTable($specie_id, $people)
    {
        $api     = new Swapi;
        $inserts = [];

        foreach ($people as $people_id)
        {

            $people_id = $api->fetchIdFromUrl($people_id);

            $inserts[] = ['specie_id' => $specie_id, 'people_id' => $people_id];
        }

        return DB::table('species_to_people')->insert($inserts);
    }
}
